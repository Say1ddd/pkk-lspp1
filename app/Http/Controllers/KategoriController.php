<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function count()
    {
        $CountKategori = Kategori::count();
        $CountBarang = Barang::count();
        $CountBarangMasuk = BarangMasuk::count();
        $CountBarangKeluar = BarangKeluar::count();

        return view('dashboard', compact('CountKategori', 'CountBarang', 'CountBarangMasuk', 'CountBarangKeluar'));
    }

    public function index()
    {
        $Kategori = Kategori::all();
        return view('kategori.index', compact('Kategori'));        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = array('blank'=>'Pilih Kategori',
                            'M'=>'Barang Modal',
                            'A'=>'Alat',
                            'BHP'=>'Bahan Habis Pakai',
                            'BTHP'=>'Bahan Tidak Habis Pakai'
                            );
        return view('kategori.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        $this->validate($request, [
            'deskripsi'   => 'required',
            'kategori'     => 'required | in:M,A,BHP,BTHP',
        ]);

        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        $categories = Kategori::all();
        return view('kategori.edit', compact('kategori', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
            'kategori'  => 'required|in:M,A,BHP,BTHP',
        ]);
    
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $barangCount = Barang::where('kategori_id', $id)->count();

            if ($barangCount > 0) {
                return back()->with(['fail' => 'Kategori sedang digunakan! Gagal menghapus.']);
            }

            $kategori = Kategori::findOrFail($id);
            $kategori->delete();

            return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (QueryException $e) {
            throw $e;
        }
    }
}