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
        $barangMasuk = BarangMasuk::all();

        return view('barangmasuk.index', compact('barangMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $BarangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $BarangMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $BarangMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barangMasuk = BarangMasuk::find($id);

        if (!$barangMasuk) {
            return redirect()->route('barangmasuk.index')->with('error', 'Record not found.');
        }

        $barangMasuk->delete();

        return redirect()->route('barangmasuk.index')->with('success', 'Record deleted successfully.');
    }
}