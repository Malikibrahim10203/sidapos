<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Query\Builder;

class AdminController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $data = $user->namalengkap;

        $queryanggrek = DB::table('users')->where('idposyandu', 1)->get();
        $kaderanggrek = count($queryanggrek);

        $querymawar   = DB::table('users')->where('idposyandu', 2)->get();
        $kadermawar   = count($querymawar);

        $head         = 'Dashboard | Admin';

        return view('admin/dashboardAdmin', ['data'=>$data, 'kaderanggrek'=>$kaderanggrek, 'kadermawar'=>$kadermawar, 'head'=>$head]);
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
        
        return redirect('tampiltambahkader')->with('success', 'Data berhasil di tambah');
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
            ->simplePaginate(5);
        return view('admin/tabelkader/tabelAnggrek', ['kaderanggrek'=>$kaderanggrek]);
    }

    public function tabelmawar()
    {
        $kadermawar = DB::table('users')
            ->leftJoin('posyandu', 'users.idposyandu', '=', 'posyandu.idposyandu')->where('jabatan', '=', 'kader')->where('users.idposyandu', '=', '2')
            ->simplePaginate(5);
        return view('admin/tabelkader/tabelMawar', ['kadermawar'=>$kadermawar]);
    }
    //

    public function tabelbalaidesa()
    {
        return view('admin/tabelkader/tabelbalaidesa');
    }

    //
    public function ubahkader($id)
    {
        $dataposyandu = DB::table('posyandu')->get();
        $data = DB::table('users')->where('id', $id)->first();

        return view('admin/tabelkader/ubah/ubahKader', ['data'=>$data, 'dataposyandu'=>$dataposyandu]);
    }

    public function updatekader(Request $request, $id)
    {
        $data = $request->pos;

        DB::table('users')->where('id', $id)->update([
            'namalengkap'   => $request->namalengkap,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'idposyandu'    => $request->pos
        ]);

        if($data == '1') {
            return redirect('/tabelkaderanggrek')->with('status_update', 'Data Berhasil Diubah');
        } else if($data == '2') {
            return redirect('/tabelkadermawar')->with('status_update', 'Data Berhasil Diubah');
        } else {
            return redirect('/dashboardadmin');
        }
    }

    public function hapusposyandu(Request $request, $id)
    {   
        $data = DB::table('users')->where('id', $id)->first();

        if($data->idposyandu == '1') {

            DB::table('users')->where('id', $id)->delete();
            return redirect('/tabelkaderanggrek')->with('status_hapus', 'Data Kader Berhasil Dihapus');

        } else if($data->idposyandu == '2') {

            DB::table('users')->where('id', $id)->delete();
            return redirect('/tabelkadermawar')->with('status_hapus', 'Data Kader Berhasil Dihapus');

        } else {

            DB::table('users')->where('id', $id)->delete();
            return redirect('/dashboardadmin');

        }
    }

    public function tabelbalita($parameter, Request $request)
    {
        if($parameter == 1){

            $bulan = $request->cari;

            $nama = 1;
            $tabelbalita = DB::table('balita')
                ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idposyandu', '=', 1)->simplePaginate(5);                                                                                
            return view('admin/tabelbalita/tabelBalitaAnggrek', ['tabelbalita'=>$tabelbalita, 'nama'=>$nama]);
        } else if($parameter == 2) {

            $nama = 2;
            $tabelbalita = DB::table('balita')
                ->leftJoin('jeniskelamin', 'balita.id_jk', '=', 'jeniskelamin.id_jk')->where('idposyandu', '=', 2)->simplePaginate(5);
            return view('admin/tabelbalita/tabelBalitaMawar', ['tabelbalita'=>$tabelbalita, 'nama'=>$nama]);
        }
    }

    public function tabelibuhamil($parameter)
    {
        if($parameter == 1){

            $nama = 1;
            $tabelibuhamil = DB::table('ibuhamil')
                ->leftJoin('status', 'ibuhamil.id_status', '=', 'status.id_status')->where('idposyandu', '=', 1)
                ->simplePaginate(5);
            return view('admin/tabelbumil/tabelIbuhamilAnggrek', ['tabelibuhamil'=>$tabelibuhamil, 'nama'=>$nama]);
        } else if($parameter == 2) {

            $nama = 2;
            $tabelibuhamil = DB::table('ibuhamil')
                ->leftJoin('status', 'ibuhamil.id_status', '=', 'status.id_status')->where('idposyandu', '=', 2)
                ->simplePaginate(5);
            return view('admin/tabelbumil/tabelIbuhamilMawar', ['tabelibuhamil'=>$tabelibuhamil, 'nama'=>$nama]);
        }
    }
}
