<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $barangKeluar = BarangKeluar::latest()->paginate(10);

        return view('barangkeluar.index',compact('barangKeluar'));
        return DB::table('barangkeluar')->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barangkeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_keluar' => 'required',
            'qty_keluar' => 'required',
            'barang_id' => 'required',
        ]);

        BarangKeluar::create($request->all());

        // Redirect to index
        return redirect()->route('barangkeluar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barangkeluar = BarangKeluar::find($id);
        return view('barangkeluar.show', compact('barangkeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangkeluar)
    {
        $barang_keluar = BarangKeluar::all();
        return view('barangkeluar.edit', compact('barangkeluar', 'barang_keluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangkeluar)
    {
        $this->validate($request, [
            'tgl_keluar' => 'required',
            'qty_keluar'  => 'required',
            'barang_id'  => 'required',
        ]);
    
        $barangkeluar->update($request->all());
        return redirect()->route('barangkeluar.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangkeluar)
    {
        $barangkeluar->delete();
        return redirect()->route('barangkeluar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}