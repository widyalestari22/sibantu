@extends('staffdesa.layouts.app')

@section('title', 'Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-8">
        <div class="row">
            <section class="section dashboard">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Penerima | <span>Total Penerima</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        {{-- <i class="bi bi-cart"></i> --}}
                                        <i class="bi bi-file-earmark-check-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ number_format($total) }}</h6>
                                        {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span> --}}

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Penyaluran | <span>Yang Belum Menerima</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-earmark-excel-fill"></i>
                                    </div>
                                    <div class="p-3">
                                        <h6>{{ $jumlahPenerimaNotInPenyaluran }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->
                </div>
            </section>
        </div>
    </div><!-- End Left side columns -->
@endsection
