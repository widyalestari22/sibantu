<?php

namespace App\Http\Controllers;

use App\Models\Pkh;
use App\Models\Penerima;
use App\Models\Pengajuan;
use App\Models\Pengumuman;
use App\Models\Penyaluran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MasyarakatController extends Controller
{
    public function index()
    {
        $penerimapkh = Pkh::count();
        $penerimablt = Penerima::count();

        $pengumuman = Pengumuman::where('status', 'Aktif')->get();

        $total = $penerimablt + $penerimapkh;
        // Mendapatkan jumlah penerima bantuan dengan ID tertentu
        $idPenerima = 1; // Ganti dengan ID yang sesuai
        $totalPenerima = Penerima::penerimaById($idPenerima)->count();

        // Mendapatkan jumlah penerima bantuan PKH dengan ID tertentu
        $idPkh = 1; // Ganti dengan ID yang sesuai
        $totalPkh = Pkh::pkhById($idPkh)->count();

        // Menghitung total semua penerima bantuan
        $totalSemua = $totalPenerima + $totalPkh;
        $penerimapkh = Pkh::count();
        $penerimablt = Penerima::count();
        $message = null;

        $total = $penerimablt + $penerimapkh;

        // Mendapatkan jumlah penerima bantuan dengan ID tertentu
        $idPenerima = 1; // Ganti dengan ID yang sesuai
        $totalPenerima = Penerima::penerimaById($idPenerima)->count();

        // Mendapatkan jumlah penerima bantuan PKH dengan ID tertentu
        $idPkh = 1; // Ganti dengan ID yang sesuai
        $totalPkh = Pkh::pkhById($idPkh)->count();

        // Menghitung total semua penerima bantuan
        $totalSemua = $totalPenerima + $totalPkh;

        $activePengumuman = Pengumuman::where('status', 'Aktif')->first();

        // Mendapatkan jumlah penerima bantuan PKH dengan ID tertentu
        $idPkh = 1; // Ganti dengan ID yang sesuai
        $totalPkh = Pkh::pkhById($idPkh)->count();

        $allPenerimaIds = Penerima::pluck('id_penerima');

        // Mengambil ID Penerima yang tidak ada di Penyaluran
        $penerimaNotInPenyaluran = Penerima::whereNotIn('id_penerima', Penyaluran::pluck('id_penerima'))
            ->get();

        // Menghitung jumlah ID Penerima yang tidak ada di Penyaluran
        $jumlahPenerimaNotInPenyaluran = $penerimaNotInPenyaluran->count();



        // return view('rt.dashboard.index', compact('totalPenerima', 'totalPkh', 'totalSemua', 'penerimapkh', 'penerimablt', 'total'));
        return view('masyarakat.index', compact('jumlahPenerimaNotInPenyaluran', 'totalPenerima', 'totalPkh', 'totalSemua', 'penerimapkh', 'penerimablt', 'total', 'message', 'pengumuman'));
    }

    public function cari(Request $request)
    {
        // Code
        $penerimapkh = Pkh::count();
        $penerimablt = Penerima::count();
        $pengumuman = Pengumuman::where('status', 'Aktif')->get();


        $total = $penerimablt + $penerimapkh;
        // Mendapatkan jumlah penerima bantuan dengan ID tertentu
        $idPenerima = 1; // Ganti dengan ID yang sesuai
        $totalPenerima = Penerima::penerimaById($idPenerima)->count();

        // Mendapatkan jumlah penerima bantuan PKH dengan ID tertentu
        $idPkh = 1; // Ganti dengan ID yang sesuai
        $totalPkh = Pkh::pkhById($idPkh)->count();

        // Menghitung total semua penerima bantuan
        $totalSemua = $totalPenerima + $totalPkh;
        $penerimapkh = Pkh::count();
        $penerimablt = Penerima::count();
        $nik = $request->nik;
        $result = Penerima::where('nik', $nik)->first();
        $message = null;
        $activePengumuman = null;
        $allPenerimaIds = Penerima::pluck('id_penerima');

        // Mengambil ID Penerima yang tidak ada di Penyaluran
        $penerimaNotInPenyaluran = Penerima::whereNotIn('id_penerima', Penyaluran::pluck('id_penerima'))
            ->get();

        // Menghitung jumlah ID Penerima yang tidak ada di Penyaluran
        $jumlahPenerimaNotInPenyaluran = $penerimaNotInPenyaluran->count();

        if ($result) {
            $message = "Anda adalah penerima bantuan BLT";
            return view('masyarakat.index', compact('message', 'pengumuman', 'total', 'jumlahPenerimaNotInPenyaluran'));
        }

        $result = Pkh::where('nik', $nik)
            ->first();

        if ($result) {
            $message = "Anda adalah penerima bantuan PKH";
            return view('masyarakat.index', compact('message', 'pengumuman', 'total', 'jumlahPenerimaNotInPenyaluran'));
        }

        $result = Pengajuan::where('nik', $nik)->first();

        if ($result) {
            $message = "Anda masuk dalam pengajuan dengan validasi: " .  $result->validasi;
            return view('masyarakat.index', compact('message', 'pengumuman', 'total', 'jumlahPenerimaNotInPenyaluran'));
        }


        $message = "Anda tidak termasuk dalam pengajuan dan penerima";
        return view('masyarakat.index', compact('message', 'pengumuman', 'total', 'jumlahPenerimaNotInPenyaluran'));
    }
    // public function pengumuman()
    // {
    //     $pengumuman = Pengumuman::where('status', 'Aktif')->get();

    //     return view('masyarakat.index', compact('activePengumuman'));
    // }

    // public function pengumuman()
    // {
    //     // Dapatkan semua pengumuman yang aktif
    //     $activePengumuman = Pengumuman::all();

    //     // Kirim data ke view
    //     return view('masyarakat.index', compact('activePengumuman'));
    // }
}