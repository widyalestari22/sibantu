@extends('staffdesa.layouts.app')

@section('title, Detail Pengajuan')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Pengajuan</h5>

            <table cellpadding="7">
                <tr>
                    <td>Nama</td>
                    <td> : </td>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <td>Nik</td>
                    <td> : </td>
                    <td>{{ $data->nik }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td> : </td>
                    <td>{{ $data->kelamin }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : </td>
                    <td>{{ $data->alamat }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td> : </td>
                    <td>{{ $data->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>RT</td>
                    <td> : </td>
                    <td>{{ $data->rt }}</td>
                </tr>
                <tr>
                    <td>RW</td>
                    <td> : </td>
                    <td>{{ $data->rw }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td> : </td>
                    <td>{{ $data->penghasilan }}</td>
                </tr>
                <tr>
                    <td>Tidak Menerima Bantuan Lain</td>
                    <td> : </td>
                    <td>{{ $data->tanpa_bantuan }}</td>
                </tr>
                <tr>
                    <td>Kepemilikan Elektronik</td>
                    <td> : </td>
                    <td>{{ $data->elektronik }}</td>
                </tr>
                <tr>
                    <td>Tanah</td>
                    <td> : </td>
                    <td>{{ $data->tanah }}</td>
                </tr>
                <tr>
                    <td>Nama Desa</td>
                    <td> : </td>
                    <td>{{ $data->nama_desa }}</td>
                </tr>
                <tr>
                    <td>Nama Kecamatan</td>
                    <td> : </td>
                    <td>{{ $data->nama_kecamatan }}</td>
                </tr>
                <tr>
                    <td>kartu Keluarga</td>
                    <td> : </td>
                    <td>
                        @if ($data->kk)
                            <img src="{{ url('../galeri') . '/' . $data->kk }} "width="439" height="620">
                        @else
                            <p>Foto Kartu Keluarga tidak ada</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Kartu Tanda PEnduduk</td>
                    <td> : </td>
                    <td>
                        @if ($data->ktp)
                            <img src="{{ url('../galeri') . '/' . $data->ktp }} "width="439" height="620">
                        @else
                            <p>Foto Kartu Tanda Penduduk tidak ada</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tampak Rumah</td>
                    <td> : </td>
                    <td>
                        @if ($data->rumah)
                            <img src="{{ url('../galeri') . '/' . $data->rumah }} "width="439" height="620">
                        @else
                            <p>Foto rumah tidak ada</p>
                        @endif
                    </td>
                </tr>
            </table>
            <form action="{{ url()->previous() }}" class="text-center" method="get">
                @csrf
                <button type="submit" class="btn btn-primary mt-3">Kembali</button>
            </form>
        </div>
    </div>
@endsection

{{-- <div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Pengajuan</h5>

        <!-- Default List group -->
        <ul class="list-group">
            <li class="list-group-item">Nama : {{ $data->nama }}</li>
            <li class="list-group-item">Nik : {{ $data->nik }}</li>
            <li class="list-group-item">Kelamin : {{ $data->kelamin }}</li>
            <li class="list-group-item">Alamat : {{ $data->alamat }}</li>
            <li class="list-group-item">RT : {{ $data->rt }}</li>
            <li class="list-group-item">RW : {{ $data->rw }}</li>
            <li class="list-group-item">Penghasilan : {{ $data->penghasilan }}</li>
            <li class="list-group-item">Tidak Menerima Bantuan Lain : {{ $data->tanpa_bantuan }}</li>
            <li class="list-group-item">Nama Desa : {{ $data->nama_desa }}</li>
            <li class="list-group-item">Nama kecamatan : {{ $data->nama_kecamatan }}</li>
            <li class="list-group-item">Kartu Tanda Penduduk : @if ($data->kk)
                    <img src="{{ url('../galeri') . '/' . $data->kk }} "width="439" height="620">
                @else
                    <p>Tidak ada file Kartu Keluarga</p>
                @endif
            </li>
            <li class="list-group-item">Kartu Tanda Penduduk : @if ($data->ktp)
                    <img src="{{ url('../galeri') . '/' . $data->ktp }} "width="439" height="620">
                @else
                    <p>Tidak ada file Kartu Tanda Penduduk</p>
                @endif
            </li>

        </ul><!-- End Default List group -->
        <form action="{{ url()->previous() }}" class="text-center" method="get">
            @csrf
            <button type="submit" class="btn btn-primary mt-3">Kembali</button>
        </form>
    </div>
</div> --}}
