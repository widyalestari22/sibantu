@extends('staffdesa.layouts.app')

@section('title, Tambah Penerima Bantuan')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Daftar Penerima Bantuan</h5>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form class="row g-3" action="{{ route('penerimaan.store') }}" method="POST">
                @csrf


                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        placeholder="Nama Penerima" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                        placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select @error('kelamin') is-invalid @enderror" name="kelamin">
                        <option value="" selected disabled>Pilih Jenis kelamin</option>
                        <option value="Laki-laki" {{ old('kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>

                    </select>
                    @error('kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                        placeholder="Alamat" value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="RT" class="form-label">RT</label>
                    <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt"
                        placeholder="rt" value="{{ old('rt') }}">
                    @error('rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="RW" class="form-label">RW</label>
                    <input type="text" class="form-control @error('rw') is-invalid @enderror" name="rw"
                        placeholder="rw" value="{{ old('rw') }}">
                    @error('rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nama_desa" class="form-label">Nama Desa</label>
                    <input type="text" class="form-control @error('nama_desa') is-invalid @enderror" name="nama_desa"
                        placeholder="Nama Desa" value="{{ old('nama_desa') }}">
                    @error('nama_desa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                    <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror"
                        name="nama_kecamatan" placeholder="Nama Kecamatan" value="{{ old('nama_kecamatan') }}">
                    @error('nama_kecamatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>


        </div>
    </div>


@endsection
