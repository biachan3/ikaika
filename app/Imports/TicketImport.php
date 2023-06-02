<?php

namespace App\Imports;

use App\Models\Ticket;
use App\Models\TicketOwner;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use File;
use Log;
use Exception;

class TicketImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $idcomplement = 1558 + 1;

        foreach ($rows as $row)
        {
            $nomer = $row["no"];
            $prefix = "TO-";
            $prefix_fakultas = "";
            // dd($row);
            $fakultas = $row['fakultas'];

            switch ($fakultas) {
                case "Farmasi":
                    $prefix_fakultas = "FF";
                    break;
                case "Hukum":
                    $prefix_fakultas = "FH";
                    break;
                case "FBE":
                    $prefix_fakultas = "FBE";
                    break;
                case "Politeknik":
                    $prefix_fakultas = "POL";
                    break;
                case "Psikologi":
                    $prefix_fakultas = "FP";
                    break;
                case "Teknik":
                    $prefix_fakultas = "FT";
                    break;
                // case "industri":
                //     $prefix_fakultas = "FIK";
                //     break;
                case "Teknobiologi":
                    $prefix_fakultas = "FTB";
                    break;
                case "Kedokteran":
                    $prefix_fakultas = "FK";
                    break;
                case "kia":
                    $prefix_fakultas = "KIA";
                    break;

                default:
                    $prefix_fakultas = "";
            }

            $last = Ticket::orderBy('created_at','desc')->first();
            $id_trx = "TX-".$prefix.$prefix_fakultas."-".str_pad($idcomplement,4,"0",STR_PAD_LEFT);;
            $idcomplement++;

            try {
                $tiket = new Ticket();
                $tiket->id = $id_trx;
                $tiket->event_id = 1;
                $tiket->nama_lengkap = $row['nama'];
                $tiket->fakultas = $row['fakultas'];
                $tiket->angkatan = $row['angkatan'];
                $tiket->no_hp = $row['nomor'];
                $tiket->amount = 150000;
                $tiket->transaction_status = "Sukses - Manual";
                $tiket->save();

                // $t = new TicketOwner();
                // $t->nama = $row['nama'];
                // $t->id_tiket = $id_trx;
                // $t->save();
                // $qrcode = base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($id_trx));
                // $data["name"] = $row['nama'];
                // $data["nomer"] = $id_trx;
                // $data['qr'] = $qrcode;

                // $customPaper = array(0,0,1080,2043.48);
                // $pdf = PDF::loadview('pdf.tiket', $data);
                // $pdf->setPaper($customPaper);

                // $directory_path = public_path("public/pdf/$fakultas");
                // $filename = $row['nama']." - Ticket - $id_trx.pdf";
                Log::info("CETAK MANUAL ID : ".$id_trx."- SUKSES - ".$nomer);
                // $pdf->save(''.$directory_path.'/'.$filename);
                echo "CETAK MANUAL ID : ".$id_trx."- SUKSES - ".$nomer."<br>";
            } catch (\Exception $e) {
                Log::error("CETAK MANUAL ID : ".$id_trx."- gagal - ".$e->getMessage());

                echo 'Message: ' .$e->getMessage();
            }

            // $fileurl = url("/public/public/pdf/$filename");

        }
    }
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
}
