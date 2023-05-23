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

        Route::get('/tampiltambahkader', 'App\Http\Controllers\AdminController@viewtambah')->name('admin');

        Route::get('/tabelkaderanggrek', 'App\Http\Controllers\AdminController@tabelanggrek')->name('admin');

        Route::get('/tabelkadermawar', 'App\Http\Controllers\AdminController@tabelmawar')->name('admin');
        //
        Route::get('/tabelkaderbalaidesa', 'App\Http\Controllers\AdminController@tabelbalaidesa')->name('admin');
        //





        //Route::get('/tambahkader', 'App\Http\Controllers\KaderController@simpan')->name('simpan');
    });

    Route::group(['middleware' => ['cek_login:kader']], function()
    {
        Route::get('/dashboardkader', 'App\Http\Controllers\KaderController@index')->name('kader');
        
        Route::get('/tambahbalita', 'App\Http\Controllers\KaderController@tambahbalita')->name('kader');
        Route::get('/tambahibuhamil', 'App\Http\Controllers\KaderController@tambahibuhamil')->name('kader');
        
        Route::get('/tabelbalita', 'App\Http\Controllers\KaderController@tabelbalita')->name('kader');
        Route::get('/tabelibuhamil', 'App\Http\Controllers\KaderController@tabelibuhamil')->name('kader');

        Route::get('/ubahbalita/{id}', 'App\Http\Controllers\KaderController@ubahbalita')->name('kader');

        
    });

    Route::get('/logout','App\Http\Controllers\AuthController@logout')->name('logout');
});

route::get('/bahan', function() {
    return view('admin/tabelMentahan');
});

Route::post('/simpan', 'App\Http\Controllers\AdminController@simpan');
Route::post('/simpanbalita', 'App\Http\Controllers\KaderController@simpanbalita');
Route::post('/simpanibuhamil', 'App\Http\Controllers\KaderController@simpanibuhamil');

Route::post('/updatebalita', 'App\Http\Controllers\KaderController@updatebalita');
