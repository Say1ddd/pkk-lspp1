<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $barangKeluar = BarangKeluar::all();

        return view('barangkeluar.index',compact('barangKeluar'));
        return DB::table('barangkeluar')->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('barangkeluar.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_keluar'  => 'required|date',
            'qty_keluar'  => 'required|integer|min:1',
            'barang_id'   => 'required|exists:barang,id',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($request->qty_keluar > $barang->stok) {
            return back()->with(['fail' => 'Jumlah barang keluar melebihi stok yang tersedia.']);
        }

        BarangKeluar::create([
            'tgl_keluar' => $request->tgl_keluar,
            'qty_keluar' => $request->qty_keluar,
            'barang_id'  => $request->barang_id,
        ]);

        $barang->update(['stok' => $barang->stok - $request->qty_keluar]);

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
        $barangs = Barang::all();
        return view('barangkeluar.edit', compact('barangkeluar', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangkeluar)
    {
        $this->validate($request, [
            'tgl_keluar' => 'required',
            'qty_keluar' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($barangkeluar) {
                    $sisaStok = $barangkeluar->barang->stok + $barangkeluar->qty_keluar;
    
                    if ($value > $sisaStok) {
                        $fail("Jumlah melebihi batas stok tersedia! stok tersedia $sisaStok.");
                    }
                },
            ],
            'barang_id' => 'required',
        ]);
    
        $realQtyKeluar = $barangkeluar->qty_keluar;
    
        $barangkeluar->update($request->all());
    
        $perbedaanStok = $realQtyKeluar - $request->qty_keluar;
    
        $barang = $barangkeluar->barang;
        $barang->stok += $perbedaanStok;
        $barang->save();
    
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