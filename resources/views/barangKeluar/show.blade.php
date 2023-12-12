@extends('layouts.app')

@section('title', 'Admin Inventory - Barang Keluar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
               <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Tanggal Barang Keluar</td>
                                <td>{{ $barangkeluar->tgl_keluar }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Barang Keluar</td>
                                <td>{{ $barangkeluar->qty_keluar }}</td>
                            </tr>
                            <tr>
                                <td>ID Barang</td>
                                <td>{{ $barangkeluar->barang_id}}</td>
                            </tr>
                        </table>
                    </div>
               </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12  text-center">
                

                <a href="{{ route('barangkeluar.index') }}" class="btn btn-md btn-primary mb-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection