<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerTicketController;


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

// Route::get('/', function () {
//     return view('user.index');
// })->name('dashboard');
Route::get('/', [HomeController::class, 'index'])->name('dashboard');

// Route::middleware('auth')->group(function () {

    Route::prefix('ticket')->name('ticket.')->controller(TicketController::class)->name('ticket.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('register/{id}', 'order')->name("order");
        Route::get('order/', 'create')->name("create");

        Route::post('buy', 'store')->name('store');
        Route::get('buy', 'store1')->name('store1');
    }
    );

    Route::prefix('admin')->name('admin.')->controller(AdminController::class)->name('admin.')->group(
        function () {
            Route::get('', 'index')->name('index');
            Route::get('/detail/{id}', 'show')->name('detail');
        }
    );
    Route::get('/event', 'App\Http\Controllers\EventController@index')->name('event.index');

    Route::get('/payment', 'App\Http\Controllers\PaymentController@index')->name('payment.index');
    Route::post('/payment/ping', 'App\Http\Controllers\PaymentController@ping')->name('payment.ping');
    Route::get('/scanner', 'App\Http\Controllers\ScanController@index')->name('scanner.index');
    Route::get('/qr/{id}', 'App\Http\Controllers\ScanController@generateQR')->name('qrgenerate');
// });

Route::prefix('ticket')->name('ticket.')->controller(TicketController::class)->name('ticket.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('register/{id}', 'order')->name("order");
    Route::get('order/', 'create')->name("create");
    Route::post('store', 'store')->name('store');
}
);


Route::prefix('user')->group(function () {
    Route::get('/order', [App\Http\Controllers\TicketController::class, 'index_user'])->name('user.index');
    Route::post('/regis', [App\Http\Controllers\TicketController::class, 'regis'])->name('regis');
});
Route::get('/support', [CustomerTicketController::class, 'index'])->name('support.index');
Route::post('/tickets/create', [CustomerTicketController::class, 'createTicket'])->name('ticket.create');

Route::prefix('admin')->name('admin.')->controller(AdminController::class)->name('admin.')->group(
    function () {
        Route::get('', 'index')->name('index');
        Route::get('/detail/{id}', 'show')->name('detail');
    }
);
Route::get('/event', 'App\Http\Controllers\EventController@index')->name('event.index');

Route::get('/payment', 'App\Http\Controllers\PaymentController@index')->name('payment.index');
Route::post('/payment/ping', 'App\Http\Controllers\PaymentController@ping')->name('payment.ping');
Route::get('/scanner', 'App\Http\Controllers\ScanController@index')->name('scanner.index');
Route::get('/qr/{id}', 'App\Http\Controllers\ScanController@generateQR')->name('qrgenerate');


// Route::get('/admin', function () {
//     return view('admin.tiket.index');
// })->name('admindash');

require __DIR__ . '/auth.php';
