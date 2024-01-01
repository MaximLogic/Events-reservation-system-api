<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:sanctum')->get('/subscribed', 'App\Http\Controllers\EventUserController@index');
Route::middleware('auth:sanctum')->post('/subscribe', 'App\Http\Controllers\EventUserController@store');

//Event Routes
Route::group(['namespace' => 'App\Http\Controllers\Event'], function() {
    Route::get('/events', 'IndexController');
    Route::get('/events/{event}', 'ShowController')->whereNumber('event');
    Route::group(['middleware' => ['auth:sanctum', 'admin.acces']], function() {
        Route::post('/events', 'StoreController');
        Route::put('/events/{event}', 'UpdateController')->whereNumber('event');
        Route::delete('/events/{event}', 'DestroyController')->whereNumber('event');
    });
})->middleware('api');

Route::get('sanct', function(){
    return "Hello";
})->middleware('auth:sanctum');

Route::get('/testadmin', function()
{
    return 'test';
})->middleware(['auth:sanctum', 'admin.acces']);
