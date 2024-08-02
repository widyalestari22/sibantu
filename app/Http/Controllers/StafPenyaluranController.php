<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\Penyaluran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\PenyaluranPkh;
use App\Models\Pkh;

// dd($penyaluran = Penyaluran::with('Penerima')->get());
// dd($penyaluran = Penyaluran::with('penerima')->get());

class StafPenyaluranController extends Controller
{
    public function index(Request $request)
    {
        // $penyaluran = Penyaluran::with('penerima')->latest()->get();
        $penyaluran = Penyaluran::with('penerima')->latest()->get();
        $penerima = Penerima::all();
        return view('staffdesa.penyaluran.index', compact('penyaluran', 'penerima'));
        //     return view('staffdesa.penyaluran.create', compact('penerima'));
    }
    // public function index(Request $request)
    // {
    //     $penyaluran = PenyaluranPkh::with('penerima')->latest()->get();
    //     // $penerima = Pkh::all();
    //     $penerima = Pkh::where('keterangan', 'Iya')->get();

    //     return view('staffdesa.penyaluran.index', compact('penyaluran', 'penerima'));
    // }
    // public function index(Request $request)
    // {
    //     // $penyaluran = Penyaluran::with('penerima')->latest()->get();
    //     $penyaluran = Penyaluran::with('penerima')->latest()->get();
    //     $penerima = Penerima::all();

    //     // Mengambil ID Penerima yang tidak ada di Penyaluran
    //     $penerimaNotInPenyaluran = Penerima::whereNotIn('id_penerima', Penyaluran::pluck('id_penerima'))
    //         ->get();

    //     // Merge the two collections
    //     $combinedData = $penyaluran->merge($penerimaNotInPenyaluran);

    //     return view('staffdesa.penyaluran.index', compact('combinedData', 'penerima'));
    // }
    public function penerimaNotInPenyaluran()
    {
        // Mengambil semua ID Penerima
        $allPenerimaIds = Penerima::pluck('id_penerima');

        // Mengambil ID Penerima yang tidak ada di Penyaluran
        $penerimaNotInPenyaluran = Penerima::whereNotIn('id_penerima', Penyaluran::pluck('id_penerima'))
            ->get();

        return view('penerima-not-in-penyaluran', compact('penerimaNotInPenyaluran'));
    }
    public function cetakPenyaluran()
    {
        $penyaluran = Penyaluran::with('penerima')->latest()->get();
        $penerima = Penerima::all();
        return view('staffdesa.penyaluran.cetak-penyaluran', compact('penyaluran', 'penerima'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penerima' => 'required',
            'jumlah_bantuan' => 'required',
            'tanggal_penyaluran' => 'required',
        ]);

        $penyaluran = new Penyaluran();
        $penyaluran->id_penerima = $request->id_penerima;
        $penyaluran->jumlah_bantuan = $request->jumlah_bantuan;
        $penyaluran->tanggal_penyaluran = now(); // Atur nilai 'tanggal_penyaluran'

        $penyaluran->save(); // Simpan objek Penyaluran ke dalam database

        // Tambahan: Mungkin Anda perlu redirect ke halaman tertentu setelah penyimpanan data
        return redirect()->route('penyaluran'); // Sesuaikan dengan rute yang benar
    }


    public function edit($id_penyaluran)
    {
        $penyaluran = Penyaluran::findOrFail($id_penyaluran);

        return response()->json($penyaluran); // Mengirimkan data dalam format JSON
    }

    public function update(Request $request, $id_penyaluran)
    {
        $penyaluran = Penyaluran::findOrFail($id_penyaluran);
        $request->validate([
            'id_penerima' => 'required',
            'jumlah_bantuan' => 'required',
            'tanggal_penyaluran' => 'required',
        ]);

        // Ambil data penyaluran berdasarkan $id yang diterima
        $penyaluran = Penyaluran::findOrFail($id_penyaluran);

        // Update nilai kolom-kolom berdasarkan input dari form
        $penyaluran->id_penerima = $request->id_penerima;
        $penyaluran->jumlah_bantuan = $request->jumlah_bantuan;
        $penyaluran->tanggal_penyaluran = $request->tanggal_penyaluran;

        $penyaluran->save(); // Simpan perubahan ke dalam database

        // Redirect ke halaman penyaluran setelah penyimpanan data
        return redirect()->route('penyaluran')->with('success', 'Data Berhasil Diedit');
    }
    // public function belummenerimablt()
    // {
    //     $belummenerimablt = Penyaluran::whereDoesntHave('penerima')->get();

    //     return view('penerima-not-in-penyaluran', compact('belummenerimablt'));
    // }
    public function destroy($id_penyaluran)
    {
        $penyaluran = Penyaluran::findOrFail($id_penyaluran);
        $penyaluran->delete();

        return redirect()->route('penyaluran')->with('success', 'Data Penerima berhasil dihapus.');
    }
}