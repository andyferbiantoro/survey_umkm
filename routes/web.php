<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\AdminController;

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
//     return view('welcome');
// });


Route::get('/', [UmkmController::class, 'index'])->name('index');


Route::post('/add_umkm', [UmkmController::class, 'add_umkm'])->name('add_umkm');



//admin


Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

Route::get('/admin_detail_umkm/{id}', [AdminController::class, 'admin_detail_umkm'])->name('admin_detail_umkm');
Route::post('/admin_delete_umkm/{id}', [AdminController::class, 'admin_delete_umkm'])->name('admin_delete_umkm');
Route::post('/admin_update_umkm/{id}', [AdminController::class, 'admin_update_umkm'])->name('admin_update_umkm');



Route::get('/admin_export', [AdminController::class, 'admin_export'])->name('admin_export');