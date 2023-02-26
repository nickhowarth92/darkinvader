<?php

use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\TicketController;

//Dependencies
use Inertia\Inertia;

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

Route::get('/', [TicketController::class, 'stats']);
Route::get('/tickets/open', [TicketController::class, 'open']);
Route::get('/tickets/closed', [TicketController::class, 'closed']);
Route::get('/users/{email}/tickets', [TicketController::class, 'user']);
Route::get('/tickets/{id}', [TicketController::class, 'show']);

Route::any('{catchall}', function () {
    return Inertia::render('404');
})->where('catchall', '.*');