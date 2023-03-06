<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ScanController extends Controller
{
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
}
