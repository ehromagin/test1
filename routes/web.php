<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkersController;

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

Route::get('/workers', [WorkersController::class, 'allData'])->name('workers');

Route::post('/workers/submit', [WorkersController::class, 'submit'])->name('contact-form');

Route::get('/get-worker', [WorkersController::class, 'getWorker'])->name('get-worker');

Route::delete('/workers', [WorkersController::class, 'delete'])->name('worker.delete');
