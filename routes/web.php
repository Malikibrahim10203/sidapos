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

//
Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');

// auth 

// auth -> Admin || Kader
Route::group(['middleware' => ['auth']], function()
{
    // cek_login yang di inisialisasi di kernel tadi 
    Route::group(['middleware' => ['cek_login:admin']], function()
    {
        Route::get('/dashboardadmin', 'App\Http\Controllers\AdminController@index')->name('admin');

        Route::get('/tampiltambahkader', 'App\Http\Controllers\KaderController@viewtambah')->name('admin');
        





        //Route::get('/tambahkader', 'App\Http\Controllers\KaderController@simpan')->name('simpan');
    });

    Route::group(['middleware' => ['cek_login:kader']], function()
    {
        Route::get('/dashboardkader', 'App\Http\Controllers\KaderController@index')->name('kader');
        
    });

    Route::get('/logout','App\Http\Controllers\AuthController@logout')->name('logout');
});

route::get('/bahan', function() {
    return view('admin/tabelMentahan');
});

