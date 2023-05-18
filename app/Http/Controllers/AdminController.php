<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input;
use Auth;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $data = $user->namalengkap;
        return view('admin/dashboardAdmin', ['data'=>$data]);
    }

    public function simpan(Request $request)
    {
        /*
        $data = array(
            'namalengkap' => Input::get('namalengkap'),
            'username'     => Input::get('username'),
            'email'     => Input::get('email'),
            'password'  => Input::get(bcrypt('password')),
            'jabatan' => 'kader',
            'idposyandu' => Input::get('idposyandu')
        );

        DB::table('users')->insert($data);*/

        $data = new User;
        $data->namalengkap = $request->namalengkap;
        $data->username    = $request->username;
        $data->email       = $request->email;
        $data->password    = bcrypt($request->password);
        $data->jabatan     = 'kader';
        $data->idposyandu  = $request->pos;
        $data->save();
        
        return redirect('dashboardadmin');
    }

    public function tabel()
    {
        $jabatan1 = DB::table('users')
            ->leftJoin('posyandu', 'users.idposyandu', '=', 'posyandu.idposyandu')->where('jabatan', '=', 'kader')->where('users.idposyandu', '=', '1')
            ->get();
        return view('admin/tabelkader/tabelAnggrek', ['jabatan1'=>$jabatan1]);
    }
}
