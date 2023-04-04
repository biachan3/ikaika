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
        $signkey = "5jvmfze7dgc9enof";
        $datetime = "2021-10-23 22:51:45";
        $orderid = "test001";
        $model = "SENDINVOICE";
        $comcode = "SGWIKABUAYA";
        $amount = 100000;
        $ccy = "IDR";
        $uuid="80784df2-accb-46fc-92f4-8d3103b38408";
        // $uuid = Uuid::generate();

        $uppercase = strtoupper("##$signkey##$uuid##$datetime##$orderid##$amount##$ccy##$comcode##$model##");
        $signature = hash('sha256', $uppercase);
        echo $signature." + ".$uppercase;
    }
    public function inquiryProcess(Request $request)
    {
        $rq_uuid = $request->rq_uuid;
        $rq_datetime = $request->rq_datetime;
        $rq_password = $request->password;
        $rq_signature = $request->signature;
        $rq_comcode = $request->member_id;
        $rq_orderid = $request->order_id;
        $now = Carbon::now();

        $signkey = "5jvmfze7dgc9enof";
        $model = "INQUIRY-RS";

        $signature_res = hash('sha256', strtoupper("##$signkey##$rq_uuid##$rq_datetime##$rq_orderid##0000##$model##"));
        return response()->json([
            'rq_uuid' => $rq_uuid,
            'rs_datetime' => $now,
            'error_code' => '0000',
            'error_message' => 'success',
            'order_id' => $rq_orderid,
            'amount' => '100000',
            'ccy' => 'IDR',
            'description' => 'Tiket Reuni',
            'trx_date' => $now,
            'signature' => $signature_res
            ]
        ,200);

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
            $url_endpoint = 'https://api.midtrans.com/v2/charge';
        } else {
            $url_endpoint = 'https://api.sandbox.midtrans.com/v2/charge';
        }

        //Prepare api
        $client = new \GuzzleHttp\Client();
        $base64username = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $gross_amount = 0;
        $bank_transfer_fee = 4000;
        $tax_bank_transfer_fee_percentage = 11/100;
        $total_bank_transfer_fee = ($bank_transfer_fee + ($bank_transfer_fee * $tax_bank_transfer_fee_percentage));
        $is_bank_transfer = str_contains($method, '_va');

        $gopay_fee_percentage = 2.1/100;
        $qris_fee_percentage = 0.8/100;

        $total_amount_tx = $data->amount + $data->amount_donasi;
        $fee = 0;
        // $is_bank_transfer=false;
        // $method = "qris";
        // dd($base64username);
        if ($data->transaction_status == null) {
            if ($is_bank_transfer) {
                $gross_amount = $total_amount_tx + $total_bank_transfer_fee;
                $fee = $total_bank_transfer_fee;
            } else {
                if($method == "gopay"){
                    $total_gopay_fee = ($total_amount_tx * $gopay_fee_percentage);
                    $fee = $total_gopay_fee;
                    $gross_amount = $total_amount_tx + $total_gopay_fee;
                } else if($method == "qris") {
                    $total_qris_fee = ($total_amount_tx * $qris_fee_percentage);
                    $fee = $total_qris_fee;
                    $gross_amount = $total_amount_tx + $total_qris_fee;
                }
            }


            if ($method == "bca_va" || $method == "bri_va" || $method == "bni_va" || $method == "permata_va") {
                try {
                    $bank = "";
                    if ($method == "bca_va") {
                        $bank = "bca";
                    } else if($method == "bri_va") {
                        $bank = "bri";
                    } else if($method == "bni_va"){
                        $bank = "bni";
                    }else {
                        $bank='permata';
                    }
                    $response = $client->request('POST', $url_endpoint, [
                        'body' => '{
                            "payment_type": "bank_transfer",
                            "transaction_details": {
                              "order_id": "'.$data->id.'",
                              "gross_amount": '.ceil($gross_amount).'
                            },
                            "bank_transfer": {
                              "bank": "'.$bank.'"
                            }
                          }',
                        'headers' => [
                          'accept' => 'application/json',
                          'authorization' => 'Basic '.$base64username,
                          'content-type' => 'application/json',
                        ],
                      ]);
                    // echo $response->getBody();
                    $obj_response = json_decode($response->getBody());
                    if($obj_response->status_code == "201"){
                        $data->payment_method = $method;
                        $data->status = $obj_response->transaction_status;
                        $data->payment_expiry_time = $obj_response->expiry_time;
                        $data->payment_media = $obj_response->va_numbers[0]->va_number;
                        $data->gross_amount = $gross_amount;
                        $data->midtrans_tx_id = $obj_response->transaction_id;
                        $data->save();
                    } else if($obj_response->status_code == "406"){
                        //
                    } else {
                        throw new Exception("error response : ".$obj_response->status_code);

                    }
                } catch(Exception $e) {
                    echo 'Message: ' .$e->getMessage();
                }

            } else if($method == "qris"){
                try {
                    $response = $client->request('POST', $url_endpoint, [
                        'body' => '{
                            "payment_type": "qris",
                            "transaction_details": {
                              "order_id": "'.$data->id.'",
                              "gross_amount": '.ceil($gross_amount).'
                            },
                            "qris": {
                              "acquirer": "gopay"
                            }
                          }',
                        'headers' => [
                          'accept' => 'application/json',
                          'authorization' => 'Basic '.$base64username,
                          'content-type' => 'application/json',
                        ],
                      ]);
                    // echo $response->getBody();
                    $obj_response = json_decode($response->getBody());
                    if($obj_response->status_code == "201"){
                        $data->payment_method = $method;
                        $data->status = $obj_response->transaction_status;
                        // $data->payment_expiry_time = $obj_response->expiry_time;
                        $data->payment_media = $obj_response->actions[0]->url;
                        $data->gross_amount = $gross_amount;
                        $data->midtrans_tx_id = $obj_response->transaction_id;
                        $data->save();
                    } else if($obj_response->status_code == "406"){
                        //
                    } else {
                        throw new Exception("error response : ".$obj_response->status_code);

                    }
                } catch(Exception $e) {
                    echo 'Message: ' .$e->getMessage();
                }
            }
        }


        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('user.ticket.detailPayment',compact('data','fee','method','obj_response','gross_amount'))->render()
        ),200);
    }

    public function notifHandling(Request $request)
    {
        // dd($request->request->get("transaction_time"));
        $req = $request->request;
        if($req->get("status_code") == "200"){
            $ticket = Ticket::where('midtrans_tx_id', $req->get('transaction_id'))->first();
            // dd($ticket);
            $ticket->status = $req->get("transaction_status");
            // $ticket->detail_tx_response = $req;
            $ticket->save();
            $details = ['nama' => $ticket->name,
                        'email' => $ticket->email,
                        'id_transaksi' => $ticket->id
                        ];

            \Mail::to($ticket->email)->send(new InfoRegistrationMail($details));

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
