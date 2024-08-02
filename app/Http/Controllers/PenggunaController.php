<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::all();
        return view("staffdesa.pengguna.index", compact("pengguna"));
    }
    public function create()
    {
        return view('staffdesa.pengguna.create');
    }

    public function store(Request $request)
    {

        // dd($user = new User());
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        event(new Registered($user));


        return redirect()->route('staf.pengguna')->with('success', 'Pengguna Berhasil Ditambahkan');
    }


    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('staf.pengguna')->with('error', 'Pengguna tidak ditemukan');
        }

        // Mengirim data pengguna ke view edit
        return view('staffdesa.pengguna.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',
            'username' => 'required',
            'password' => '',
            'role' => 'required'
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('staf.pengguna')->with('error', 'Pengguna tidak ditemukan');
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('staf.pengguna')->with('success', 'Pengguna berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('staf.pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }

    //     public function destroy($id_penerima)
    //     {
    //         $penerima = Penerima::findOrFail($id_penerima);
    //         $penerima->delete();
    //     }
}
