@extends('layouts.app')

@section('title', 'Admin Inventory - Barang Masuk')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
               <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Tanggal Barang Masuk</td>
                                <td>{{ $barangmasuk->tgl_masuk }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Barang Masuk</td>
                                <td>{{ $barangmasuk->qty_masuk }}</td>
                            </tr>
                            <tr>
                                <td>ID Barang</td>
                                <td>{{ $barangmasuk->barang_id}}</td>
                            </tr>
                        </table>
                    </div>
               </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12  text-center">

                <a href="{{ route('barangmasuk.index') }}" class="btn btn-md btn-primary mb-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection