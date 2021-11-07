<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Auth
Route::post('auth/login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('auth/register', 'App\Http\Controllers\Api\AuthController@register');
Route::post('auth/logout', 'App\Http\Controllers\Api\AuthController@logout');
Route::post('auth/refresh', 'AuthController@refresh');
Route::post('auth/me', 'AuthController@me');

//Users
Route::get('auth/users', 'App\Http\Controllers\Api\UserController@index');

//Customer
Route::get('/Customer', 'App\Http\Controllers\CustomerController@index');
Route::get('/Customer/{id}', 'App\Http\Controllers\CustomerController@getCustomerById');
Route::post('/Customer/insertCustomer', 'App\Http\Controllers\CustomerController@postCustomer');
Route::patch('/Customer/updateCustomer/{id}', 'App\Http\Controllers\CustomerController@updateCustomer');
Route::delete('/Customer/deleteCustomer/{id}', 'App\Http\Controllers\CustomerController@deleteCustomer');
//Mark
Route::get('/Mark', 'App\Http\Controllers\MarkController@index');
Route::get('/Mark/{id}', 'App\Http\Controllers\MarkController@getMarkById');
Route::post('/Mark/insertMark', 'App\Http\Controllers\MarkController@postMark');
Route::patch('/Mark/updateMark/{id}', 'App\Http\Controllers\MarkController@updateMark');
Route::delete('/Mark/deleteMark/{id}', 'App\Http\Controllers\MarkController@deleteMark');
//Model
Route::get('/Model', 'App\Http\Controllers\ModelController@index');
Route::get('/Model/{id}', 'App\Http\Controllers\ModelController@getModelById');
Route::post('/Model/insertModel', 'App\Http\Controllers\ModelController@postModel');
Route::patch('/Model/updateModel/{id}', 'App\Http\Controllers\ModelController@updateModel');
Route::delete('/Model/deleteModel/{id}', 'App\Http\Controllers\ModelController@deleteModel');
//Producer
Route::get(     '/Producer',        'App\Http\Controllers\ProducerController@index');
Route::get(     '/Producer/{id}',   'App\Http\Controllers\ProducerController@getProducerById');
Route::post(    '/Producer',        'App\Http\Controllers\ProducerController@postProducer');
Route::patch(   '/Producer/{id}',   'App\Http\Controllers\ProducerController@updateProducer');
Route::delete(  '/Producer/{id}',   'App\Http\Controllers\ProducerController@deleteProducer');
//Part
Route::get(     '/Part',             'App\Http\Controllers\PartController@index')->middleware('apiJWT');
Route::get(     '/Part/{id}',        'App\Http\Controllers\PartController@getPartById');
Route::post(    '/Part',             'App\Http\Controllers\PartController@postPart');
Route::patch(   '/Part/{id}',        'App\Http\Controllers\PartController@updatePart');
Route::delete(  '/Part/{id}',        'App\Http\Controllers\PartController@deletePart');
//ServiceOrder
Route::get(     '/ServiceOrder',        'App\Http\Controllers\ServiceOrderController@index')->middleware('apiJWT');
Route::get(     '/ServiceOrder/{id}',   'App\Http\Controllers\ServiceOrderController@getServiceOrderById');
Route::post(    '/ServiceOrder',        'App\Http\Controllers\ServiceOrderController@postServiceOrder');
Route::patch(   '/ServiceOrder/{id}',   'App\Http\Controllers\ServiceOrderController@updateServiceOrder');
Route::delete(  '/ServiceOrder/{id}',   'App\Http\Controllers\ServiceOrderController@deleteServiceOrder');

