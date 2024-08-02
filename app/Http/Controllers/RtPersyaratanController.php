<?php

namespace App\Http\Controllers;

use App\Models\Persyaratan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RtPersyaratanController extends Controller
{
    public function index()
    {
        $persyaratan = Persyaratan::all();
        return view('rt.persyaratan.index', compact('persyaratan'));
    }
}
