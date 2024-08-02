<?php

namespace App\Http\Controllers;

use App\Models\Pkh;
use App\Models\Penerima;
use App\Models\Penyaluran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PkhDashboardController extends Controller
{
    public function index()
    {
        $penerimapkh = Pkh::count();
        $penerimablt = Penerima::count();

        $total = $penerimablt + $penerimapkh;
        // Mendapatkan jumlah penerima bantuan dengan ID tertentu
        $idPenerima = 1; // Ganti dengan ID yang sesuai
        $totalPenerima = Penerima::penerimaById($idPenerima)->count();


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
        return view('pkh.dashboard.index', compact('penerimapkh', 'jumlahPenerimaNotInPenyaluran', 'totalPenerima', 'totalPkh', 'totalSemua', 'penerimapkh', 'penerimablt', 'total'));
    }
}
