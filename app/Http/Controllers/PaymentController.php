<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.payment.index');
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
                "gross_amount":290000
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
