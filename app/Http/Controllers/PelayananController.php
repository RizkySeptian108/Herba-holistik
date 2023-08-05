<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Carbon;
use App\Models\Pasien;
use App\Models\Terapi;
use App\Models\ObatHerbal;

class PelayananController extends Controller
{
    public function index(){

        $old = ['date' => '', 'keyword' => ''];  //this is to repopulate the input
        if(request('date')){
            // with filtering date
            $old['date'] = request('date');
            $data = Pendaftaran::whereDate("created_at", "=", request('date'))->get();
        }else{
            // if there is no filter
            $currentDate = Carbon::now()->toDateString(); // Get the current date in the database format
            $data = Pendaftaran::whereDate("created_at", "=", $currentDate)->get();
        }

        if (request('keyword')) {
            // if want to filter a name
            $old['keyword'] = request('keyword');

            $keyword = strtolower(request('keyword')); //change keyword to lower case

            //filter the keyword
            $data = $data->filter(function ($item) use ($keyword) {
                $nama_pasien = strtolower($item->pasien()->value('nama_pasien'));
                return strpos($nama_pasien, $keyword) !== false;
            });
        }

        return view('pelayanan', [
            "head" => "Pelayanan",
            "old" => $old,
            "pendaftarans" => $data
        ]);
    }

    public function periksa(Pasien $pasien)
    {
        $pendaftaran = Pendaftaran::where('pasien_id', $pasien->id)->get();
        $terapis = Terapi::select('id', 'nama_terapi')->get();
        $obats = ObatHerbal::select('id', 'nama_obat')->get();
        return view('periksa', [
            'head' => 'Periksa',
            'pasien' => $pasien,
            'pendaftarans' => $pendaftaran,
            'terapis' => $terapis,
            'obats' => $obats
        ]);
    }

    public function store(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'diagnosa' => 'regex:/^[\pL\s\-]+$/u|max:50',
            'terapi' => 'array', // Pastikan terapi adalah array
            'terapi.*' => 'numeric', // Pastikan semua elemen dalam terapi adalah angka
            'obat' => 'array',
            'obat.*' => 'numeric'
        ]);

        $pendaftaranUpdate = [
            'diagnosa' => $request->diagnosa,
            'user_id' => auth()->user()->id
        ];

        if($request->terapi){
            foreach($request->terapi as $terapi){
                $pendaftaran->terapi()->attach($terapi);
            }
        }

        if($request->obat){
            foreach($request->obat as $obat){
                $pendaftaran->obat()->attach($obat);
            }
        }

        Pendaftaran::where('id', $pendaftaran->id)->update($pendaftaranUpdate);

        return redirect('/pelayanan/periksa/'. $pendaftaran->pasien_id)->with('success', 'Data yang baru berhasil ditambahkan');
    }
}
