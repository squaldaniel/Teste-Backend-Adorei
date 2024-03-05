<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return ["api"=>"data"];
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

});