<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $data = $user->namalengkap;
        return view('admin/dashboardAdmin', ['data'=>$data]);
    }
}
