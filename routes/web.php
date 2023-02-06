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
});
Route::get('/event', 'App\Http\Controllers\EventController@index')->name('event.index');
Route::get('/ticket/register/{id}', 'TicketController@order')->name("ticket.order");
Route::put('/ticket/register/set/', 'TicketController@create')->name("ticket.create");
Route::get('/', function () {
    return view('template.dashboard');
})->name('dashboard');

require __DIR__ . '/auth.php';