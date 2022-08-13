<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Events;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// events routes
Route::group(['middleware' => 'api','prefix' => 'v1'], function ($router) {
    Route::get('/events',[Events::class, 'list']);
    Route::get('/active-events',[Events::class, 'getActiveEvents']);
    Route::post('/events',[Events::class, 'create']);
    Route::get('/events/{id}',[Events::class, 'getEvent']);
    Route::post('/events/{id}',[Events::class, 'updateEvent']);
    Route::delete('/events/{id}',[Events::class, 'delete']);
});



