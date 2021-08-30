<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpusController;

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

Route::get('/info', function () {
    return view('info');
});

Route::get('/', [PerpusController::class, 'first']);

Route::get('/table', [PerpusController::class, 'table']);

Route::get('/tambah', [PerpusController::class, 'tambah']);

Route::get('/simpan', [PerpusController::class, 'simpan']);

Route::get('/edit/{id}', [PerpusController::class, 'edit']);

Route::put('/update/{id}', [PerpusController::class, 'update']);

Route::get('/hapus/{id}', [PerpusController::class, 'hapus']);

Route::get('/dashboard', [PerpusController::class, 'dashboard']);

Route::get('/login', [PerpusController::class, 'login']);

Route::get('/logout', [PerpusController::class, 'logout']);
