@extends('layouts.app')

@section('title', 'Admin Inventory - Edit Barang')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barang.update',$barang->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">MERK</label>
                                <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk',$barang->merk) }}">

                                @error('')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SERI</label>
                                <input type="text" class="form-control @error('seri') is-invalid @enderror" name="seri" value="{{ old('seri',$barang->seri) }}">

                                @error('')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SPESIFIKASI</label>
                                <input type="text" class="form-control @error('spesifikasi') is-invalid @enderror" name="spesifikasi" value="{{ old('spesifikasi',$barang->spesifikasi) }}">

                                @error('')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">STOK</label>
                                <input type="text" class="form-control @error('stok') is-invalid @enderror" readonly name="stok" value="{{ old('stok',$barang->stok) }}">

                                @error('')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI KATEGORI</label>
                                <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id">
                                    @foreach ($Kategori as $rowKategori)
                                        <option value="{{ $rowKategori->id }}" {{ (old('kategori_id', $rowKategori->kategori_id) == $rowKategori->id) ? 'selected' : '' }}>
                                            {{ $rowKategori->deskripsi }}
                                        </option>
                                    @endforeach
                                </select>
                            
                                {{-- <input type="hidden" name="kategori_id" value="{{ old('kategori_id', $rowKategori->kategori_id) }}"> --}}
                            
                                @error('kategori_id')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
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