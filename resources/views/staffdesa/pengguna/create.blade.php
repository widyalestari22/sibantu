@extends('staffdesa.layouts.app')

@section('title, Tambah Pengguna Sistem')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Data Pengguna Sistem</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" action="{{ route('staf.pengguna.store') }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="inputName5" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        placeholder="Nama Pengguna" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Level Pengguan</label>
                    <select id="inputState" class="form-select" name="role">
                        <option selected>Silahkan Pilih Level Pengguna</option>
                        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Staff Desa</option>
                        <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Ketua PKH</option>
                        <option value="3" {{ old('role') == '3' ? 'selected' : '' }}>Ketua RT</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                        placeholder="Nama Pengguna" value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword5">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>


@endsection
