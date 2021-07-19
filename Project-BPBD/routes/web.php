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
    return view('welcome');
});
// Route::get('/login', function () {
//     return view('/auth/login');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/data/home', [App\Http\Controllers\AdminController::class, 'indexhome']);
Route::get('/admin/data/history/data-bencana', [App\Http\Controllers\AdminController::class, 'indexdatabencana']);
Route::get('/admin/data/history/data-elemen', [App\Http\Controllers\AdminController::class, 'indexdataelemen']);
Route::get('/admin/data/data-akun', [App\Http\Controllers\AdminController::class, 'indexdataakun']);
Route::get('/detail-bencana', [App\Http\Controllers\AdminController::class, 'indexdetailbencana']);



