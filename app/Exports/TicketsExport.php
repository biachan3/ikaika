<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;

class TicketsExport implements FromView
{
    use Exportable;
    protected $data;

    function __construct($data) {
        $this->tagihan = $tagihan;
    }
    public function view(): View
    {
        $data = $this->data;

        return view('admin.export.excel_donwload_sukses', compact('data'));
    }

}
