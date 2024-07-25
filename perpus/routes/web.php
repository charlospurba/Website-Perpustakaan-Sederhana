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

Route::get('/', function () {
    return view('index');
});

//Route untuk Data Buku
Route::get('/buku', 'BukuController@bukutampil');
Route::post('/buku/tambah', 'BukuController@bukutambah');
Route::get('/buku/hapus/{id_buku}', 'BukuController@bukuhapus');
Route::put('/buku/edit/{id_buku}', 'BukuController@bukuedit');

//Route untuk Data Buku
Route::get('/home', function(){return view('view_home');});

//Route untuk Data Anggota
Route::get('/anggota', 'AnggotaController@anggotatampil');

//Route untuk Data Petugas
Route::get('/petugas', 'PetugasController@petugastampil');

//Route untuk Data Peminjaman
Route::get('/peminjaman', 'PeminjamanController@peminjamantampil');
