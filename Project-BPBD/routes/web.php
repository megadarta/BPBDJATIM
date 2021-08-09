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

// Route::get('/login', function () {
//     return view('/auth/login');
// });

Auth::routes();


// Route::get('/logintest', [App\Http\Controllers\AdminController::class, 'login2']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/data/home', [App\Http\Controllers\AdminController::class, 'indexhome']);
    Route::get('/data/history/data-bencana', [App\Http\Controllers\AdminController::class, 'indexdatabencana']);
    Route::get('/data/data-akun', [App\Http\Controllers\AdminController::class, 'indexdataakun']);
    Route::get('/detail-bencana/{id}', [App\Http\Controllers\AdminController::class, 'indexdetailbencana']);
});

// maps 
Route::get('/maps', [App\Http\Controllers\BencanaController::class, 'maps']);
Route::get('/maps/titik', [App\Http\Controllers\BencanaController::class, 'titik']);

// bencana 
Route::post('/bencana/create', [App\Http\Controllers\BencanaController::class, 'create']);
Route::get('/bencana/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete']);
Route::post('/bencana/update/{id}', [App\Http\Controllers\AdminController::class, 'update']);

// elemen 
Route::get('admin/data/history/data-elemen', [App\Http\Controllers\ElementsController::class, 'index']);
Route::post('/elemen/create', [App\Http\Controllers\ElementsController::class, 'store']);
Route::get('/elemen/delete/{item}', [App\Http\Controllers\ElementsController::class, 'delete']);
Route::post('/elemen/update/{icon}', [App\Http\Controllers\ElementsController::class, 'update']);
