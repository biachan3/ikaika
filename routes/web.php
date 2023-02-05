<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;


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


Route::get('/dashboard', function () {
    return view('welcome');
});

Route::prefix('tiket')->name('tiket.')->controller(TiketController::class)->name('tiket.')->group(function () {
    Route::get('', 'index')->name('index');
});


Route::get('/', function () {
    return view('template.dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';
