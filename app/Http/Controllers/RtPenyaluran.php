<?php

namespace App\Http\Controllers;

use App\Models\Pkh;
use App\Models\Penerima;
use App\Models\Penyaluran;
use Illuminate\Http\Request;
use App\Models\PenyaluranPkh;
use Illuminate\Routing\Controller;

class RtPenyaluran extends Controller
{
    public function bltdd()
    {
        $penyaluran = Penyaluran::with('penerima')->get();
        $penerima = Penerima::all();
        return view('rt.penyaluran.index', compact('penyaluran', 'penerima'));
    }
    public function pkh()
    {
        $penyaluran = PenyaluranPkh::with('penerima')->get();
        // $penerima = Pkh::all();
        $penerima = Pkh::where('jawaban_alasan', 'Iya|')->get();

        return view('rt.penyalurans.index', compact('penyaluran', 'penerima'));
    }
}
