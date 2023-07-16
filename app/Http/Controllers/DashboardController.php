<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'head' => 'dashboard'
        ]);
    }

    public function changeImage(Request $request)
    {
        $validateData = $request->validate([
            'foto' => 'required|file|max:2048|image'
        ]);

        if(auth()->user()->foto !== 'default.jpg'){
            Storage::delete(auth()->user()->foto);
        }

        $validateData['foto'] = $request->file('foto')->store('users-images');
        
        User::where('id', auth()->user()->id)->update($validateData);

        return redirect('/dashboard');


    }

}
