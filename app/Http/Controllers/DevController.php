<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Ticket;
use App\Models\Attendee;
use App\Models\TicketOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\InfoRegistrationMail;
use Str;
use Http;
use PDF;
use Storage;
use File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DevController extends Controller
{
    public function index_user()
    {

        return view('user.ticket.orderDev');
    }
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

        $tiket = new Ticket();
        $tiket->id = $id_trx;
        $tiket->event_id = 1;
        $tiket->nama_lengkap = $data->nama;
        $tiket->email = $data->email;
        $tiket->no_hp = $data->no_hp;
        $tiket->fakultas = $data->fakultas;
        $tiket->angkatan = $data->angkatan;
        $tiket->amount = 5000;

        $nominal_donasi = 0;
        if ($data->nominal == null || $data->nominal == "") {
            $nominal_donasi = 0;
        } else {
            $nominal_donasi = $data->nominal;
        }

        $tiket->amount_donasi = $nominal_donasi;
        $tiket->save();

        $t = new TicketOwner();
        $t->nama = $data->nama;
        $t->id_tiket = $id_trx;
        $t->save();


        return redirect()->route('detail.trx',$id_trx);
    }
    public function pdf_manual()
    {
        $id_trx = "TX-TO-FH-0099";
        $qrcode = base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($id_trx));
        // $qrcode = QrCode::generate($id_trx);
        $data["name"] = "Sandy Resa Ramadhan,S.H.,CTA.,CPLA.";
        $data["nomer"] = $id_trx;
        $data['qr'] = $qrcode;

        $customPaper = array(0,0,1080,1660);
        $pdf = PDF::loadview('pdf.tiket', $data);
        $pdf->setPaper($customPaper);
    	return $pdf->stream("Sandy Resa Ramadhan,S.H.,CTA.,CPLA - Ticket - $id_trx.pdf");

    }
}
