<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/show', [HomeController::class, 'show'])->name('show');


Route::group(['prefix' => 'sales'], function () {
    Route::get('/', [SalesController::class, 'index'])->name('sales.index');
    Route::post('/upload', [SalesController::class, 'upload'])->name('sales.upload');
    Route::get('/batch/{id}', [SalesController::class, 'batch'])->name('batch');
    Route::get('/batch-in-progress', [SalesController::class, 'batchInProgress'])->name('batch.in-progress');
    Route::get('/batch-progress/{id}', [SalesController::class, 'batchProgress'])->name('batch.progress');

    //Route::get('start', [SalesController::class, 'checkQueueWorkerStatus']);
});
