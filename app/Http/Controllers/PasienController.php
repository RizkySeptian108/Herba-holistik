<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Http\Requests\StorePasienRequest;
use App\Http\Requests\UpdatePasienRequest;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        return view('dashboard.pasien.index', [
            'head' => 'Data Pasien',
            'pasiens' => Pasien::Paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pasien.create', [
            'head' => 'Tambah Pasien'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePasienRequest $request)
    {

        Pasien::create($request->validated());
        return redirect('/dashboard/data-pasien')->with('success', 'Data pasien berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        return view('dashboard.pasien.edit', [
            'head' => 'Edit Pasien',
            'pasien' => $pasien
        ]);
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(UpdatePasienRequest $request, Pasien $pasien)
    {
        Pasien::where('id', $pasien->id)->update($request->validated());
        return redirect('/dashboard/data-pasien')->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy('id', $pasien->id);
        return redirect('/dashboard/data-pasien')->with('success', 'Data berhasil dihapus!');
    }
}
