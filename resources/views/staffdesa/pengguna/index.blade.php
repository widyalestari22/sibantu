@extends('staffdesa.layouts.app')

@section('title', 'Daftar Pengguna sistem')
@section('content')
    <div class="pagetitle">
        <h1>Desa Air Putih</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Pengguna sistem</li>
            </ol>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a href="/staf/pengguna/create"> <button type="button" class="btn btn-primary rounded-pill">Tambah</button></a>
        </nav>
    </div>


    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    {{-- <th scope="col">Passoword</th> --}}
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengguna as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('staf.pengguna.edit', ['id' => $user->id]) }}">
                                                <button type="button" class="btn btn-warning"><i
                                                        class="bi bi-pencil-square"></i></button>
                                            </a>

                                            <a href="{{ route('pengguna.destroy', ['id' => $user->id]) }}"
                                                onclick="return confirm('Yakin ingin menghapus data ini ?')">
                                                <button type="button" class="btn btn-danger"><i
                                                        class="bi bi-eraser-fill"></i></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
