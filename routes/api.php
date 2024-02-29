<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Salla\CustomerController;
use App\Http\Controllers\Salla\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login' , [AuthController::class , 'login'])->name('login');
Route::group(['prefix' => 'customers'], function () {
    Route::get('/' , [CustomerController::class , 'index'])->name('index');
    Route::post('/' , [CustomerController::class , 'store'])->name('store');
    Route::get('/{id}' , [CustomerController::class , 'show'])->name('show');
    Route::put('/{id}' , [CustomerController::class , 'update'])->name('update');
    Route::delete('/{id}' , [CustomerController::class , 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/' , [ProductController::class , 'index'])->name('index');
    Route::post('/' , [ProductController::class , 'store'])->name('store');
    Route::get('/{id}' , [ProductController::class , 'show'])->name('show');
    Route::put('/{id}' , [ProductController::class , 'update'])->name('update');
    Route::delete('/{id}' , [ProductController::class , 'destroy'])->name('destroy');
});

