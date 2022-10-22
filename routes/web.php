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
    return view('auth.login');
});

Auth::routes();
//dahsboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    //Obat
    Route::get('/obat', [App\Http\Controllers\Obat\ObatController::class, 'index'])->name('obat');
    Route::post('/obatPost', [App\Http\Controllers\Obat\ObatController::class, 'obatPost'])->name('obatPost');
    Route::patch('/obatUpdate/{id}', [App\Http\Controllers\Obat\ObatController::class, 'obatUpdate'])->name('obatUpdate');
    Route::get('/obatDelete/{id}', [App\Http\Controllers\Obat\ObatController::class, 'obatDelete'])->name('obatDelete');
});
