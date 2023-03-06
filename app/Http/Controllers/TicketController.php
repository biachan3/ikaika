<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Ticket;
use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
        $result['event']=json_decode(json_encode(DB::table('events')
        ->select('*')
        ->get(), true));
        $result['bank']=json_decode(json_encode(DB::table('banks')
        ->select('*')
        ->get(), true));
        return view('ticket.order', compact('result'));
    }
    public function create(Request $id)
    {
        $result['event_id'] =$id['eventId'];
        $result['attendees']=$id['attendees'];
        $result['price'] =$id['eventPrice'] * $result['attendees'] ;
        $result['bank']=json_decode(json_encode(DB::table('banks')
        ->select('*')
        ->get(), true));
        return view('ticket.create', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//     public function store(Request $data)
//     {
//         $destinationPath = '/uploads';

//         $property_features_image = $data["proof"]->getClientOriginalExtension();
//         $data["proof"]->move(public_path($destinationPath), $property_features_image);
//         $data["proof"] = $data["proof"]->getClientOriginalName();
//         $ticket = Ticket::create([
//             'id'     => Carbon::now(),
//             'event_id'     => $data['eventId'],
//             'bank_id'    => $data['bank'],
//             'users_id'     => Auth::user()->id,
//             'date'     => Carbon::now(),
//             'amount'     => $data['eventPrice'],
//             'qr' => "nanti",
//             'status' => 0,
//             'proof' => $data['proof'],
//         ]);
// $ticket->save();
// $id = $ticket->id;
//         for ($i = 0; $i < $data['eventAttendees']; $i++) {
//             Attendee::create([
//                 'ticket_id'     => Carbon::now(),
//                 'name'    => $data['attendName'][$i],
//                 'year'     => $data['attendYear'][$i],
//                 'faculty'     => $data['attendFaculty'][$i],
//             ]);
//         }
//         return view('dashboard', []);
//     }
    public function store(Request $data)
    {
        $prefix = "";
        $prefix_fakultas = "";
        $fakultas = $data->fakultas;

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
            case "teknobiologi":
                $prefix_fakultas = "FTB";
                break;
            case "kedokteran":
                $prefix_fakultas = "FK";
                break;
            default:
                $prefix_fakultas = "";
        }

        if($data->donation){
            $prefix = "TO-";
        }else{
            $prefix = "TD-";
        }
        $id_trx = $prefix.time();
        dd($id_trx);

        //here
    }
    public function store1()
    {
        $prefix = "";
        $data=false;
        if($data){
            $prefix = "TI-";
        }else{
            $prefix = "TD-";
        }
        $id_trx = $prefix.time();
        dd($id_trx);

        //here
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
