@extends('layouts.app')

@section('title', 'Admin Inventory - Tambah Barang Masuk')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangmasuk.store') }}" method="POST" enctype="multipart/form-data">                    
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL BARANG MASUK</label>
                                <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" name="tgl_masuk" value="{{ old('tgl_masuk') }}" placeholder="Masukkan tanggal">

                                @error('')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JUMLAH BARANG MASUK</label>
                                <input type="text" class="form-control @error('qty_masuk') is-invalid @enderror" name="qty_masuk" value="{{ old('qty_masuk') }}" placeholder="Masukkan jumlah">

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

                                </div
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div> --}}

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ route('barangmasuk.index') }}" class="btn btn-md btn-warning">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection