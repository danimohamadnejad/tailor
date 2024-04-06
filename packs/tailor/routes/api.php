<?php
use Illuminate\Support\Facades\Route;
use Dani\Tailor\Http\Controllers\OrderController;

Route::group(['prefix'=>'orders', 'as'=>'orders.'], function(){
    Route::post('', [OrderController::class, 'store'])->name('store');
});