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
    public function balitaanggrek(){
        //menampilkan halaman laporan
        return view('admin/tabelbalita/tabelBalitaAnggrek');
    }

    public function tabelbalita($name)
    {

        if($name == 1){
            $tabelbalita = DB::table('balita')
                ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idposyandu', '=', 1)->where(DB::raw("(DATE_FORMAT(created_at, '%Y'))"), "2023")
                ->get();

        }else if($name == 2){
            $tabelbalita = DB::table('balita')
                ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idposyandu', '=', 2)->where(DB::raw("(DATE_FORMAT(created_at, '%Y'))"), "2023")
                ->get();

        }

        return view('laporan_balita', ['tabelbalita'=>$tabelbalita]);
    }

    public function export($name){
        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database

        if($name == 1){
            $tabelbalita = DB::table('balita')
                ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idposyandu', '=', 1)->where(DB::raw("(DATE_FORMAT(created_at, '%Y'))"), "2023")
                ->get();

        }else if($name == 2){
            $tabelbalita = DB::table('balita')
                ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idposyandu', '=', 2)->where(DB::raw("(DATE_FORMAT(created_at, '%Y'))"), "2023")
                ->get();

        }

        $data = PDF::loadview('/laporan_balita', ['tabelbalita'=>$tabelbalita]);
        //mendownload laporan.pdf
    	return $data->download('laporan.pdf');
    }
}
