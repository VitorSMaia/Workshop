<?php

use Illuminate\Support\Facades\Route;


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

//  Route::get('/home', function () {
//     return view('home');
//  });

 Route::get('/serviceorder', [App\Http\Controllers\ServiceOrderController::class, 'index'])->name('serviceorder');
 Route::get('/model', [App\Http\Controllers\ModelController::class, 'index'])->name('model');
 Route::get('/mark', [App\Http\Controllers\MarkController::class, 'index'])->name('mark');
 Route::post('/mark', [App\Http\Controllers\MarkController::class, 'postMark']);
 Route::get('/mark/all', [App\Http\Controllers\MarkController::class, 'listMarks']);

//  Route::get('/viewlogin','App\Http\Controllers\Auth\AuthController@viewlogin');


// Auth

    // Route::get('/viewlogin',    'App\Http\Controllers\Auth\AuthController@viewlogin');
    // Route::post('/login',       'App\Http\Controllers\Auth\AuthController@login')->name('login');
    // Route::get('/viewregister', 'App\Http\Controllers\Auth\AuthController@viewregister');
    // Route::post('/register',    'App\Http\Controllers\Auth\AuthController@register')->name('register');
    // Route::post('/logout',      'App\Http\Controllers\Auth\AuthController@logout');









// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
