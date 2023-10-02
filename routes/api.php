<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Event Routes
Route::controller(EventController::class)->group(function() {
    Route::get('/events', 'index');
    Route::get('/events/{event}', 'show')->whereNumber('event');
    Route::post('/events', 'store');
    Route::put('/events/{event}', 'update')->whereNumber('event');
    Route::delete('/events/{event}', 'destroy')->whereNumber('event');
});
