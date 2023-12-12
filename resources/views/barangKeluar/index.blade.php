@extends('layouts.app')

@section('title', 'Admin Inventory - Barang Keluar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-body text-center">
                    <a href="{{ route('barangkeluar.create') }}" class="btn btn-md btn-success">TAMBAH BARANG KELUAR</a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif

                @if(count($barangKeluar) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TANGGAL KELUAR</th>
                                <th>JUMLAH KELUAR</th>
                                <th>SERI BARANG</th>
                                <th style="width: 15%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangKeluar as $barangkeluar)
                                <tr>
                                    <td>{{ $barangkeluar->id }}</td>
                                    <td>{{ $barangkeluar->tgl_keluar }}</td>
                                    <td>{{ $barangkeluar->qty_keluar }}</td>
                                    <td>{{ $barangkeluar->barang->seri }}</td>
                                    
                                    <td class="text-center"> 
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barangkeluar.destroy', $barangkeluar->id) }}" method="POST">
                                            <a href="{{ route('barangkeluar.show', $barangkeluar->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('barangkeluar.edit', $barangkeluar->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $barangkeluar->links() }} --}}
                @else
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="alert alert-danger text-center">
                                Record <strong>Barang Keluar</strong> kosong.
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
