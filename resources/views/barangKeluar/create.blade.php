@extends('layouts.app')

@section('title', 'Admin Inventory - Tambah Barang Keluar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangkeluar.store') }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL BARANG KELUAR</label>
                                <input type="date" class="form-control @error('tgl_keluar') is-invalid @enderror" name="tgl_keluar" value="{{ old('tgl_keluar') }}" placeholder="Masukkan tanggal">
                            
                                @error('')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JUMLAH BARANG KELUAR</label>
                                <input type="text" class="form-control @error('qty_keluar') is-invalid @enderror" name="qty_keluar" value="{{ old('qty_keluar') }}" placeholder="Masukkan jumlah">
                            
                                @error('')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SERI BARANG</label>
                                <select name="barang_id" class="form-control">
                                    @foreach ($barangs as $rowBarang)
                                        <option value="{{$rowBarang->id}}">{{$rowBarang->seri}}</option>
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

                                </div>
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div> --}}

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ route('barangkeluar.index') }}" class="btn btn-md btn-warning">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection