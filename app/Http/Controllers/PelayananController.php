<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Carbon;

class PelayananController extends Controller
{
    public function index(){
        if(request('date')){
            return view('pelayanan', [
                "head" => "Pelayanan",
                "pendaftarans" => Pendaftaran::whereDate("created_at", "=", request('date'))->get()
            ]);
        }

        $currentDate = Carbon::now()->toDateString(); // Get the current date in the database format
        return view('pelayanan', [
            "head" => "Pelayanan",
            "pendaftarans" => Pendaftaran::whereDate("created_at", "=", $currentDate)->get()
        ]);
    }
}
