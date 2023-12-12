@extends('layouts.app')

@section('title', 'Admin Inventory - Kategori')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
               <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Deskripsi</td>
                                <td>{{ $kategori->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>{{ $kategori->kategori }}</td>
                            </tr>
                        </table>
                    </div>
               </div>
            </div>

            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('storage/foto/'.$kategori->foto) }}" class="w-100 rounded">
                    </div>
                </div>
            </div> --}}

        </div>
        <div class="row">
            <div class="col-md-12  text-center">
                

                <a href="{{ route('kategori.index') }}" class="btn btn-md btn-primary mb-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection