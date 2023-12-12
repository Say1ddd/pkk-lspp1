@extends('layouts.app')

@section('title', 'Admin Inventory - Edit Barang Keluar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barangkeluar.update', $barangkeluar->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Barang Keluar</label>
                                <input type="date" class="form-control @error('tgl_keluar') is-invalid @enderror" name="tgl_keluar" value="{{ old('tgl_keluar', $barangkeluar->tgl_keluar) }}">

                                @error('')
                                    <div class="alert alert-danger mt-2"></div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Barang Keluar</label>
                                <input type="text" class="form-control @error('qty_keluar') is-invalid @enderror" name="qty_keluar" value="{{ old('qty_keluar', $barangkeluar->qty_keluar) }}">

                                @error('qty_keluar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SERI BARANG</label>
                                <select class="form-control @error('barang_id') is-invalid @enderror" name="barang_id" disabled>
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang->id }}" {{ (old('barang_id', $barangkeluar->barang_id) == $barang->id) ? 'selected' : '' }}>
                                            {{ $barang->seri }}
                                        </option>
                                    @endforeach
                                </select>
                            
                                <input type="hidden" name="barang_id" value="{{ old('barang_id', $barangkeluar->barang_id) }}">
                            
                                @error('barang_id')
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
