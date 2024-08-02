@extends('pkh.layouts.app')

@section('title', 'Tambah Penerima Bantuan')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Daftar Penerima Bantuan</h5>

            <form class="row g-3" action="{{ route('pkh.store') }}" method="POST">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
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
                    <label for="RT" class="form-label">RT</label>
                    <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt"
                        placeholder="rt" value="{{ old('rt') }}">
                    @error('rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="RW" class="form-label">RW</label>
                    <input type="text" class="form-control @error('RW') is-invalid @enderror" name="rw"
                        placeholder="RW" value="{{ old('rw') }}">
                    @error('rw')
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
                    <!-- Field untuk memilih status kelayakan -->
                    <label class="form-label" for="keterangan">Apakah Calon Penerima Ini keterangan?</label>
                    <select class="form-select" id="keterangan" name="keterangan">
                        <option value="" selected>Pilih keketeranganan</option>
                        <option value="Iya" {{ old('keterangan') == 'Iya' ? 'selected' : '' }}>Iya</option>
                        <option value="Tidak" {{ old('keterangan') == 'Tidak' ? 'selected' : '' }}>Tidak
                        </option>
                    </select>
                    @error('keterangan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <!-- Field untuk keterangan -->
                    <label class="form-label" for="alasan">Keterangan:</label>
                    <textarea class="form-control" id="alasan" name="alasan" placeholder="alasan kelayakan">{{ old('alasan') }}</textarea>
                    @error('alasan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>


        </div>
    </div>


@endsection
