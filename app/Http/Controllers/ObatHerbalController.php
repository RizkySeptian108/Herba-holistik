<?php

namespace App\Http\Controllers;

use App\Models\ObatHerbal;
use App\Http\Requests\StoreObatHerbalRequest;
use App\Http\Requests\UpdateObatHerbalRequest;

class ObatHerbalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.obat_herbal.obatHerbal', [
            'head' => 'Obat Herbal',
            'obat' => ObatHerbal::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.obat_herbal.create', [
            'head' => 'tambah obat herbal'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreObatHerbalRequest $request)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required|max:50|min:3',
            'harga' => 'required|numeric'
        ]);

        ObatHerbal::create($validatedData);

        return redirect('/dashboard/obat-herbal')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ObatHerbal $obatHerbal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ObatHerbal $obatHerbal)
    {
        return view('dashboard.obat_herbal.edit', [
            'head' => 'Edit Data',
            'obat' => $obatHerbal
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateObatHerbalRequest $request, ObatHerbal $obatHerbal)
    {
        $validatedData = $request->validated();
        ObatHerbal::where('id', $obatHerbal->id)
                        ->update($validatedData);
        return redirect('/dashboard/obat-herbal')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ObatHerbal $obatHerbal)
    {
        ObatHerbal::destroy($obatHerbal->id);
        return redirect('/dashboard/obat-herbal')->with('success', 'Data berhasil dihapus!');
    }
}
