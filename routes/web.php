<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('login');
});

Route::get('/tambahkader', function() {
    return view('admin/tambahKader');
});

route::get('/dashboardadmin', function() {
    return view('admin/dashboardAdmin');
});

route::get('/dashboardkader', function() {
    return view('kader/dashboardKader');
});

route::get('/bahan', function() {
    return view('admin/tabelMentahan');
});

