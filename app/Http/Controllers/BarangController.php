<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Barang = Barang::all();
        return view('barang.index', compact('Barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Kategori = Kategori::all();
        return view('barang.create',compact('Kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'merk'         => 'required',
                'seri'         => 'required',
                'spesifikasi'  => 'required',
                'kategori_id'  => 'required',
            ]);
    
            $requestData = $request->all();
            $requestData['stok'] = $request->input('stok', 0);
    
            Barang::create($requestData);
    
            return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (QueryException $e) {
            return back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $Kategori = Kategori::all();
        return view('barang.edit', compact('barang','Kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $this->validate($request, [
            'merk'         => 'required',
            'seri'         => 'required',
            'spesifikasi'  => 'required',
            'stok'         => 'required',
            'kategori_id'  => 'required',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (DB::table('barang_masuk')->where('barang_id', $id)->exists() || DB::table('barang_keluar')->where('barang_id', $id)->exists()) {
            return redirect()->route('barang.index')->with(['fail' => 'Data Gagal dihapus.']);
        } else {
            $Barang = Barang::find($id);
            $Barang->delete();
            return redirect()->route('barang.index')->with(['success' => 'Barang sedang digunakan! Gagal menghapus.']);
        }
    }
}