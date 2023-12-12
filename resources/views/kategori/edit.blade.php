@extends('layouts.app')

@section('title', 'Admin Inventory - Edit Kategori')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kategori.update',$kategori->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi',$kategori->deskripsi) }}">

                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KATEGORI</label>
                                <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                                    <option value="A" {{ ($kategori->kategori == 'A') ? 'selected' : '' }}>A - Alat</option>
                                    <option value="M" {{ ($kategori->kategori == 'M') ? 'selected' : '' }}>M - Modal</option>
                                    <option value="BHP" {{ ($kategori->kategori == 'BHP') ? 'selected' : '' }}>BHP - Bahan Habis Pakai</option>
                                    <option value="BTHP" {{ ($kategori->kategori == 'BTHP') ? 'selected' : '' }}>BTHP - Bahan Tidak Habis Pakai</option>
                                </select>
                            
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>               

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection