@extends('layouts.app')

@section('title', 'Admin Inventory - Kategori')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-body text-center">
                    <a href="{{ route('kategori.create') }}" class="btn btn-md btn-success">TAMBAH KATEGORI</a>
                </div>
            </div>

            @if(session('success') || session('fail'))
                <div class="col-md-12">
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
                </div>
            @endif

            @if(count($Kategori) > 0)
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DESKRIPSI</th>
                                <th>KATEGORI</th>
                                <th style="width: 15%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Kategori as $kategori)
                                <tr>
                                    <td>{{ $kategori->id }}</td>
                                    <td>{{ $kategori->deskripsi }}</td>
                                    <td>{{ $kategori->kategori }}</td>
                                    
                                    <td class="text-center"> 
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                                            <a href="{{ route('kategori.show', $kategori->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <div class="alert alert-warning">
                                            Data kategori kosong.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @else
                <div class="col-md-12">
                    <div class="alert alert-danger text-center">
                        Record <strong>Kategori</strong> kosong.
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
