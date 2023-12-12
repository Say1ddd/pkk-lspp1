@extends('layouts.app')

@section('title')

@section('content')
    
<div class="container-fluid">

    <style>
        .card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>

        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('barang.index') }}" class="card-link">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Barang
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$CountBarang}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-table fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('kategori.index') }}" class="card-link">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Kategori
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$CountKategori}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-th-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('barangmasuk.index') }}" class="card-link">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Barang Masuk
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$CountBarangMasuk}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-reply fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="{{ route('barangkeluar.index') }}" class="card-link">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Barang Keluar
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$CountBarangKeluar}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-share fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection