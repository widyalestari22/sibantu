@extends('pkh.layouts.app')

@section('title', 'Edit Penerima Bantuan')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Daftar Penerima Bantuan</h5>

            {{-- <form class="row g-3" action="{{ route('penerima.update', $penerima->id_pkh) }}" method="POST"> --}}
            <form class="row g-3" action="{{ route('pkh.update', $penerima->id_pkh) }}" method="POST">

                @csrf
                @method('PUT')

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <input type="hidden" name="id" value="{{ $penerima->id }}">

                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        placeholder="Nama Penerima" value="{{ $penerima->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                        placeholder="Nomor Induk Kependudukan" value="{{ $penerima->nik }}">
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="rt" class="form-label">RT</label>
                    <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt"
                        placeholder="RT" value="{{ $penerima->rt }}">
                    @error('rt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="rw" class="form-label">RW</label>
                    <input type="text" class="form-control @error('rw') is-invalid @enderror" name="rw"
                        placeholder="RW" value="{{ $penerima->rw }}">
                    @error('rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                        placeholder="Alamat" value="{{ $penerima->alamat }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <!-- Field untuk memilih status kelayakan -->
                    <label class="form-label" for="keterangan">Apakah Calon Penerima Ini Layak?</label>
                    <select class="form-select" id="keterangan" name="keterangan">
                        <option value="" selected>Pilih keketeranganan</option>
                        <option value="Iya" {{ old('keterangan', $penerima->keterangan) == 'Iya' ? 'selected' : '' }}>
                            Iya</option>
                        <option value="Tidak" {{ old('keterangan', $penerima->keterangan) == 'Tidak' ? 'selected' : '' }}>
                            Tidak</option>
                    </select>
                    @error('keterangan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="alasan">Alasan:</label>
                    <textarea class="form-control" id="alasan" name="alasan" placeholder="Jika tidak, berikan alasannya di sini">{{ old('alasan', $penerima->alasan) }}</textarea>
                    @error('alasan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('pkh.menerima') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>

        </div>
    </div>

@endsection
