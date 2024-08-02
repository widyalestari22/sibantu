<?php

namespace App\Http\Controllers;

use App\Models\Pkh;
use App\Models\Penerima;
use App\Models\Penyaluran;
use Illuminate\Http\Request;
use App\Models\PenyaluranPkh;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

class GeneratePDfPkhController extends Controller
{
    public function generatePdfPkhTAmpil()
    {
        $penerima = Pkh::get();
        $data = [
            'title' => 'Laporan Penerima Bantuan PKH',
            'penerima' => $penerima,
        ];

        $pdf = App::make('dompdf.wrapper');

        // Menggunakan view 'staffdesa.cetak.pkh' untuk merender HTML
        $pdf->loadView('staffdesa.cetak.pkh', $data);

        // Menggunakan stream() untuk menampilkan dokumen PDF
        return $pdf->stream('laporanpkh.pdf');
    }
    public function generatePdfBlt()
    {
        $penerima = Penerima::get();
        $data = [
            'title' => 'Laporan Penerima Bantuan Langsung Tunai',
            'penerima' => $penerima,
        ];

        $pdf = App::make('dompdf.wrapper');

        // Menggunakan view 'staffdesa.cetak.pkh' untuk merender HTML
        $pdf->loadView('staffdesa.cetak.blt', $data);

        // Menggunakan stream() untuk menampilkan dokumen PDF
        return $pdf->stream('laporanblt.pdf');
    }

    // public function cetak()
    // {
    //     $penyaluran = Penyaluran::with('penerima');
    //     $data = [
    //         'title' => 'Laporan Penyaluran Bantuan Langsung Tunai',
    //         'penyaluran' => $penyaluran,
    //     ];

    //     $pdf = App::make('dompdf.wrapper');

    //     // Menggunakan view 'staffdesa.cetak.pkh' untuk merender HTML
    //     $pdf->loadView('staffdesa.cetak.salurblt', $data);

    //     // Menggunakan stream() untuk menampilkan dokumen PDF
    //     return $pdf->stream('laporapenyalurannblt.pdf');
    // }
    public function cetak()
    {
        $penyaluran = Penyaluran::with('penerima')->get();
        $data = [
            'title' => 'Laporan Penyaluran Bantuan Langsung Tunai',
            'penyaluran' => $penyaluran,
        ];

        $pdf = App::make('dompdf.wrapper');

        // Menggunakan view 'staffdesa.cetak.salurblt' untuk merender HTML
        $pdf->loadView('staffdesa.cetak.salurblt', $data);

        // Menggunakan stream() untuk menampilkan dokumen PDF
        return $pdf->stream('laporapenyalurannblt.pdf');
    }
    public function pkhbelum()
    {
        // Mengambil semua ID Penerima
        $allPenerimaIds = Pkh::pluck('id_pkh');

        // Mengambil ID Penerima yang tidak ada di Penyaluran
        $penerimaPKhNotInPenyaluran = Pkh::whereNotIn('id_pkh', PenyaluranPkh::pluck('id_pkh'))
            ->get();
        $data = [
            'title' => 'Laporan Penyaluran Bantuan PKH',
            'penerima' => $penerimaPKhNotInPenyaluran,
        ];

        $pdf = App::make('dompdf.wrapper');

        // Menggunakan view 'staffdesa.cetak.salurblt' untuk merender HTML
        $pdf->loadView('staffdesa.cetak.belumpkh', $data);

        // Menggunakan stream() untuk menampilkan dokumen PDF
        return $pdf->stream('laporapenyaluranpkh.pdf');
    }
    public function bltbelum()
    {
        // Mengambil semua ID Penerima
        $allPenerimaIds = Penerima::pluck('id_penerima');

        // Mengambil ID Penerima yang tidak ada di Penyaluran
        $penerimaPKhNotInPenyaluran = Penerima::whereNotIn('id_penerima', Penyaluran::pluck('id_penerima'))
            ->get();
        $data = [
            'title' => 'Laporan Penyaluran Bantuan Langsung Tunai',
            'penerima' => $penerimaPKhNotInPenyaluran,
        ];

        $pdf = App::make('dompdf.wrapper');

        // Menggunakan view 'staffdesa.cetak.salurblt' untuk merender HTML
        $pdf->loadView('staffdesa.penyaluran.belumcetak', $data);

        // Menggunakan stream() untuk menampilkan dokumen PDF
        return $pdf->stream('laporapenyalurannblt.pdf');
    }
}
