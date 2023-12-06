<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangMasuk = BarangMasuk::latest()->paginate(10);
        return view('barangMasuk.index', compact('BarangMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barangMasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_masuk'     => 'required',
            'qty_masuk'     => 'required',
            'barang_id'     => 'required',
        ]);

        BarangMasuk::create($request->all());

        // Redirect to index
        return redirect()->route('barangMasuk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangmasuk)
    {
        // Return view
        return view('barangMasuk.show', compact('BarangMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangmasuk)
    {
        // Return view for edit form
        return view('barangMasuk.edit', compact('BarangMasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangmasuk)
    {
        $this->validate($request, [
            'tgl_masuk'         => 'required',
            'qty_masuk'         => 'required',
            'barang_id'         => 'required',
        ]);

        $barangmasuk->update($request->all());

        // Redirect to index
        return redirect()->route('barangMasuk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangmasuk)
    {
        $barangmasuk->delete();

        // Redirect to index
        return redirect()->route('barangMasuk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
