<?php

use App\Http\Controllers\EncuestasController;
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

Route::get('/', [EncuestasController::class,'index'])->name('main');
Route::get('/encuestas',function(){
    return view('form');
})->name('encuestas');


Route::post('/enviarEncuesta',[EncuestasController::class,'create'])->name('enviar');
Route::get('documentacionAPI', function () {
    return view('API');
})->name('documentacion');