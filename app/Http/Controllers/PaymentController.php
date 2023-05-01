<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketOwner;
use App\Mail\InfoRegistrationMail;
use Illuminate\Support\Facades\Mail;
use Exception;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Uuid;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function genkey()
    {
        $signkey = env('SIGNKEY');
        $datetime = "2023-04-05 13:48:30";
        $orderid = "TX-TD-FTQR1";
        $model = "SENDINVOICE";
        $comcode = env('COMCODE');
        $amount = 10300;
        $ccy = "IDR";
        $uuid="e7276d90-d451-11ed-9e6b-65a9879c03c9-1231231";
        // $uuid = Uuid::generate();

        $uppercase = strtoupper("##$signkey##$uuid##$datetime##$orderid##$amount##$ccy##$comcode##$model##");
        $checkstatus = strtoupper("##$signkey##$datetime##$orderid##CHECKSTATUS##");

        $qr = strtoupper("##$uuid##$comcode##LINKAJA##$orderid##$amount##PUSHTOPAY##5jvmfze7dgc9enof##");

        $signature = hash('sha256', $qr);
        echo $signature." + ".$qr.'<hr>';
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
        if($rq_password == env('PASSWORD_PG')){
            $upper = strtoupper("##$signkey##$rq_uuid##$now##$rq_orderid##0000##$model##");
            $signature_res = hash('sha256', $upper);
            $t = Ticket::find($rq_orderid);
            $t->gross_amount = $t->amount + $t->amount_donasi;
            $t->save();
            return response()->json([
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
                ]
            ,200);
        } else {
            return response()->json([
                'rq_uuid' => $rq_uuid,
                'rs_datetime' => $now,
                'error_code' => '1001',
                'error_message' => "Invalid Password",
                ]
            ,200);
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
        $obj_response ="";
        $is_production = env('IS_PRODUCTION');

        $url_endpoint ="";
        if($is_production)
        {
            // $url_endpoint = 'https://sandbox-api.espay.id/rest/merchantpg/sendinvoices';
            $url_endpoint = 'https://api.espay.id/rest/merchantpg/sendinvoice';
        } else {
            $url_endpoint = 'https://sandbox-api.espay.id/rest/merchantpg/sendinvoice';
        }

        $url_endpoint_qr ="";
        if($is_production)
        {
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

                $response = $client->post($url_endpoint, [
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
                ]);

                $obj_response = json_decode($response->getBody());
                // dd($obj_response);

                if($obj_response->error_code == "0000"){
                    $data->payment_method = $method;
                    $data->transaction_status = "Menunggu Pembayaran";
                    $data->payment_expiry_time = $obj_response->expired;
                    $data->payment_media = $obj_response->va_number;
                    $data->gross_amount = $obj_response->total_amount;
                    $data->fee = $obj_response->fee;
                    $fee = $obj_response->fee;
                    $total_amount_tx += $obj_response->fee;

                    $data->save();
                }

            }
            else if($method == "qris"){
                try {
                    $qr = strtoupper("##$data->uuid##$comcode##LINKAJA##$data->id##$total_amount_tx##PUSHTOPAY##5jvmfze7dgc9enof##");
                    $signature = hash('sha256', $qr);

                    $response = $client->post($url_endpoint_qr, [
                        'form_params' => [
                            'rq_uuid' => $data->uuid,
                            'rq_datetime' => $now,
                            'comm_code' => $comcode,
                            'amount' => $total_amount_tx,
                            'order_id' => $data->id,
                            'product_code' => "LINKAJA",
                            'customer_id' => $data->no_hp,
                            'signature' => $signature,
                            'description' => "Tiket Reuni IKA UBAYA $data->uuid"
                        ],
                        'headers' => [
                            'Authorization' => 'Basic U0dXSUtBQlVBWUE6KSpIVTkrN0pHNA=='
                        ]
                    ]);

                    $obj_response = json_decode($response->getBody());
                    dd($obj_response->error_code);
                    if($obj_response->error_code == "0000"){
                        $data->payment_method = "QRIS";
                        $data->transaction_status = "Menunggu Pembayaran";
                        $data->payment_media = $obj_response->QRCode;
                        $data->gross_amount = $data->gross_amount;
                        $data->uuid = $obj_response->uuid;
                        $data->payment_ref = $obj_response->trx_id;
                        $data->save();
                    }
                } catch(Exception $e) {
                    echo 'Message: ' .$e->getMessage();
                }
            }
        }

        // }


        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('user.ticket.detailPayment',compact('data','fee','method','obj_response','total_amount_tx'))->render()
        ),200);
    }

    public function notifHandling(Request $request)
    {
        $now = date("Y-m-d H:i:s");
        $rq_uuid = $request->rq_uuid;
        $rq_datetime = $request->rq_datetime;
        $rq_password = $request->password;
        if($rq_password != env('PASSWORD_PG'))
        {
            return response()->json([
                'rq_uuid' => $rq_uuid,
                'rs_datetime' => $now,
                'error_code' => '1001',
                'error_message' => "Invalid Password",
                ]
            ,200);
        }
        $order_id = $request->order_id;
        $payment_datetime = $request->payment_datetime;
        $payment_ref = $request->payment_ref;
        $cekTiket = Ticket::where('payment_ref',$payment_ref)->first();
        if ($cekTiket != null) {
            return response()->json([
                'rq_uuid' => $rq_uuid,
                'rs_datetime' => $now,
                'error_code' => '1002',
                'error_message' => "Invalid, double payment",
                ]
            ,200);
        }
        try {
            $ticket = Ticket::find($order_id);
            // dd($ticket);
            $ticket->transaction_status = "Sukses";
            $ticket->payment_datetime = $payment_datetime;
            $ticket->payment_ref = $payment_ref;
            $ticket->save();
            $details = ['nama' => $ticket->name,
                        'email' => $ticket->email,
                        'id_transaksi' => $ticket->id
                        ];
            \Mail::to($ticket->email)->send(new InfoRegistrationMail($details));
            $signkey = env('SIGNKEY');

            $upper = strtoupper("##$signkey##$rq_uuid##$now##0000##PAYMENTREPORT-RS##");
            $signature_res = hash('sha256', $upper);

            return response()->json([
                'rq_uuid' => $rq_uuid,
                'rs_datetime' => $now,
                'error_code' => '0000',
                'error_message' => 'success',
                'order_id' => $order_id,
                'reconcile_id' => strtotime("now"),
                'reconcile_datetime' => $now,
                'signature' => $signature_res
                ]
            ,200);
        } catch (\Exception $e) {
            return response()->json([
                'rq_uuid' => $rq_uuid,
                'rs_datetime' => $now,
                'error_code' => '1001',
                'error_message' => $e->getMessage(),
                ]
            ,200);
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
                "order_id":'.$time.',
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
            'authorization' => 'Basic '.$base64username,
            'content-type' => 'application/json',
        ],
        ]);

        echo $response->getBody();
        // return response()->json($response->getBody(), 200);
    }

    public function addManualData()
    {
        return view('general.add-data-manual');
    }

    public function postadddatamanual(Request $request)
    {
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

        $numbers = '1234567890';
        $randoms = array();
        $numCount = strlen($numbers) - 1;
        for ($i = 0; $i < 4; $i++) {
            $n = rand(0, $numCount);
            $randoms[] = $numbers[$n];
        }
        $idcomplement = implode($randoms);
        $id_trx = $prefix.$prefix_fakultas."-".time().$idcomplement;

        $t = new TicketOwner();
        $t->nama = $request->nama;
        $t->id_tiket = $id_trx;
        // $t->save();

        $qrcode = base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($id_trx));
        // $qrcode = QrCode::generate($id_trx);

        $data["name"] = $request->nama;
        $data["nomer"] = $id_trx;
        $data['qr'] = $qrcode;

        $customPaper = array(0,0,1080,1660);
        $pdf = PDF::loadview('pdf.tiket', $data);
        $pdf->setPaper($customPaper);
    	return $pdf->stream("Ticket - $id_trx.pdf");
    }
}
