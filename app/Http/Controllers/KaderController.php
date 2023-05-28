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
        if(!Auth::check()) {
            return redirect('login');
        } else {
            $user = Auth::user();
            $data = $user->namalengkap;
            return view('kader/dashboardKader', ['data'=>$data]);
        }
    }

    public function tambahbalita()
    {
        if(!Auth::check()) {
            return redirect('login');
        } else {
            return view('kader/tambah/tambahBalita');
        }
    }

    public function tambahibuhamil()
    {
        if(!Auth::check()) {
            return redirect('login');
        } else {
            return view('kader/tambah/tambahIbuhamil');
        }
    }
    
    public function tabelbalita() 
    {
        if(!Auth::check()) {
            return redirect('login');
        } else {
            $user = Auth::user();
            $data = $user->idposyandu;

            $tabelbalita = DB::table('balita')
                    ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idposyandu', '=', $data)
                    ->get();
            return view('kader/tabelBalita', ['tabelbalita'=>$tabelbalita]);
        }
    }

    public function tabelibuhamil() 
    {
        if(!Auth::check()) {
            return redirect('login');
        } else {
            $user = Auth::user();
            $data = $user->idposyandu;
    
            $tabelibuhamil = DB::table('ibuhamil')
                    ->leftJoin('status', 'ibuhamil.id_status', '=', 'status.id_status')->where('idposyandu', '=', $data)
                    ->get();
            return view('kader/tabelIbuhamil', ['tabelibuhamil'=>$tabelibuhamil]);
        }
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
        $data->id_jk            = $request->kelamin;
        $data->save();

        return redirect('/tabelbalita')->with('tambah', 'Tambah Data Balita Berhasil !!');
    }

    public function simpanibuhamil(Request $request)
    {
        $user = Auth::user();

        $data = new Ibuhamil;
        $data->namalengkap      = $request->namalengkap;
        $data->hpht             = $request->hpht;
        $data->alamat           = $request->alamat;
        $data->idposyandu       = $user->idposyandu;
        $data->id_status        = $request->status;
        $data->save();

        return redirect('/tabelibuhamil')->with('tambah', 'Tambah Data Ibu Hamil Berhasil !!');
    }
    

    public function ubahbalita($id)
    {   
        if(!Auth::check()) {
            return redirect('login');
        } else {
            $data = DB::table('balita')
                ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idbalita', $id)
                ->first();                                                      
    
            return view('kader/ubah/ubahBalita', ['data'=>$data]);
        }
        
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
            'imunisasi_polio'       => $request->imunisasi_polio,
            'id_jk'            => $request->kelamin
        ]);

        return redirect('/tabelbalita')->with('ubah', 'Ubah Data Balita Berhasil !!');
    }

    public function ubahibuhamil($id)
    {
        if(!Auth::check()) {
            return redirect('login');
        } else {
            $data = DB::table('ibuhamil')
                ->leftJoin('status', 'ibuhamil.id_status', '=', 'status.id_status')->where('idibuhamil', $id)
                ->first();

            return view('kader/ubah/ubahibuhamil', ['data'=>$data]);
        }

    }

    public function updateibuhamil(Request $request, $id)
    {
        DB::table('ibuhamil')->where('idibuhamil', $id)->update([
            'namalengkap' => $request->namalengkap,
            'alamat'      => $request->alamat,
            'hpht'        => $request->hpht,
            'id_status'   => $request->status
        ]);

        return redirect('/tabelibuhamil')->with('ubah', 'Ubah Data Balita Berhasil !!');
    }

    public function hapusbalita($id)
    {
        if(!Auth::check()) {
            return redirect('login');
        } else {
            DB::table('balita')->where('idbalita', $id)->delete();

            return redirect('tabelbalita')->with('hapus', 'Hapus Data Balita Berhasil !!');
        }
        
    }
}
