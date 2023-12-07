<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

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
        $this->validate($request, [
            'merk'         => 'required',
            'seri'         => 'required',
            'spesifikasi'  => 'required',
            'stok'         => 'nullable|required',
            'kategori_id'  => 'required',
        ]);

        Barang::create($request->all());
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        // Return view
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

        // Redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        // Redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
