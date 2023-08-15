<?php

namespace App\Http\Controllers;

use App\Models\ObatHerbal;
use App\Models\Terapi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $obat = ObatHerbal::inRandomOrder()->take(6)->get();
        $terapi = Terapi::inRandomOrder()->take(6)->get();
        return view('home', [
            'head' => 'Herbal Holistik',
            'obats' => $obat,
            'terapis' => $terapi
        ]);
    }
}
