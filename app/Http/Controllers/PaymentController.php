<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.payment.index');
    }
    public function getVirtualAccount(Request $request)
    {
        $data = Ticket::find($request->id);
        $method = $request->method;
        $obj_response ="";

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


            if ($method == "bca_va") {
                try {

                    $response = $client->request('POST', 'https://api.sandbox.midtrans.com/v2/charge', [
                        'body' => '{
                            "payment_type": "bank_transfer",
                            "transaction_details": {
                              "order_id": "'.$data->id.'",
                              "gross_amount": '.$gross_amount.'
                            },
                            "bank_transfer": {
                              "bank": "bca"
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

            } else {
                # code...
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
}
