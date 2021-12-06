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
// Route::prefix('auth')->group(function () {
    // Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');
    // Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');
    // Route::post('/logout', 'App\Http\Controllers\Api\AuthController@logout');
    // Route::post('/refresh', 'AuthController@refresh');
    // Route::post('/me', 'AuthController@me');
// });

//Users
// Route::middleware('apiJWT')->group(function () {
//     Route::prefix('auth')->group(function () {
//         Route::get('auth/users', 'App\Http\Controllers\Api\UserController@index');
//     });
// });

//Customer
// Route::middleware('apiJWT')->group(function () {
//     Route::prefix('Customer')->group(function () {
//         Route::get(     '/',        'App\Http\Controllers\CustomerController@index');
//         Route::get(     '/{id}',    'App\Http\Controllers\CustomerController@getCustomerById');
//         Route::post(    '/',        'App\Http\Controllers\CustomerController@postCustomer');
//         Route::patch(   '/{id}',    'App\Http\Controllers\CustomerController@updateCustomer');
//         Route::delete(  '/{id}',    'App\Http\Controllers\CustomerController@deleteCustomer');
//     });
// });


//Mark
// Route::middleware('apiJWT')->group(function () {
//     Route::prefix('Mark')->group(function () {
//         Route::get(     '/',        'App\Http\Controllers\MarkController@index');
//         Route::get(     '/{id}',    'App\Http\Controllers\MarkController@getMarkById');
//         Route::post(    '/',        'App\Http\Controllers\MarkController@postMark');
//         Route::patch(   '/{id}',    'App\Http\Controllers\MarkController@updateMark');
//         Route::delete(  '/{id}',    'App\Http\Controllers\MarkController@deleteMark');
//     });
// });

//Model
// Route::middleware('apiJWT')->group(function () {
//     Route::prefix('Model')->group(function () {
//         Route::get(     '/',        'App\Http\Controllers\ModelController@index');
//         Route::get(     '/{id}',    'App\Http\Controllers\ModelController@getModelById');
//         Route::post(    '/',        'App\Http\Controllers\ModelController@postModel');
//         Route::patch(   '/{id}',    'App\Http\Controllers\ModelController@updateModel');
//         Route::delete(  '/{id}',    'App\Http\Controllers\ModelController@deleteModel');
//     });
// });

//Producer
// Route::middleware('apiJWT')->group(function () {
//     Route::prefix('Producer')->group(function () {
//         Route::get(     '/',        'App\Http\Controllers\ProducerController@index');
//         Route::get(     '/{id}',    'App\Http\Controllers\ProducerController@getProducerById');
//         Route::post(    '/',        'App\Http\Controllers\ProducerController@postProducer');
//         Route::patch(   '/{id}',    'App\Http\Controllers\ProducerController@updateProducer');
//         Route::delete(  '/{id}',    'App\Http\Controllers\ProducerController@deleteProducer');
//     });
// });

//Part
// Route::middleware('apiJWT')->group(function () {
//     Route::prefix('Part')->group(function () {
//         Route::get(     '/',        'App\Http\Controllers\PartController@index');
//         Route::get(     '/{id}',    'App\Http\Controllers\PartController@getPartById');
//         Route::post(    '/',        'App\Http\Controllers\PartController@postPart');
//         Route::patch(   '/{id}',    'App\Http\Controllers\PartController@updatePart');
//         Route::delete(  '/{id}',    'App\Http\Controllers\PartController@deletePart');
//     });
// });

//ServiceOrder
// Route::middleware('apiJWT')->group(function () {
//     Route::prefix('ServiceOrder')->group(function () {
//         Route::get(     '/',        'App\Http\Controllers\ServiceOrderController@index');
//         Route::get(     '/{id}',    'App\Http\Controllers\ServiceOrderController@getServiceOrderById');
//         Route::post(    '/',        'App\Http\Controllers\ServiceOrderController@postServiceOrder');
//         Route::patch(   '/{id}',    'App\Http\Controllers\ServiceOrderController@updateServiceOrder');
//         Route::delete(  '/{id}',    'App\Http\Controllers\ServiceOrderController@deleteServiceOrder');
//     });
// });
