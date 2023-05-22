<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\Balita;

class KaderController extends Controller
{
    //
    public function index()
    {   
        $user = Auth::user();
        $data = $user->namalengkap;
        return view('kader/dashboardKader', ['data'=>$data]);
    }

    public function tambahbalita()
    {
        return view('kader/tambahBalita');
    }

    public function tambahibuhamil()
    {
        return view('kader/tambahIbuhamil');
    }
    
    public function tabelbalita() {
        $user = Auth::user();
        $data = $user->idposyandu;

        $tabelbalita = DB::table('balita')->where('idposyandu', '=', $data)->get();

        return view('kader/tabelBalita', ['tabelbalita'=>$tabelbalita]);
    }

    public function tabelibuhamil() {
        $user = Auth::user();
        $data = $user->idposyandu;

        $tabelibuhamil = DB::table('ibuhamil')->where('idposyandu', '=', $data)->get();
        return view('kader/tabelIbuhamil', ['tabelibuhamil'=>$tabelibuhamil]);
    }

    public function simpanbalita(Request $request)
    {
        $user = Auth::user();
        if($user->idposyandu == 1)
        {
            $data = new Balita;
            $data->namalengkap      = $request->namalengkap;
            $data->alamat           = $request->alamat;
            $data->umur             = $request->umur;
            $data->imunisasi_bcg    = $request->imunisasi_bcg;
            $data->imunisasi_campak = $request->imunisasi_campak;
            $data->imunisasi_dpt_hb_hib  = $request->imunisasi_dpt;
            $data->imunisasi_hepatitis_b = $request->imunisasi_hepatitis;
            $data->imunisasi_polio       = $request->imunisasi_polio;
            $data->idposyandu       = 1;
            $data->save();

            return redirect('dashboardkader');
        }
    }
    
}
