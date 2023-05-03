<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Ticket;
use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


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
    public function index_user()
    {

        return view('user.ticket.order');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order($id)
    {
        $result = [];
        $result['event'] = json_decode(json_encode(DB::table('events')
            ->select('*')
            ->get(), true));
        $result['bank'] = json_decode(json_encode(DB::table('banks')
            ->select('*')
            ->get(), true));
        return view('ticket.order', compact('result'));
    }
    public function create()
    {
        // $result['event_id'] =$id['eventId'];
        // $result['attendees']=$id['attendees'];
        // $result['price'] =$id['eventPrice'] * $result['attendees'] ;
        // $result['bank']=json_decode(json_encode(DB::table('banks')
        // ->select('*')
        // ->get(), true));
        return view('ticket.create');
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
    public function regis(Request $data)
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

        if($data->donation > 0){
            $prefix = "TD-";
        }else{
            $prefix = "TO-";
        }

        //Ngitung random buat bikin unik
        // $numbers = '1234567890';
        // $randoms = array();
        // $numCount = strlen($numbers) - 1;
        // for ($i = 0; $i < 4; $i++) {
        //     $n = rand(0, $numCount);
        //     $randoms[] = $numbers[$n];
        // }
        $last = Ticket::orderBy('created_at','desc')->first();
        $idcomplement = substr($last->id,-4) + 1;
        $id_trx = "TX-".$prefix.$prefix_fakultas."-".str_pad($idcomplement,4,"0",STR_PAD_LEFT);;
        // dd($id_trx);
        $tiket = new Ticket();
        $tiket->id = $id_trx;
        $tiket->event_id = 1;
        $tiket->nama_lengkap = $data->nama;
        $tiket->email = $data->email;
        $tiket->no_hp = $data->no_hp;
        $tiket->fakultas = $data->fakultas;
        $tiket->angkatan = $data->angkatan;
        $tiket->amount = 150000;

        $nominal_donasi = 0;
        if ($data->nominal == null || $data->nominal == "") {
            $nominal_donasi = 0;
        } else {
            $nominal_donasi = $data->nominal;
        }
        // dd($nominal_donasi);

        $tiket->amount_donasi = $nominal_donasi;
        $tiket->save();

        // dd($data);
        return redirect()->route('detail.trx',$id_trx);
        //here
    }
    public function detail_transaki($id)
    {
        $detail_tx = Ticket::find($id);
        // dd($detail_tx);
        $qrcode="";
        if ($detail_tx != null) {
            if($detail_tx->transaction_status =="Sukses" || $detail_tx->transaction_status =="settlement")
            {
                $qrcode = base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate(url($detail_tx->id)));
                $qrcode = QrCode::generate($detail_tx->id);

            }
            return view('user.ticket.orderDetail', compact('detail_tx','qrcode'));
        } else {
            return view('user.ticket.orderDetail404', compact('id'));
            # code...
        }


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
    public function search(Request $data)
    {
        $check = [];
        $result = DB::table('events')
            ->select('events.name as event_name', 'tickets.id as ticket_id', 'users.name as name', 'tickets.date as date', 'tickets.qr as qr', 'tickets.amount as price')
            ->join('tickets', 'events.id', '=', 'tickets.event_id')
            ->join('users', 'users.id', '=', 'tickets.users_id')
            ->where('tickets.id', '=', $data['id'])
            ->get();
        if ($result['name'] = $data['name']) {
            $check['check'] = true;
            $check['name'] = $result['name'];
            $check['date'] = $result['date'];
            $check['event'] = $result['event']['name'];
        }

        return view('ticket.search', compact('check'));
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
