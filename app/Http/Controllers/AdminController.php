<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendee;
use App\Models\Ticket;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Ticket::all();
        $sdh_lunas = Ticket::all()->where('transaction_status', '=', 'Sukses');
        $blm_lunas = Ticket::all()->where('transaction_status', '!=', 'Sukses');
        $uang_lunas = Ticket::where('transaction_status', '=', 'Sukses')->sum('gross_amount');
        $uang_blm = Ticket::where('transaction_status', '!=', 'Sukses')->sum('gross_amount');
        $jum_sdh = $sdh_lunas->count();
        $jum_blm = $blm_lunas->count();
        $jum_tx = $results->count();
        return view('admin.tiket.index', compact('results', 'jum_tx', 'jum_sdh', 'uang_lunas', 'uang_blm', 'jum_blm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
// return dd($ticket);
        return view('admin.tiket.detail', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function resendWA($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://apidemo.waviro.com/api/sendwa',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "nohp": "628125133338",
            "pesan": "https://reuni55ubaya.com/user/order/'.$ticket->id.'",
          }',
          CURLOPT_HTTPHEADER => array(
            'secretkey:jeB4DfuH2c1kZGaldxY2',
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
