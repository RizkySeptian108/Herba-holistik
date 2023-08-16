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
        $currentDate = Carbon::now()->toDateString(); // Get the current date 
        $data = Pendaftaran::whereDate("created_at", "=", $currentDate)->get();
        return view('pelayanan', [
            "head" => "Pelayanan",
            "pendaftarans" => $data
        ]);
    }

    public function periksa(Pasien $pasien)
    {

        $pasien = $pasien->load([
            'pendaftaran' => function ($query) {
                $query->select('id','created_at', 'diagnosa', 'status', 'status_pembayaran', 'pasien_id', 'user_id');
            },
            'pendaftaran.terapi' => function ($query) {
                $query->select('id','nama_terapi');
            },
            'pendaftaran.obat' => function ($query) {
                $query->select('id','nama_obat');
            },
            'pendaftaran.user' => function ($query){
                $query->select('id', 'nama');
            }
        ]);

        $terapis = Terapi::select('id', 'nama_terapi')->get();
        $obats = ObatHerbal::select('id', 'nama_obat')->get();
        return view('periksa', [
            'head' => 'Periksa',
            'pasien' => $pasien,
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

    public function pembayaran(Pendaftaran $pendaftaran)
    {
        $totalTerapi = 0;
        $totalObat = 0;

        foreach($pendaftaran->terapi as $terapi){
            $totalTerapi += $terapi->harga;
        }
        foreach($pendaftaran->obat as $obat){
            $totalObat += $obat->harga;
        }

        return view('pembayaran', [
            'head' => 'Pembayaran',
            'pendaftaran' => $pendaftaran,
            'totalTerapi' => $totalTerapi,
            'totalObat' => $totalObat
        ]);
    }

    public function selesai(Pendaftaran $pendaftaran)
    {
        Pendaftaran::where('id', $pendaftaran->id)->update(['status_pembayaran' => true]);
        return redirect('/pelayanan')->with('success', 'Pelayanan selesai');
    }

    public function search(Request $request)
    {
        if($request->date_time){
            $data = Pendaftaran::whereDate('created_at', '=', $request->date_time)->get();
            return json_encode($data->load('pasien:id,nama_pasien'));
        } else if ($request->keyword){
            $data = Pendaftaran::where('nama_pasien', 'LIKE', '%' . $request->keyword)->get();
            return json_encode($data->load('pasien:id,nama_pasien'));
        }
    }
}
