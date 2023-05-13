<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Redirect;
use Auth;

class AuthController extends Controller
{
    //
    public function index(Request $request)
    {

            // untuk menangkap username sama password
            $kredensil = $request->only('username','password');
            
            // jika kondisi true maka akan mengecek jabatan
            if(Auth::attempt($kredensil))
            {
                $user = Auth::user();
                if($user->jabatan == 'admin')
                {   
                    return redirect('dashboardadmin');
                } else if($user->jabatan =='kader') {
                    $kondisi = 1;
                    return redirect('dashboardkader');
                }
                return redirect('login');
            }

        return view('login');
    }

    public function proses_login(Request $request)
    {
        // validasi password harus terisi
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
            );

            // untuk menangkap username sama password
            $kredensil = $request->only('username','password');
            
            // jika kondisi true maka akan mengecek jabatan
            if(Auth::attempt($kredensil))
            {
                $user = Auth::user();
                
                if($user->jabatan == 'admin')
                {   
                    return redirect('dashboardadmin');
                } else if($user->jabatan =='kader') {
                    return redirect('dashboardkader');
                }
                return redirect()->intended('/');
            }
            // Jika gagal Login
            // $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
            return Redirect::to('login')->with('alert-gagal', 'Username atau Password salah!');
    }   
    
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
