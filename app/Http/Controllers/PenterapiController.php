<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class PenterapiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.penterapi.index', [
            'head' => 'Penterapi',
            'penterapi' => User::whereNotIn('role_id', [1])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.penterapi.create', [
            'head' => 'Tambah Penterapi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'nama' => 'required|min:3|regex:/^[\pL\s\-]+$/u',
        'username' => 'required|unique:App\Models\User,username|min:4',
        'password' => 'required|min:3',
        'alamat' => 'regex:/^[\pL\s\-]+$/u',
        'usia' => 'numeric', 
        'foto' => 'image|file|max:2048'
       ]);

        if($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('users-images');
        }

       $validatedData['password'] = Hash::make($validatedData['password']);
       $validatedData['role_id'] = 2;

       User::create($validatedData);
       return redirect('/dashboard/penterapi')->with('success', 'Data penterapi berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.penterapi.show', [
            'head' => 'Detail Penterapi',
            'penterapi' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.penterapi.edit', [
            'head' => 'Edit Penterapi',
            'penterapi' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nama' => 'required|min:3|regex:/^[\pL\s\-]+$/u',
            'alamat' => 'regex:/^[\pL\s\-]+$/u',
            'usia' => 'numeric', 
            'foto' => 'image|file|max:2048'
        ];

        if($request->username != $user->username){
            $rules['username'] =  'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if($request->file('foto')) {
            if($request->oldFoto){
                Storage::delete($request->oldFoto);
            }
            // $request->file('image')->store('post-image'); ini mengembalikan path
            $validatedData['foto'] = $request->file('foto')->store('users-images');
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('/dashboard/penterapi')->with('success', 'Data user berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('dashboard/penterapi')->with('success', 'Data penterapi berhasil dihapus!');
    }
}
