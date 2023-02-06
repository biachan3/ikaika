<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('template.ticket', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order($id){
        $result = [];
        $result['event'] = DB::table('event')
        ->select('*')
        ->where('id','=',$id)
        ->get();
        $result['bank']=DB::table('bank')
        ->select('*')
        ->get();
        return view('ticket.order', compact('result'));
    }
    public function create($id)
    {
        $result = [];
        $result['event'] = DB::table('event')
        ->select('*')
        ->where('id','=',$id)
        ->get();
        $result['bank']=DB::table('bank')
        ->select('*')
        ->get();
        return view('event.index', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ticket::create([
            'event_id'     => $data['ticket']['event_id'],
            'bank_id'    => $data['ticket']['bank_id'],
            'users_id'     => $data['ticket']['users_id'],
            'date'     => $data['ticket']['date'],
            'amount'     => $data['ticket']['amount'],
            'qr' => $data['ticket']['qr'],
            'status' => 0,
        ]);
        foreach ($data['attendee'] as $attendee) {
            Attendee::create([
                'ticket_id'     => $data['ticket']['_id'],
                'bank_id'    => $data['ticket']['bank_id'],
                'users_id'     => $data['ticket']['users_id'],
                'date'     => $data['ticket']['date'],
                 'amount'     => $data['ticket']['amount'],
                'qr' => $data['ticket']['qr'],
                'status' => 0,
            ]);
        }
        return view('home', []);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}