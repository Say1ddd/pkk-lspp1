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
                            
                                <!-- error message untuk deskripsi -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KATEGORI</label>
                                
                                <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" aria-label="Default select example">
                                    <option value="A" {{ (old('kategori', $kategori->kategori) == 'A') ? 'selected' : '' }}>A</option>
                                    <option value="M" {{ (old('kategori', $kategori->kategori) == 'M') ? 'selected' : '' }}>M</option>
                                    <option value="BHP" {{ (old('kategori', $kategori->kategori) == 'BHP') ? 'selected' : '' }}>BHP</option>
                                    <option value="BTHP" {{ (old('kategori', $kategori->kategori) == 'BTHP') ? 'selected' : '' }}>BTHP</option>
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