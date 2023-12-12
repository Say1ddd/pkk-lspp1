<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $barangMasuk = BarangMasuk::all();

        return view('barangmasuk.index',compact('barangMasuk'));
        return DB::table('barangmasuk')->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('barangmasuk.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_masuk' => 'required',
            'qty_masuk' => 'required',
            'barang_id' => 'required',
        ]);

        BarangMasuk::create($request->all());

        // Redirect to index
        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barangmasuk = BarangMasuk::find($id);
        return view('barangmasuk.show', compact('barangmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangmasuk)
    {
        $barangs = Barang::all();
        return view('barangmasuk.edit', compact('barangmasuk', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangmasuk)
    {
        $this->validate($request, [
            'tgl_masuk' => 'required',
            'qty_masuk'  => 'required',
            'barang_id'  => 'required',
        ]);
    
        $barangmasuk->update($request->all());
        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangmasuk)
    {
        $barangmasuk->delete();
        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}