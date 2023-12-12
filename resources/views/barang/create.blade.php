@extends('layouts.app')

@section('title', 'Admin Inventory - Tambah Barang')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">MERK BARANG</label>
                                <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk') }}" placeholder="Masukkan Merk Barang">

                                @error('merk')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SERI BARANG</label>
                                <input type="text" class="form-control @error('seri') is-invalid @enderror" name="seri" value="{{ old('seri') }}" placeholder="Masukkan Nomor Induk Siswa">

                                @error('seri')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SPESIFIKASI BARANG</label>
                                <input type="text" class="form-control @error('spesifikasi') is-invalid @enderror" name="spesifikasi" value="{{ old('spesifikasi') }}" placeholder="Masukkan Nomor Induk Siswa">

                                @error('spesifikasi')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">DESKRIPSI KATEGORI</label>
                                <select name="kategori_id" class="form-control">
                                    @foreach ($Kategori as $rowDeskripsi)
                                        <option value="{{$rowDeskripsi->id}}">{{$rowDeskripsi->deskripsi}}</option>
                                    @endforeach
                                </select>

                                @error('')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label class="font-weight-bold">KELAS</label>
                                
                                <div class="form-check">
                                    <select class="form-select" name="kelas" aria-label="Default select example">
                                        <option value="blank" selected>Pilih Kelas</option>
                                        <option value="X">X - Sepuluh</option>
                                        <option value="XI">XI - Sebelas</option>
                                        <option value="XII">XII - Dua Belas</option>
                                        <option value="XIII">XIII - Tiga Belas</option>
                                    </select>

                                </div
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div> --}}

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ route('barang.index') }}" class="btn btn-md btn-warning">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection