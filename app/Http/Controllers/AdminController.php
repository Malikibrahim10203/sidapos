<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input;
use Illuminate\Support\Facades\Auth;
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

    public function viewtambah()
    {
        $dataposyandu = DB::table('posyandu')->get();

        return view('admin/tambahKader', ['dataposyandu'=> $dataposyandu]);
    }

    public function tabelanggrek()
    {
        $kaderanggrek = DB::table('users')
            ->leftJoin('posyandu', 'users.idposyandu', '=', 'posyandu.idposyandu')->where('jabatan', '=', 'kader')->where('users.idposyandu', '=', '1')
            ->get();
        return view('admin/tabelkader/tabelAnggrek', ['kaderanggrek'=>$kaderanggrek]);
    }

    public function tabelmawar()
    {
        $kadermawar = DB::table('users')
            ->leftJoin('posyandu', 'users.idposyandu', '=', 'posyandu.idposyandu')->where('jabatan', '=', 'kader')->where('users.idposyandu', '=', '2')
            ->get();
        return view('admin/tabelkader/tabelMawar', ['kadermawar'=>$kadermawar]);
    }
    //

    public function tabelbalaidesa()
    {
        return view('admin/tabelkader/tabelbalaidesa');
    }
    //
    public function ubahposyandu($id)
    {
        $dataposyandu = DB::table('posyandu')->get();
        $data = DB::table('users')->where('id', $id)->first();

        return view('admin/tabelkader/ubah/ubahKader', ['data'=>$data, 'dataposyandu'=>$dataposyandu]);
    }
    public function hapusposyandu($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect('/tabelkaderanggrek');
    }
}
