<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\Pkh;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

class GeneratePkhController extends Controller
{
    public function generatePdfPkh()
    {
        $penerima = Pkh::get();
        $data = [
            'title' => 'Laporan Penerima Program Keluarga Harapan',
            'penerima' => $penerima,
        ];

        $pdf = App::make('dompdf.wrapper');

        // Menggunakan view 'staffdesa.cetak.pkh' untuk merender HTML
        $pdf->loadView('pkh.cetak.pkh', $data);

        // Menggunakan stream() untuk menampilkan dokumen PDF
        return $pdf->stream('laporanpkh.pdf');
    }
}