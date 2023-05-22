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
        $this->data = $data;
    }
    public function view(): View
    {
        $data = $this->data;
        // dd($data);
        return view('admin.export.excel_download_sukses', compact('data'));
    }

}
