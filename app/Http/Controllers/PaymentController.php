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

        $response = $client->request('POST', 'https://app.sandbox.midtrans.com/snap/v1/transactions', [
        'body' => '{
            "transaction_details":{
                "order_id":"0001",
                "gross_amount":14000
            },
            "credit_card":{
                "secure":true
            },
            "item_details": [
                {
                  "id": "a01",
                  "price": 10000,
                  "quantity": 1,
                  "name": "Apple"
                },
                {
                  "id": "b02",
                  "price": 4000,
                  "quantity": 1,
                  "name": "Charge"
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
