<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\EventController;

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

Route::prefix('ticket')->name('ticket.')->controller(TicketController::class)->name('ticket.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('register/{id}', 'order')->name("order");
    Route::get('order/', 'create')->name("create");
    Route::post('store', 'store')->name('store');
});
Route::get('/event', 'App\Http\Controllers\EventController@index')->name('event.index');

Route::get('/', function () {
    return view('template.dashboard');
})->name('dashboard');
Route::get('/admin', function () {
    return view('admin.tiket.index');
})->name('admindash');

require __DIR__ . '/auth.php';