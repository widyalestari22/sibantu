<?php

namespace App\Http\Controllers;

use App\Models\Penyaluran;
use App\Models\Pkh;
use Illuminate\Http\Request;
use App\Models\PenyaluranPkh;
use Illuminate\Routing\Controller;

class StafPenyaluranPkhController extends Controller
{
    public function index(Request $request)
    {
        $penyaluran = PenyaluranPkh::with('penerima')->latest()->get();
        // $penyaluran = Pkh::all();
        $penerima = Pkh::where('keterangan', 'Iya')->get();

        return view('staffdesa.penyalurans.index', compact('penyaluran', 'penerima'));
    }

    // public function cetak(Request $request)
    // {
    //     $penyaluran = PenyaluranPkh::with('penerima')->get();
    //     $penerima = Pkh::where('keterangan', 'Iya')->get();
    //     return view('staffdesa.penyalurans.cetak', compact('penyaluran', 'penerima'));
    // }
    // public function cetak(Request $request)
    // {
    //     $penyaluran = PenyaluranPkh::with('penerima')->where('keterangan', 'Iya')->get();
    //     $penerima = Pkh::where('keterangan', 'Iya')->get();

    //     return view('staffdesa.penyalurans.cetak', compact('penyaluran', 'penerima'));
    // }


    public function store(Request $request)
    {

        $request->validate([
            'id_pkh' => 'required',
            'jumlah_bantuan' => 'required',
            'tanggal_penyaluran' => 'required',
        ]);

        $penyaluran = new PenyaluranPkh();
        $penyaluran->id_pkh = $request->id_pkh;
        $penyaluran->jumlah_bantuan = $request->jumlah_bantuan;
        $penyaluran->tanggal_penyaluran = now(); // Atur nilai 'tanggal_penyaluran'

        $penyaluran->save(); // Simpan objek Penyaluran ke dalam database

        // Tambahan: Mungkin Anda perlu redirect ke halaman tertentu setelah penyimpanan data
        return redirect()->route('penyaluran.pkh'); // Sesuaikan dengan rute yang benar
    }


    public function edit($id_penyaluran)
    {
        $penyaluran = PenyaluranPkh::findOrFail($id_penyaluran);

        return response()->json($penyaluran); // Mengirimkan data dalam format JSON
    }

    public function update(Request $request, $id_penyaluran)
    {
        $penyaluran = PenyaluranPkh::findOrFail($id_penyaluran);
        $request->validate([
            'id_pkh' => 'required',
            'jumlah_bantuan' => 'required',
            'tanggal_penyaluran' => 'required',
        ]);

        // Ambil data penyaluran berdasarkan $id yang diterima
        $penyaluran = PenyaluranPkh::findOrFail($id_penyaluran);

        // Update nilai kolom-kolom berdasarkan input dari form
        $penyaluran->id_pkh = $request->id_pkh;
        $penyaluran->jumlah_bantuan = $request->jumlah_bantuan;
        $penyaluran->tanggal_penyaluran = $request->tanggal_penyaluran;

        $penyaluran->save(); // Simpan perubahan ke dalam database

        // Redirect ke halaman tertentu setelah penyimpanan data
        return redirect()->route('penyaluran.pkh')->with('success', 'Data Berhasil Diedit');
    }
    public function destroy($id_penyaluran)
    {
        $penyaluran = PenyaluranPkh::findOrFail($id_penyaluran);
        $penyaluran->delete();

        return redirect()->route('penyaluran.pkh')->with('success', 'Data Penerima berhasil dihapus.');
    }
    public function penerimaNotInPenyaluran()
    {
        // Mengambil semua ID Penerima
        $allPenerimaIds = Pkh::pluck('id_penerima');

        // Mengambil ID Penerima yang tidak ada di Penyaluran
        $penerimaPKhNotInPenyaluran = Pkh::whereNotIn('id_penerima', PenyaluranPkh::pluck('id_penerima'))
            ->get();

        return view('penerima-not-in-penyaluran', compact('penerimaPKhNotInPenyaluran'));
    }
}
