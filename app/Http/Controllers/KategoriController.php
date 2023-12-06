<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\Models\Barang;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //Memanggil store procedure : OK
         //return DB::select('CALL getKategoriAll');

        $Kategori = Kategori::latest()->paginate(10);
        // $kategori = Kategori::find(1)->barangs();

        // dd($kategori);
        // return $kategori->all();

        // $kategori = DB::table('kategori')->paginate(2);

        // $kategori = DB::table('kategori')
        //     ->select('id','kategori', 'jenis')
        //     ->paginate(2);


        // $kategori = Kategori::select('id','deskripsi','kategori',
        //     \DB::raw('(CASE
        //         WHEN kategori = "M" THEN "Modal"
        //         WHEN kategori = "A" THEN "Alat"
        //         WHEN kategori = "BHP" THEN "Bahan Habis Pakai"
        //         ELSE "Bahan Tidak Habis Pakai"
        //         END) AS ketKategori'))
        //     ->paginate(2);
        // //  OK

        // $kategori = DB::select('CALL getKategoriAll()','ketKategori("M")');
        // $kategori = DB::raw("SELECT ketKategori("M") as someValue') ;

        // $kategori = DB::table('kategori')
        //      ->select('id','deskripsi',DB::raw('ketKategori(kategori) as ketkategori'))
        //      ->get();

       // return $kategori;


        // $kategori = DB::table('kategori')
        //                 ->select('id','deskripsi',DB::raw('ketKategori(kategori) as ketkategori'))->paginate(1);



         return view('kategori.index',compact('Kategori'));

        // $kategori = Kategori::all();
        // return view('kategori.relasi', compact('rsetKategori'));



        return DB::table('kategori')->get();

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


        //create post
        Kategori::create($request->all());

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::find($id);

        // $kategori = Kategori::select('id','deskripsi','kategori',
        //     \DB::raw('(CASE
        //         WHEN kategori = "M" THEN "Modal"
        //         WHEN kategori = "A" THEN "Alat"
        //         WHEN kategori = "BHP" THEN "Bahan Habis Pakai"
        //         ELSE "Bahan Tidak Habis Pakai"
        //         END) AS ketKategori'))->where('id', '=', $id);

        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        $categories = Kategori::all();

        // Return view for edit form with categories
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
    
        // Redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        // Redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}