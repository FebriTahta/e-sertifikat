<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EsertifikatCont;
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

// Route::get('/', function () {
	// return redirect()->away('https://sertifikat.nurulfalah.org');
//  return view('/welcome');
// });
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[EsertifikatCont::class, 'index'])->name('index.e_sertifikat');
Route::get('/data/{id}',[EsertifikatCont::class, 'data'])->name('data.e_sertifikat');
Route::get('/{slug}/{id}',[EsertifikatCont::class, 'list'])->name('list.e_sertifikat');
Route::get('/seluruh/data/e-sertifikat',[EsertifikatCont::class, 'semua'])->name('seluruh.e_sertifikat');

Route::get('/fixing', [EsertifikatCont::class,'fixing']);