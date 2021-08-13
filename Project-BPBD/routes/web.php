<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BencanaController;
use App\Http\Controllers\ElementsController;
use App\Models\Bencana;
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
    $data_bencana = Bencana::all()->where('status_bencana', '=', 'Aktif');
    return view('/landingpage/main', ['data_bencana' => $data_bencana]); 
});


Auth::routes();


// Route::get('/logintest', [App\Http\Controllers\AdminController::class, 'login2']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    //data
    Route::prefix('data')->group(function () {
        //home
        Route::get('/', [AdminController::class, 'indexhome'])->name('admin');
        Route::get('/home', [AdminController::class, 'indexhome']);

        Route::prefix('history')->group(function () {
            Route::get('/data-bencana', [BencanaController::class, 'index']);
            Route::get('/data-elemen', [ElementsController::class, 'index']);
        });
        // bencana
        Route::get('/detail-bencana/{id}', [BencanaController::class, 'show']);

        //akun
        Route::get('data-akun', [AkunController::class, 'index']);
    });

    //map
    Route::prefix('maps')->group(function () {
        Route::get('/', [BencanaController::class, 'maps']);
    });
});


Route::get('/home/search', [AdminController::class, 'homesearch'])->name('home.search');

// action bencana 
Route::post('/bencana/store', [BencanaController::class, 'store'])->name('simpan bencana');
Route::post('/bencana/update/{id}', [App\Http\Controllers\AdminController::class, 'update']);
Route::get('/bencana/delete/{id}', [BencanaController::class, 'delete']);
Route::get('/bencana/search', [BencanaController::class, 'search'])->name('bencana.search');

// action elemen 
Route::post('/elemen/store', [App\Http\Controllers\ElementsController::class, 'store'])->name('simpan element');
Route::post('/elemen/update/{icon}', [App\Http\Controllers\ElementsController::class, 'update']);
Route::get('/elemen/delete/{item}', [App\Http\Controllers\ElementsController::class, 'delete']);
Route::get('/element/search', [ElementsController::class, 'search'])->name('element.search');

// action akun
Route::get('/akun/delete/{id}', [AkunController::class, 'delete']);
Route::get('/akun/search', [AkunController::class, 'search'])->name('akun.search');
