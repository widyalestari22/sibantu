@extends('staffdesa.layouts.app')

@section('title', 'Edit Pengguna Sistem')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Pengguna</h5>

            <!-- Edit Form -->
            <form class="row g-3" action="{{ route('staf.pengguna.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Tambahkan ini untuk menunjukkan bahwa ini adalah operasi update -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="col-md-6">
                    <label for="inputName5" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        placeholder="Nama Pengguna" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Level Pengguan</label>
                    <select id="inputState" class="form-select" name="role">
                        <option selected disabled>Silahkan Pilih Level Pengguna</option>
                        <option value="1" {{ old('role', $user->role) == '1' ? 'selected' : '' }}>Staff Desa</option>
                        <option value="2" {{ old('role', $user->role) == '2' ? 'selected' : '' }}>Ketua PKH</option>
                        <option value="3" {{ old('role', $user->role) == '3' ? 'selected' : '' }}>Ketua RT</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                        placeholder="Nama Pengguna" value="{{ old('username', $user->username) }}">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label">Password (Biarkan kosong jika tidak diubah)</label>
                    <input type="password" class="form-control" name="password" id="inputPassword5">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('staf.pengguna') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form><!-- End Edit Form -->

        </div>
    </div>

@endsection
