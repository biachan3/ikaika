<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketOwner;
use App\Mail\InfoRegistrationMail;
use App\Mail\InfoLinkRegisMail;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Str;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Uuid;
use Carbon\Carbon;
use File;
use Http;
use Log;
use Excel;
use App\Imports\TicketImport;

class PaymentController extends Controller
{
    public function genkey()
    {
        $signkey = env('SIGNKEY');
        $datetime = "2023-05-13 01:51:45";
        $orderid = "TX-TO-FT-0027";
        $model = "INQUIRY";
        $comcode = env('COMCODE');
        $amount = 10300;
        $ccy = "IDR";
        $uuid = "e7276d90-d451-11ed-9e6b-65a9879c03c9-1231231";
        // $uuid = Uuid::generate();

        $uppercase = strtoupper("##$signkey##$uuid##$datetime##$orderid##$amount##$ccy##$comcode##$model##");
        $checkstatus = strtoupper("##$signkey##$datetime##$orderid##INQUIRY##");

        $qr = strtoupper("##$uuid##$comcode##LINKAJA##$orderid##$amount##PUSHTOPAY##5jvmfze7dgc9enof##");

        $signature = hash('sha256', $checkstatus);
        echo $signature . " + " . $checkstatus . '<hr>';
    }
    public function inquiryProcess(Request $request)
    {
        $rq_uuid = $request->rq_uuid;
        $rq_datetime = $request->rq_datetime;
        $rq_password = $request->password;
        $rq_signature = $request->signature;
        $rq_comcode = $request->member_id;
        $rq_orderid = $request->order_id;
        // $now = Carbon::now();
        $now = date("Y-m-d H:i:s");
        // dd($now);
        $signkey = env('SIGNKEY');
        $model = "INQUIRY-RS";

        // if($rq_password == ")*HU9+7JG4"){
        if ($rq_password == env('PASSWORD_PG')) {
            $upper = strtoupper("##$signkey##$rq_uuid##$now##$rq_orderid##0000##$model##");
            $signature_res = hash('sha256', $upper);
            $t = Ticket::find($rq_orderid);
            $t->gross_amount = $t->amount + $t->amount_donasi;
            $t->save();
            return response()->json(
                [
                    'rq_uuid' => $rq_uuid,
                    'rs_datetime' => $now,
                    'error_code' => '0000',
                    'error_message' => 'success',
                    'order_id' => $rq_orderid,
                    // 'amount' => 10300,
                    'amount' => $t->gross_amount,
                    'ccy' => 'IDR',
                    'description' => 'Tiket Reuni',
                    'trx_date' => $now,
                    'signature' => $signature_res
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'rq_uuid' => $rq_uuid,
                    'rs_datetime' => $now,
                    'error_code' => '1001',
                    'error_message' => "Invalid Password",
                ],
                200
            );
        }
    }
    public function index()
    {
        return view('admin.payment.index');
    }
    public function getVirtualAccount(Request $request)
    {

        $data = Ticket::find($request->id);
        $method = $request->method;
        $obj_response = "";
        $is_production = env('IS_PRODUCTION');

        $url_endpoint = "";
        if ($is_production) {
            // $url_endpoint = 'https://sandbox-api.espay.id/rest/merchantpg/sendinvoices';
            $url_endpoint = 'https://api.espay.id/rest/merchantpg/sendinvoice';
        } else {
            $url_endpoint = 'https://sandbox-api.espay.id/rest/merchantpg/sendinvoice';
        }

        $url_endpoint_qr = "";
        if ($is_production) {
            $url_endpoint_qr = 'https://api.espay.id/rest/digitalpay/pushtopay';
        } else {
            $url_endpoint_qr = 'https://sandbox-api.espay.id/rest/digitalpay/pushtopay';
        }
        // dd($url_endpoint_qr);
        //Prepare api
        $client = new \GuzzleHttp\Client();
        $total_amount_tx = $data->amount + $data->amount_donasi;
        $fee = 0;
        $uuid = Uuid::generate();
        $data->uuid = $uuid->string;
        $data->save();
        $now = date("Y-m-d H:i:s");
        $signkey = env('SIGNKEY');
        $comcode = env('COMCODE');

        if ($data->transaction_status == null) {
            if ($method != "qris") {

                $uppercase = strtoupper("##$signkey##$data->uuid##$now##$data->id##$total_amount_tx##IDR##$comcode##SENDINVOICE##");
                $signature = hash('sha256', $uppercase);
                Log::info("REQUEST SIGNATURE PLAIN : " . $uppercase);
                Log::info("REQUEST SIGNATURE HASH : " . $signature);
                // dd($signature);

                $requestData = [
                    'form_params' => [
                        'rq_uuid' => $data->uuid,
                        'rq_datetime' => $now,
                        'comm_code' => $comcode,
                        'amount' => $total_amount_tx,
                        'ccy' => 'IDR',
                        'order_id' => $data->id,
                        'remark2' => $data->nama_lengkap,
                        'update' => 'N',
                        'bank_code' => $method,
                        'signature' => $signature
                    ]
                ];
                Log::info("REQUEST DATA : " . json_encode($requestData));
                $response = $client->post($url_endpoint, $requestData);
                Log::info("RESPONSE DATA : " . ($response->getBody()));

                $obj_response = json_decode($response->getBody());
                // dd($obj_response);
                if ($obj_response->error_code == "0000") {
                    $data->payment_method = $method;
                    $data->transaction_status = "Menunggu Pembayaran";
                    $data->payment_expiry_time = $obj_response->expired;
                    $data->payment_media = $obj_response->va_number;
                    $data->gross_amount = $obj_response->total_amount;
                    $data->fee = $obj_response->fee;
                    $fee = $obj_response->fee;
                    $total_amount_tx += $obj_response->fee;
                    //kirim email
                    $data->save();

                    $details = [
                        'nama' => $data->nama_lengkap,
                        'email' => $data->email,
                        'id_transaksi' => $data->id
                    ];
                    \Mail::to($data->email)->send(new InfoLinkRegisMail($details));
                }
            } else if ($method == "qris") {
                try {
                    $productcode = env('PRODUCT_CODE_QRIS');
                    $qr = strtoupper("##$data->uuid##$comcode##$productcode##$data->id##$total_amount_tx##PUSHTOPAY##$signkey##");
                    $signature = hash('sha256', $qr);
                    $credential = "";
                    Log::info("REQUEST SIGNATURE PLAIN : " . $qr);
                    Log::info("REQUEST SIGNATURE HASH : " . $signature);

                    if ($is_production) {
                        $credential = 'U0dXSUtBVUJBWUE6SkRWRERKVE8=';
                    } else {
                        $credential = 'U0dXSUtBQlVBWUE6KSpIVTkrN0pHNA==';
                    }
                    Log::info("CREDENTIAL QR : " . $credential);

                    $requestData = [
                        'rq_uuid' => $data->uuid,
                        'rq_datetime' => $now,
                        'comm_code' => $comcode,
                        'amount' => $total_amount_tx,
                        'order_id' => $data->id,
                        'product_code' => env('PRODUCT_CODE_QRIS'),
                        'customer_id' => $data->no_hp,
                        'signature' => $signature,
                        'description' => "Tiket Reuni IKA UBAYA $data->uuid ."
                    ];
                    Log::info("REQUEST DATA : " . json_encode($requestData));

                    $response = $client->post($url_endpoint_qr, [
                        'form_params' => $requestData,
                        'headers' => [
                            'Authorization' => "Basic $credential"
                        ]
                    ]);
                    Log::info("RESPONSE DATA : " . ($response->getBody()));

                    $obj_response = json_decode($response->getBody());

                    if ($obj_response->error_code == "0000") {
                        $data->payment_method = "QRIS";
                        $data->transaction_status = "Menunggu Pembayaran";
                        $data->payment_media = $obj_response->QRCode;
                        $data->gross_amount = $data->gross_amount;
                        $data->uuid = $obj_response->rq_uuid;
                        // $data->payment_ref = $obj_response->trx_id;
                        $data->save();
                        $details = [
                            'nama' => $data->nama_lengkap,
                            'email' => $data->email,
                            'id_transaksi' => $data->id
                        ];
                        \Mail::to($data->email)->send(new InfoLinkRegisMail($details));
                    }
                } catch (Exception $e) {
                    echo 'Message: ' . $e->getMessage();
                }
            }
        }

        // }


        return response()->json(array(
            'status' => 'oke',
            'msg' => view('user.ticket.detailPayment', compact('data', 'fee', 'method', 'obj_response', 'total_amount_tx'))->render()
        ), 200);
    }

    public function notifHandling(Request $request)
    {
        $now = date("Y-m-d H:i:s");
        $rq_uuid = $request->rq_uuid;
        $rq_datetime = $request->rq_datetime;
        $rq_password = $request->password;
        Log::info("HANDLE NOTIF : " . $request->rq_uuid);

        if ($rq_password != env('PASSWORD_PG')) {
            return response()->json(
                [
                    'rq_uuid' => $rq_uuid,
                    'rs_datetime' => $now,
                    'error_code' => '1001',
                    'error_message' => "Invalid Password",
                ],
                200
            );
        }
        $order_id = $request->order_id;
        $payment_datetime = $request->payment_datetime;
        $payment_ref = $request->payment_ref;
        $cekTiket = Ticket::where('payment_ref', $payment_ref)->first();
        if ($cekTiket != null) {
            return response()->json(
                [
                    'rq_uuid' => $rq_uuid,
                    'rs_datetime' => $now,
                    'error_code' => '1002',
                    'error_message' => "Invalid, double payment",
                ],
                200
            );
        }

        try {
            $ticket = Ticket::find($order_id);
            // dd($ticket);
            $ticket->transaction_status = "Sukses";
            $ticket->payment_datetime = $payment_datetime;
            $ticket->payment_ref = $payment_ref;
            $ticket->save();
            $details = [
                'nama' => $ticket->nama_lengkap,
                'email' => $ticket->email,
                'id_transaksi' => $ticket->id
            ];
            \Mail::to($ticket->email)->send(new InfoRegistrationMail($details));
            $signkey = env('SIGNKEY');

            $upper = strtoupper("##$signkey##$rq_uuid##$now##0000##PAYMENTREPORT-RS##");
            $signature_res = hash('sha256', $upper);
            Log::info("PAYMENT NOTIF - SIGNATUR PLAIN : " . $upper);
            Log::info("PAYMENT NOTIF - SIGNATUR RESPONSE : " . $signature_res);
            //Start WA
            $id_trx = $ticket->id;
            $qrcode = base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($id_trx));

            $data["name"] = $ticket->nama_lengkap;
            $data["nomer"] = $id_trx;
            $data['qr'] = $qrcode;

            $customPaper = array(0, 0, 1080, 2043.48);
            $pdf = PDF::loadview('pdf.tiket', $data);
            $pdf->setPaper($customPaper);

            $directory_path = public_path('public/pdf');
            $secretKey = 'NJpWs4gWb9vi5Q6hMJPV';
            $nohp = Str::replaceFirst('0', '62', $ticket->no_hp);

            if (!File::exists($directory_path)) {

                File::makeDirectory($directory_path, $mode = 0755, true, true);
            }
            $filename = "Ticket-$id_trx.pdf";
            $pdf->save('' . $directory_path . '/' . $filename);
            $fileurl = url("/public/public/pdf/$filename");

            $response = Http::withHeaders([
                'secretkey' => $secretKey,
                'Content-Type' => 'application/json'
            ])->post("https://apiikaubaya.waviro.com/api/sendmedia", [
                'nohp' => $nohp,
                'pesan' => "",
                'mediaurl' => $fileurl
            ]);
            $responseChat = Http::withHeaders([
                'secretkey' => $secretKey,
                'Content-Type' => 'application/json'
            ])->post('https://apiikaubaya.waviro.com/api/sendwa', [
                'nohp' => $nohp,
                'pesan' => "Halo Sahabat IKA Ubaya 🙌🏻!\n\nTerimakasih kami ucapkan atas partisipasinya dalam\n*REUNI AKBAR IKA UBAYA 2023*\n\nUntuk itu, kami bermaksud mengirimkan E-PASS sebagai bukti partisipasi saudara dan dapat ditunjukkan saat registrasi acara.\n \n🤫 E-PASS di atas bersifat rahasia dan hanya berlaku untuk 1x registrasi saja, tunjukkan E-PASS di meja registrasi.\n \nOpen Registrasi  : 17:00 WIB \n\nJangan lupa untuk hadir dalam rangkaian acara pada 3 Juni 2023.\n \n#reuniakbarubaya2023\n#StrongerTogether"
            ]);

            // Log::info("HANDLE NOTIF : ".$response);
            //END WA
            return response()->json(
                [
                    'rq_uuid' => $rq_uuid,
                    'rs_datetime' => $now,
                    'error_code' => '0000',
                    'error_message' => 'success',
                    'order_id' => $order_id,
                    'reconcile_id' => strtotime("now"),
                    'reconcile_datetime' => $now,
                    'signature' => $signature_res
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'rq_uuid' => $rq_uuid,
                    'rs_datetime' => $now,
                    'error_code' => '1001',
                    'error_message' => $e->getMessage(),
                ],
                200
            );
        }

        // $obj_notify = json_decode($request);
        // dd($obj_notify);
    }
    public function ping()
    {
        $client = new \GuzzleHttp\Client();
        $base64username = base64_encode(env('MIDTRANS_SERVER_KEY'));
        $time = time();
        $response = $client->request('POST', 'https://app.sandbox.midtrans.com/snap/v1/transactions', [
            'body' => '{
            "transaction_details":{
                "order_id":' . $time . ',
                "gross_amount":190000
            },
            "credit_card":{
                "secure":true
            },
            "item_details": [
                {
                  "id": "V001",
                  "price": 150000,
                  "quantity": 1,
                  "name": "Tiket Acara Reuni"
                },
                {
                  "id": "V002",
                  "price": 40000,
                  "quantity": 1,
                  "name": "Donasi"
                }
              ]
        }',
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Basic ' . $base64username,
                'content-type' => 'application/json',
            ],
        ]);

        echo $response->getBody();
        // return response()->json($response->getBody(), 200);
    }

    public function addManualData()
    {
        return view('admin.sidebar.add-data-manual');
    }

    public function postadddatamanual(Request $request)
    {
        ini_set('max_execution_time', '0');
        if (request()->file('file')) {
            Excel::import(new TicketImport, request()->file('file'));
        } else {
            $prefix = "TO-";
            $prefix_fakultas = "";
            $fakultas = $request->fakultas;

            switch ($fakultas) {
                case "farmasi":
                    $prefix_fakultas = "FF";
                    break;
                case "hukum":
                    $prefix_fakultas = "FH";
                    break;
                case "fbe":
                    $prefix_fakultas = "FBE";
                    break;
                case "politeknik":
                    $prefix_fakultas = "POL";
                    break;
                case "psikologi":
                    $prefix_fakultas = "FP";
                    break;
                case "teknik":
                    $prefix_fakultas = "FT";
                    break;
                case "industri":
                    $prefix_fakultas = "FIK";
                    break;
                case "teknobiologi":
                    $prefix_fakultas = "FTB";
                    break;
                case "kedokteran":
                    $prefix_fakultas = "FK";
                    break;
                case "kia":
                    $prefix_fakultas = "KIA";
                    break;

                default:
                    $prefix_fakultas = "";
            }

            $last = Ticket::orderBy('created_at', 'desc')->first();
            // dd($last);
            $idcomplement = substr($last->id, -4) + 1;
            $id_trx = "TX-" . $prefix . $prefix_fakultas . "-" . str_pad($idcomplement, 4, "0", STR_PAD_LEFT);;

            $tiket = new Ticket();
            $tiket->id = $id_trx;
            $tiket->event_id = 1;
            $tiket->nama_lengkap = $request->nama;
            $tiket->email = $request->email;
            $tiket->no_hp = $request->no_hp;
            $tiket->fakultas = $request->fakultas;
            $tiket->angkatan = $request->angkatan;
            $tiket->amount = 150000;
            $tiket->is_take_merch = 1;
            $tiket->is_check_in = 1;
            $length = strlen($request->nama);
            $sizeLarge = false;
            if ($length > 45) {
                $sizeLarge = true;
            }
            $nominal_donasi = 0;
            if ($request->nominal == null || $request->nominal == "") {
                $nominal_donasi = 0;
            } else {
                $nominal_donasi = $request->nominal;
            }

            $tiket->amount_donasi = $nominal_donasi;
            $tiket->transaction_status = "Sukses - Manual";
            $tiket->save();

            $t = new TicketOwner();
            $t->nama = $request->nama;
            $t->id_tiket = $id_trx;
            $t->save();

            $qrcode = base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($id_trx));
            // $qrcode = QrCode::generate($id_trx);
            $client = new \GuzzleHttp\Client();
            $url_chat = 'https://apiikaubaya.waviro.com/api/sendwa';
            $url_media = 'https://apiikaubaya.waviro.com/api/sendmedia';

            $data["name"] = $request->nama;
            $data["nomer"] = $id_trx;
            $data['qr'] = $qrcode;
            $data['size'] = $sizeLarge;
            // dd($data['size']."-". $length);
            $customPaper = array(0, 0, 1080, 2043.48);
            $pdf = PDF::loadview('pdf.tiket', $data);
            $pdf->setPaper($customPaper);
            $directory_path = public_path('public/pdf');
            $secretKey = 'NJpWs4gWb9vi5Q6hMJPV';
            $nohp = Str::replaceFirst('0', '62', $request->no_hp);

            if (!File::exists($directory_path)) {

                File::makeDirectory($directory_path, $mode = 0755, true, true);
            }
            $filename = "Ticket-$id_trx.pdf";
            $pdf->save('' . $directory_path . '/' . $filename);
            $fileurl = url("/public/public/pdf/$filename");
            $requestChat = '{"nohp":"' . $nohp . '","pesan":"Halo Sahabat IKA Ubaya 🙌🏻!\n\nTerimakasih kami ucapkan atas partisipasinya dalam\n*REUNI AKBAR IKA UBAYA 2023*\n\nUntuk itu, kami bermaksud mengirimkan E-PASS sebagai bukti partisipasi saudara dan dapat ditunjukkan saat registrasi acara.\n \n🤫 E-PASS di atas bersifat rahasia dan hanya berlaku untuk 1x registrasi saja, tunjukkan E-PASS di meja registrasi.\n \nOpen Registrasi  : 17:00 WIB \n\nJangan lupa untuk hadir dalam rangkaian acara pada 3 Juni 2023.\n \n#reuniakbarubaya2023\n#StrongerTogether"}';
            Log::info("GM - Request add data manual Chat : " . $requestChat);
            $requestMedia = '{"nohp":"' . $nohp . '","pesan": "","mediaurl": "' . $fileurl . '"}';
            Log::info("GM - Request add data manual Media : " . $requestMedia);

            $responseChat = $client->post($url_chat, [
                'body' => $requestChat,
                'headers' => [
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                    'secretkey' => $secretKey
                ]
            ], ['http_errors' => false]);
            Log::info("GM - Response Chat : " . ($responseChat->getBody()));

            $responseMedia = $client->post($url_media, [
                'body' => $requestMedia,
                'headers' => [
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                    'secretkey' => $secretKey
                ]
            ], ['http_errors' => false]);
            Log::info("GM - Response Media : " . ($responseMedia->getBody()));

            $obj_response_chat = json_decode($responseChat->getBody());
            $obj_response_media = json_decode($responseMedia->getBody());
            $status = false;
            if ($obj_response_chat->success == true && $obj_response_media->success == true) {
                $status = true;
                $tiket->wa_sent = 1;
                $tiket->save();
                return redirect()->back()->with('status', 'Berhasil simpan dan kirim wa');
            }
            return redirect()->back()->with('error', 'kirim wa gagal, namun Berhasil simpan data');
        }
    }
}
