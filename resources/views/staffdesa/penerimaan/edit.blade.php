@extends('staffdesa.layouts.app')

@section('title', 'Edit Penerima Bantuan')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Daftar Penerima Bantuan</h5>

            <form class="row g-3" action="{{ route('penerima.update', $penerima->id_penerima) }}" method="POST">
                @csrf
                @method('PUT')

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
                    <label for="kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select @error('kelamin') is-invalid @enderror" name="kelamin">
                        <option value="" selected disabled>Pilih Jenis kelamin</option>
                        <option value="Laki-laki" {{ $penerima->kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="Perempuan" {{ $penerima->kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                    @error('kelamin')
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


                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>


        </div>
    </div>

@endsection
