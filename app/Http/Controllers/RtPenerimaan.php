<?php

namespace App\Http\Controllers;

use App\Models\Pkh;
use App\Models\Penerima;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RtPenerimaan extends Controller
{
    public function bltdd()
    {
        $penerima = Penerima::with('kategori')->get();
        return view('rt.penerimaan.index', compact('penerima'));
    }

    public function pkh()
    {
        $penerima = Pkh::all();
        foreach ($penerima as $data) {
            $jawaban_alasan = explode('|', $data->jawaban_alasan);

            // Menyimpan data yang sudah dipisahkan ke dalam objek $data
            $data->jawaban = $jawaban_alasan[0] ?? '';
            $data->alasan = $jawaban_alasan[1] ?? '';
        }
        return view('rt.pkh.index', compact('penerima'));
    }
}
