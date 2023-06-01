<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Ticket;

class ScanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.scanner.index');
    }
    public function generateQR($id)
    {
        $qrcode = base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate(url($id)));
        $qrcode = QrCode::generate($id);

        // dd($qrcode)
        return view('admin.qrcode.index', compact('qrcode'));
    }
    public function getDetailData(Request $request)
    {
        $data = Ticket::find($request->id);
        if ($data == null) {
            return response()->json(array(
                'status' => 'notfound'
            ), 200);
        } else {
            return response()->json(array(
                'status' => 'oke',
                'nama' => $data->nama_lengkap,
                'msg' => view('admin.scanner.detailTiket', compact('data'))->render()
            ), 200);
        }
    }

    public function changeStatus(Request $request)
    {
        $data = Ticket::find($request->id);
        $data->is_take_merch = $request->merch;
        $data->is_check_in = $request->attend;
        $data->check_in_time = date("Y-m-d H:i:s");
        $data->save();
        // dd($request);

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('admin.scanner.detailTiket', compact('data'))->render()
        ), 200);
    }
}
