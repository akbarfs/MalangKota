<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PenulisController;
use App\Http\Controllers\Admin\TagController;


Route::middleware('auth')->group(function(){
    Route::get('/profil',[ProfilController::class,'index'])->name('admin.profil');
});

Auth::routes();
//Login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
//Profile
Route::get('/profil.{id}.edit', [ProfilController::class, 'edit']);
Route::put('/profil.{id}', [ProfilController::class, 'update']);
//Manajeman User
Route::get('/user',[UserController::class,'index'])->name('admin.user');
Route::get('/user.cari',[UserController::class,'search']);
Route::get('/user.tambah',[UserController::class,'create']);
Route::post('/user',[UserController::class,'store']);
Route::get('/user.{id}.edit',[UserController::class,'edit']);
Route::put('/user.{id}',[UserController::class,'update']);
Route::get('/user.{id}',[UserController::class,'show']);
Route::delete('/user.{id}',[UserController::class,'destroy']);
//Berita
Route::get('/berita',[BeritaController::class,'index'])->name('admin.berita');
Route::get('/berita.cari',[BeritaController::class,'search']);
Route::get('/berita.tambah',[BeritaController::class,'create']);
Route::post('/berita',[BeritaController::class,'store']);
Route::get('/berita.{id}.edit',[BeritaController::class,'edit']);
Route::put('/berita.{id}',[BeritaController::class,'update']);
Route::get('/berita.{id}',[BeritaController::class,'show']);
Route::delete('/berita.{id}',[BeritaController::class,'destroy']);
//Kategori
Route::get('/kategori',[KategoriController::class,'index'])->name('admin.kategori');
Route::get('/kategori.cari',[KategoriController::class,'search']);
Route::get('/kategori.tambah',[KategoriController::class,'create']);
Route::post('/kategori',[KategoriController::class,'store']);
Route::get('/kategori.{id}.edit',[KategoriController::class,'edit']);
Route::put('/kategori.{id}',[KategoriController::class,'update']);
Route::delete('/kategori.{id}',[KategoriController::class,'destroy']);
//Penulis
Route::get('/penulis',[PenulisController::class,'index'])->name('admin.penulis');
Route::get('/penulis.cari',[PenulisController::class,'search']);
Route::get('/penulis.tambah',[PenulisController::class,'create']);
Route::post('/penulis',[PenulisController::class,'store']);
Route::get('/penulis.{id}.edit',[PenulisController::class,'edit']);
Route::put('/penulis.{id}',[PenulisController::class,'update']);
Route::delete('/penulis.{id}',[PenulisController::class,'destroy']);
//Tag
Route::get('/tag',[TagController::class,'index'])->name('admin.penulis');
Route::get('/tag.cari',[TagController::class,'search']);
Route::get('/tag.tambah',[TagController::class,'create']);
Route::post('/tag',[TagController::class,'store']);
Route::get('/tag.{id}.edit',[TagController::class,'edit']);
Route::put('/tag.{id}',[TagController::class,'update']);
Route::delete('/tag.{id}',[TagController::class,'destroy']);
