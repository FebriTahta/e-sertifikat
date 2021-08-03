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

Route::get('/', function () {
   	return redirect('/');
	// return view('/welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[EsertifikatCont::class, 'index'])->name('index.e_sertifikat');
Route::get('/data',[EsertifikatCont::class, 'data'])->name('data.e_sertifikat');
Route::get('/sertifikat/{slug_diklat}',[EsertifikatCont::class, 'list'])->name('list.e_sertifikat');
