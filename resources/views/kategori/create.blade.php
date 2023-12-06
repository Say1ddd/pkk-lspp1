@extends('layouts.app')

@section('title', 'Admin Inventory - Tambah Kategori')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Masukkan deskripsi kategori">
                            
                                <!-- error message untuk deskripsi -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KATEGORI</label>
                                
                                <div class="form-check">
                                    <select class="form-select" name="kategori" aria-label="Default select example">
                                        <option value="BHP" disabled selected>Pilih Kategori</option>
                                        <option value="M">M - Modal</option>
                                        <option value="A">A - Alat</option>
                                        <option value="BHP">BHP - Bahan Habis Pakai</option>
                                        <option value="BTHP">BTHP - Bahan Tidak Habis Pakai</option>
                                    </select>

                                </div>
                                <!-- error message untuk kelas -->
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-md btn-warning">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection