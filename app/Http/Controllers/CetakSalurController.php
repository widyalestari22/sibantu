<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\Penyaluran;
use Illuminate\Http\Request;
use App\Models\PenyaluranPkh;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

class CetakSalurController extends Controller
{
    // public function cetaksalurblt()
    // {
    //     $penerima = Penerima::get();
    //     $data = [
    //         'title' => 'Laporan Penerima Bantuan Langsung Tunai',
    //         'penerima' => $penerima,
    //     ];

    //     $pdf = App::make('dompdf.wrapper');

    //     // Menggunakan view 'staffdesa.cetak.pkh' untuk merender HTML
    //     $pdf->loadView('staffdesa.penyaluran.cetak', $data);

    //     // Menggunakan stream() untuk menampilkan dokumen PDF
    //     return $pdf->stream('laporanblt.pdf');
    // }
    public function cetaksalurblt()
    {
        // Mengambil data penyaluran dengan relasi penerima
        $penyaluran = Penyaluran::with('penerima')->latest()->get();

        $data = [
            'title' => 'Laporan Penyaluran Bantuan Langsung Tunai',
            'penyaluran' => $penyaluran,
        ];

        $pdf = App::make('dompdf.wrapper');

        // Menggunakan view 'staffdesa.penyaluran.cetak' untuk merender HTML
        $pdf->loadView('staffdesa.penyaluran.cetak', $data);

        // Menggunakan stream() untuk menampilkan dokumen PDF
        return $pdf->stream('laporanpenyaluranblt.pdf');
    }
    public function cetaksalurpkh()
    {
        // Mengambil data penyaluranpkh dengan relasi penerima
        $penyaluran = PenyaluranPkh::with('penerima')->latest()->get();

        $data = [
            'title' => 'Laporan Penyaluran Bantuan Program Keluarga Harapan',
            'penyaluran' => $penyaluran,
        ];

        $pdf = App::make('dompdf.wrapper');

        // Menggunakan view 'staffdesa.penyaluran.cetak' untuk merender HTML
        $pdf->loadView('staffdesa.penyalurans.cetak', $data);

        // Menggunakan stream() untuk menampilkan dokumen PDF
        return $pdf->stream('laporanpenyaluranblt.pdf');
    }
}
