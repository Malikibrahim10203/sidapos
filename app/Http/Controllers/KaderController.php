<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\Balita;
use App\Models\Ibuhamil;

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
        return view('kader/tambah/tambahBalita');
    }

    public function tambahibuhamil()
    {
        return view('kader/tambah/tambahIbuhamil');
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

        $data = new Balita;
        $data->namalengkap      = $request->namalengkap;
        $data->alamat           = $request->alamat;
        $data->tanggal_lahir    = $request->tanggallahir;
        $data->imunisasi_bcg    = $request->imunisasi_bcg;
        $data->imunisasi_campak = $request->imunisasi_campak;
        $data->imunisasi_dpt_hb_hib  = $request->imunisasi_dpt;
        $data->imunisasi_hepatitis_b = $request->imunisasi_hepatitis;
        $data->imunisasi_polio       = $request->imunisasi_polio;
        $data->idposyandu       = $user->idposyandu;
        $data->save();

        return redirect('dashboardkader');
    }

    public function simpanibuhamil(Request $request)
    {
        $user = Auth::user();

        $data = new Ibuhamil;
        $data->namalengkap      = $request->namalengkap;
        $data->hpht             = $request->hpht;
        $data->alamat           = $request->alamat;
        $data->idposyandu       = $user->idposyandu;
        $data->save();

        return redirect('dashboardkader');
    }
    

    public function ubahbalita($id)
    {
        $data = DB::table('balita')->where('idbalita', $id)->first();

        return view('kader/ubah/ubahBalita', ['data'=>$data]);
    }

    public function updatebalita(Request $request, $id)
    {

        DB::table('balita')->where('idbalita', $request->id)->update([
            'namalengkap'      => $request->namalengkap,
            'alamat'           => $request->alamat,
            'tanggal_lahir'    => $request->tanggallahir,
            'imunisasi_bcg'    => $request->imunisasi_bcg,
            'imunisasi_campak' => $request->imunisasi_campak,
            'imunisasi_dpt_hb_hib'  => $request->imunisasi_dpt,
            'imunisasi_hepatitis_b' => $request->imunisasi_hepatitis,
            'imunisasi_polio'       => $request->imunisasi_polio
        ]);

        return redirect('tabelbalita');
    }
}
