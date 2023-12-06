@extends('layouts.app')

@section('title', 'Admin Inventory - Barang Masuk')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-body text-center">
                        <a href="{{ route('barangmasuk.create') }}" class="btn btn-md btn-success">TAMBAH BARANG</a>
                    </div> --}}
                </div>

                @if(count($barangMasuk) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TANGGAL MASUK</th>
                            <th>JUMLAH MASUK</th>
                            <th>NAMA BARANG</th>
                            <th style="width: 15%">AKSI</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangMasuk as $barangmasuk)
                            <tr>
                                <td>{{ $barangmasuk->id  }}</td>
                                <td>{{ $barangmasuk->tgl_masuk  }}</td>
                                <td>{{ $barangmasuk->qty_masuk  }}</td>
                                <td>{{ $barangmasuk->barang->merk }}</td>
                                
                                <td class="text-center"> 
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barangmasuk.destroy', $barangmasuk->id) }}" method="POST">
                                        {{-- <a href="{{ route('barangmasuk.show', $barangmasuk->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('barangmasuk.edit', $barangmasuk->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a> --}}
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
                <div class="alert">
                    Data <strong>Barang Masuk</strong> kosong.
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
