<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});
Route::get('add',[ProductController::class, 'create']);
Route::post('add',[ProductController::class, 'store']);
Route::get('list',[ProductController::class, 'index']);
Route::get('edit/{id}',[ProductController::class, 'show'])->name('edit');
Route::put('edit/{id}',[ProductController::class, 'update']);
Route::DELETE('destroy',[ProductController::class, 'destroy']);
Route::post('upload/services',[UploadController::class,'store']);