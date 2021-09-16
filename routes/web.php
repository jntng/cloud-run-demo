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

//Route::get('/', ['App\Http\Controllers\HomeController','index']);

Route::get('/send', ['App\Http\Controllers\HomeController','send']);

Route::get('/codewar/{id}/{input}', 'App\Http\Controllers\CodeWarController');

//Route::prefix('/payment')->name('payment.')->group(function() {
////發起付款
//    Route::get('/request', [\App\Http\Controllers\PaymentController::class, 'request'])->name('request');
////接受通知
//    Route::post('/notify', [\App\Http\Controllers\PaymentController::class, 'notify'])->name('notify');
////通知使用者完成
//    Route::post('/result', [\App\Http\Controllers\PaymentController::class, 'result'])->name('result');
//});

//Payment

//payment form
Route::get('/', 'App\Http\Controllers\NewPaymentController@index')->name("/");
Route::get('/success', 'App\Http\Controllers\NewPaymentController@success')->name("/success");

Route::prefix('/payment')->group(function() {

    Route::get('/', ['as' => 'payment', 'uses' => 'App\Http\Controllers\NewPaymentController@payWithpaypal']);
    Route::any('/status', ['as' => 'status', 'uses' => 'App\Http\Controllers\NewPaymentController@getPaymentStatus']);

});
