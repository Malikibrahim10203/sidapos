<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class KaderController extends Controller
{
    //
    public function index()
    {   
        $user = Auth::user();
        $data = $user->namalengkap;
        return view('kader/dashboardKader', ['data'=>$data]);
    }


    public function viewtambah()
    {
        $dataposyandu = DB::table('posyandu')->get();

        return view('admin/tambahKader', ['dataposyandu'=> $dataposyandu]);
    }
}
