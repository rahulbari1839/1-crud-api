<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Events;
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


// events routes
 Route::get('/events/',[Events::class, 'manageEventsList']);
 Route::get('/events/create',[Events::class, 'addEventForm']);
 Route::get('/events/delete/{id}',[Events::class, 'deleteEvent']);
 Route::post('/events/create',[Events::class, 'addEvent']);

