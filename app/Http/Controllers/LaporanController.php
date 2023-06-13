<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use PDF;


class LaporanController extends Controller
{

    public function tabelbalita($name, $bulan)
    {
        
        if($name == 1){
            $pos = DB::table('posyandu')->select('pos')->where('idposyandu', 1)->get();
            $tabelbalita = DB::table('balita')
                ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idposyandu', '=', 1)->where(DB::raw("(DATE_FORMAT(created_at, '%m'))"), $bulan)
                ->get();

        }else if($name == 2){
            $pos = DB::table('posyandu')->select('pos')->where('idposyandu', 2)->get();
            $tabelbalita = DB::table('balita')
                ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idposyandu', '=', 2)->where(DB::raw("(DATE_FORMAT(created_at, '%m'))"), $bulan)
                ->get();

        }

        return view('laporan_balita', ['tabelbalita'=>$tabelbalita, 'pos'=>$pos]);
    }

    public function exportbalita($name, $bulan){
        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database

        if($name == 1){
            $pos = DB::table('posyandu')->select('pos')->where('idposyandu', 1)->get();
            $tabelbalita = DB::table('balita')
                ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idposyandu', '=', 1)->where(DB::raw("(DATE_FORMAT(created_at, '%m'))"), $bulan)
                ->get();

        }else if($name == 2){
            $pos = DB::table('posyandu')->select('pos')->where('idposyandu', 2)->get();
            $tabelbalita = DB::table('balita')
                ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idposyandu', '=', 2)->where(DB::raw("(DATE_FORMAT(created_at, '%m'))"), $bulan)
                ->get();

        }

        $data = PDF::loadview('/laporan_balita', ['tabelbalita'=>$tabelbalita, 'bulan'=>$bulan, 'pos'=>$pos]);
        //mendownload laporan.pdf
    	return $data->download('laporan_sidapos.pdf');
    }

    public function tabelibuhamil($name, $bulan, Request $request)
    {

        if($name == 1){
            $pos = DB::table('posyandu')->select('pos')->where('idposyandu', 1)->get();
            $tabelibuhamil = DB::table('ibuhamil')
                ->leftJoin('status', 'ibuhamil.id_status', '=', 'status.id_status')->where('idposyandu', '=', 1)->where(DB::raw("(DATE_FORMAT(hpht, '%m'))"), $bulan)
                ->get();
        }else if($name == 2){
            $pos = DB::table('posyandu')->select('pos')->where('idposyandu', 2)->get();
            $tabelibuhamil = DB::table('ibuhamil')
                ->leftJoin('status', 'ibuhamil.id_status', '=', 'status.id_status')->where('idposyandu', '=', 2)->where(DB::raw("(DATE_FORMAT(created_at, '%m'))"), $bulan)
                ->get();
        }

        return view('laporan_ibuhamil', ['tabelibuhamil'=>$tabelibuhamil, 'pos'=>$pos]);
    }

    public function exportibuhamil($name, $bulan){
        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database

        if($name == 1){
            $pos = DB::table('posyandu')->select('pos')->where('idposyandu', 1)->get();
            $tabelibuhamil = DB::table('ibuhamil')
                ->leftJoin('status', 'ibuhamil.id_status', '=', 'status.id_status')->where('idposyandu', '=', 1)->where(DB::raw("(DATE_FORMAT(created_at, '%m'))"), $bulan)
                ->get();
        }else if($name == 2){
            $pos = DB::table('posyandu')->select('pos')->where('idposyandu', 2)->get();
            $tabelibuhamil = DB::table('ibuhamil')
                ->leftJoin('status', 'ibuhamil.id_status', '=', 'status.id_status')->where('idposyandu', '=', 2)->where(DB::raw("(DATE_FORMAT(created_at, '%m'))"), $bulan)
                ->get();
        }

        $data = PDF::loadview('/laporan_ibuhamil', ['tabelibuhamil'=>$tabelibuhamil,  'pos'=>$pos]);
        //mendownload laporan.pdf
    	return $data->download('laporan_sidapos.pdf');
    }

    public function tabelkader($name, $bulan)
    {
        
        if($name == 1){
            $tabelkader = DB::table('users')
            ->leftJoin('posyandu', 'users.idposyandu', '=', 'posyandu.idposyandu')->where('jabatan', '=', 'kader')->where('users.idposyandu', '=', '1')->where(DB::raw("(DATE_FORMAT(created_at, '%m'))"), $bulan)
            ->get();
        }else if($name == 2){
            $tabelkader = DB::table('users')
            ->leftJoin('posyandu', 'users.idposyandu', '=', 'posyandu.idposyandu')->where('jabatan', '=', 'kader')->where('users.idposyandu', '=', '2')->where(DB::raw("(DATE_FORMAT(created_at, '%m'))"), $bulan)
            ->get();
        }
        

        return view('laporan_kader', ['tabelkader'=>$tabelkader]);
    }

    public function exportkader($name, $bulan){
        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database

        if($name == 1){
            $tabelkader = DB::table('users')
            ->leftJoin('posyandu', 'users.idposyandu', '=', 'posyandu.idposyandu')->where('jabatan', '=', 'kader')->where('users.idposyandu', '=', '1')->where(DB::raw("(DATE_FORMAT(created_at, '%m'))"), $bulan)
            ->get();
        }else if($name == 2){
            $tabelkader = DB::table('users')
            ->leftJoin('posyandu', 'users.idposyandu', '=', 'posyandu.idposyandu')->where('jabatan', '=', 'kader')->where('users.idposyandu', '=', '2')->where(DB::raw("(DATE_FORMAT(created_at, '%m'))"), $bulan)
            ->get();
        }

        $data = PDF::loadview('/laporan_kader', ['tabelkader'=>$tabelkader, 'bulan'=>$bulan]);
        //mendownload laporan.pdf
    	return $data->download('laporan_sidapos.pdf');
    }
}
