<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::group(['prefix'=>'products'], function(){
    Route::get('/', [
                App\Http\Controllers\ProductsController::class,
                'index'
            ]);
    Route::get('/{id}', [
                App\Http\Controllers\ProductsController::class,
                'show'
            ]);
    Route::post('/store', [
                App\Http\Controllers\ProductsController::class,
                'store'
            ]);
    Route::put('/update/{id}', [
                App\Http\Controllers\ProductsController::class,
                'update'
            ]);
    Route::delete('/delete/{id}', [
                App\Http\Controllers\ProductsController::class,
                'destroy'
            ]);

});

Route::group(['prefix'=>'sales'], function(){
    Route::post('store', [
        App\Http\Controllers\SalesController::class, 'store'
    ]);
    Route::get('/', [
                App\Http\Controllers\SalesController::class,
                'index'
            ]);
    Route::get('/{id}', [
                App\Http\Controllers\SalesController::class,
                'show'
            ]);
    Route::put('/update/{id}', [
                App\Http\Controllers\SalesController::class,
                'update'
            ]);
    Route::delete('/delete/{id}', [
                App\Http\Controllers\SalesController::class,
                'destroy'
            ]);

});
Route::get('test', function(){
    return App\Models\ProductsModel::with('sales')->get();
});