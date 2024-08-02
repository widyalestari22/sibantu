<?php

namespace App\Http\Controllers;

use App\Models\Pkh;
use App\Models\Penerima;
use App\Models\Penyaluran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RtDashboardController extends Controller
{
    //


    // public function index()
    // {
    //     $totalPKH = Pkh::statusPKH()->count();

    //     // Mendapatkan jumlah penerima bantuan dengan status lain (misal: 'BLT')
    //     $totalBLT = Penerima::statusBLT()->count();

    //     // Menghitung total semua penerima bantuan
    //     $totalSemua = $totalPKH + $totalBLT;
    //     return view('rt.dashboard.index ', compact('totalPKH', 'totalBLT', 'totalSemua'));
    // }\
    // public function index()
    // {
    //     $totalPKH = Pkh::statusPKH()->count();

    //     // Mendapatkan jumlah penerima bantuan dengan status lain (misal: 'BLT')
    //     $totalBLT = Penerima::statusBLT()->count();

    //     // Menghitung total semua penerima bantuan
    //     $totalSemua = $totalPKH + $totalBLT;

    //     return view('rt.dashboard.index', compact('totalPKH', 'totalBLT', 'totalSemua'));
    // }

    // public function index()
    // {
    //     // Mendapatkan jumlah penerima bantuan dengan status 'PKH'
    //     $totalPKH = Pkh::statusPKH()->count();

    //     // Mendapatkan jumlah penerima bantuan dengan status 'BLT'
    //     $totalBLT = Penerima::penerimaBLT()->count();

    //     // Menghitung total semua penerima bantuan
    //     $totalSemua = $totalPKH + $totalBLT;

    //     return view('rt.dashboard.index', compact('totalPKH', 'totalBLT', 'totalSemua'));
    // }
    public function index()
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
        return view("rt.dashboard.index", compact('totalPenerima', 'totalPkh', 'totalSemua', 'penerimapkh', 'penerimablt', 'total', 'jumlahPenerimaNotInPenyaluran'));
    }
}
