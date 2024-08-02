<?php

namespace App\Http\Controllers;

use App\Models\Pkh;
use App\Models\Penerima;
use App\Models\Penyaluran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StafController extends Controller
{
    function index()
    {
        $penerimapkh = Pkh::count();
        $penerimablt = Penerima::count();

        $total = $penerimablt + $penerimapkh;
        // Mendapatkan jumlah penerima bantuan dengan ID tertentu
        $idPenerima = 1; // Ganti dengan ID yang sesuai
        $totalPenerima = Penerima::penerimaById($idPenerima)->count();

        // Mendapatkan jumlah penerima bantuan PKH dengan ID tertentu
        $idPkh = 1; // Ganti dengan ID yang sesuai
        $totalPkh = Pkh::pkhById($idPkh)->count();

        $allPenerimaIds = Penerima::pluck('id_penerima');

        // Mengambil ID Penerima yang tidak ada di Penyaluran
        $penerimaNotInPenyaluran = Penerima::whereNotIn('id_penerima', Penyaluran::pluck('id_penerima'))
            ->get();

        // Menghitung jumlah ID Penerima yang tidak ada di Penyaluran
        $jumlahPenerimaNotInPenyaluran = $penerimaNotInPenyaluran->count();
        // Menghitung total semua penerima bantuan
        $totalSemua = $totalPenerima + $totalPkh;
        return view("staffdesa.dashboard.index", compact('totalPenerima', 'totalPkh', 'totalSemua', 'penerimapkh', 'penerimablt', 'total', 'jumlahPenerimaNotInPenyaluran'));
    }
    // public function hitungJumlahPenerimaNotInPenyaluran()
    // {
    //     // Menghitung jumlah ID Penerima yang tidak ada di Penyaluran
    //     return Penerima::whereNotIn('id_penerima', Penyaluran::pluck('id_penerima'))
    //     ->count();
    // }
    public function penerimaNotInPenyaluran()
    {
        // Mengambil semua ID Penerima
        $allPenerimaIds = Penerima::pluck('id_penerima');

        // Mengambil ID Penerima yang tidak ada di Penyaluran
        $penerimaNotInPenyaluran = Penerima::whereNotIn('id_penerima', Penyaluran::pluck('id_penerima'))
            ->get();

        // Menghitung jumlah ID Penerima yang tidak ada di Penyaluran
        $jumlahPenerimaNotInPenyaluran = $penerimaNotInPenyaluran->count();

        return view('penerima-not-in-penyaluran', compact('penerimaNotInPenyaluran', 'jumlahPenerimaNotInPenyaluran'));
    }
}
