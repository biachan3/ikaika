<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendee;
use App\Models\Ticket;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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

    public function lunas_manual()
    {
        // $results = Ticket::all();
        $results = Ticket::where('transaction_status', '=', 'Sukses')->orWhere('transaction_status', '=', 'Sukses - Manual')->get();
        // return dd($results);
        return view('admin.sidebar.lunas_manual', compact('results'));
    }
    public function data_kehadiran()
    {
        // $results = Ticket::all();
        $results = Ticket::where('transaction_status', '=', 'Sukses')->orWhere('transaction_status', '=', 'Sukses - Manual')->get();
        // return dd($results);
        return view('admin.sidebar.data_kehadiran', compact('results'));
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
    public function resendWA($id, $no_hp)
    {
        // $no_hp="08125133338";
        $botUrl = 'https://apiikaubaya.waviro.com/api/sendwa';
        $secretKey = 'NJpWs4gWb9vi5Q6hMJPV';
        $nohp = Str::replaceFirst('0', '62', $no_hp);
        $message = 'Berikut Link untuk Ticket Anda : https://reuni55ubaya.com/user/order/' . $id;


        $response = Http::withHeaders([
            'secretkey' => $secretKey,
            'Content-Type' => 'application/json'
        ])->post($botUrl, [
            'nohp' => $nohp,
            'pesan' => $message
        ]);

        return response()->json($response->body());
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
