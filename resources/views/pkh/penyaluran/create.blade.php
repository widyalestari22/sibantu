@extends('pkh.layouts.app')

@section('title, Tambah Penerima Bantuan')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Daftar Penerima Bantuan</h5>
            <form class="row g-3" action="{{ route('penyaluran.store') }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="id_penerima" class="form-label">Pilih Penerima</label>
                    <select name="id_penerima" class="form-select" id="id_penerima">
                        <option value="">Pilih Nama</option>
                        @foreach ($penerima as $pen)
                            <option value="{{ $pen->id_penerima }}">{{ $pen->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_penerima')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="jumlah_bantuan" class="form-label">Jumlah Bantuan</label>
                    <input type="text" class="form-control @error('jumlah_bantuan') is-invalid @enderror"
                        name="jumlah_bantuan" placeholder="Jumlah Bantuan" value="{{ old('jumlah_bantuan') }}">
                    @error('jumlah_bantuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="tanggal_penyaluran" value="{{ now() }}">

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>



        </div>
    </div>


@endsection
