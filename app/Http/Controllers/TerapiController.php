<?php

namespace App\Http\Controllers;

use App\Models\Terapi;
use App\Http\Requests\StoreTerapiRequest;
use App\Http\Requests\UpdateTerapiRequest;

class TerapiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.terapi.index', [
            'head' => 'Terapi',
            'terapi' => Terapi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.terapi.create', [
            'head' => 'Tambah Terapi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTerapiRequest $request)
    {
        $validatedData = $request->validated();

        Terapi::create($validatedData);
        return redirect('/dashboard/terapi')->with('success', 'Data terapi berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Terapi $terapi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Terapi $terapi)
    {
        return view('dashboard.terapi.edit', [
            'head' => 'Edit Terapi',
            'terapi' => $terapi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTerapiRequest $request, Terapi $terapi)
    {
        $validatedData = $request->validated();
        Terapi::where('id', $terapi->id)->update($validatedData);
        return redirect('/dashboard/terapi')->with('success', 'Data terapi berhasi di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terapi $terapi)
    {
        Terapi::destroy('id', $terapi->id);
        return redirect('/dashboard/terapi')->with('success', 'Data terapi berhasi di hapu!');
    }
}
