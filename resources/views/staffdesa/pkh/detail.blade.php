@extends('staffdesa.layouts.app')

@section('title, Dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Pengajuan</h5>

            <!-- Default List group -->
            <ul class="list-group">
                <li class="list-group-item">Nama : {{ $data->nama }}</li>
                <li class="list-group-item">Nik : {{ $data->nik }}</li>
                <li class="list-group-item">Alamat : {{ $data->alamat }}</li>
                <li class="list-group-item">RT : {{ $data->rt }}</li>
                <li class="list-group-item">RW : {{ $data->rw }}</li>
                <li class="list-group-item">Kelayakan : {{ $data->keterangan }}</li>
                {{-- <li class="list-group-item">Alasan Tidak Layak : {{ $data->alasan }}</li> --}}
                <li class="list-group-item">Alasan Tidak Layak : @if ($data->alasan)
                        {{ $data->alasan }}
                    @else
                        <p>Alasan dibutuhkan jika penerima tidak layak</p>
                    @endif
                </li>


            </ul><!-- End Default List group -->
            <form action="{{ url()->previous() }}" class="text-center" method="get">
                @csrf
                <button type="submit" class="btn btn-primary mt-3">Kembali</button>
            </form>
        </div>
    </div>
@endsection
