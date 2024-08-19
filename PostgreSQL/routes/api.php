<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * @OA\Info(
 *     title="Laravel API Documentation",
 *     version="1.0.0",
 *     description="API documentation for Laravel project",
 *     @OA\Contact(
 *         email="your-email@example.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
/**
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     required={"name", "price", "thumb"},
 *     @OA\Property(property="name", type="string", example="Product Name"),
 *     @OA\Property(property="price", type="number", format="float", example=29.99),
 *     @OA\Property(property="thumb", type="string", example="/images/product-thumb.jpg")
 * )
 */
Route::get('add', [ProductController::class, 'create']);
Route::post('add', [ProductController::class, 'store']);
Route::get('list', [ProductController::class, 'index']);
Route::get('edit/{id}', [ProductController::class, 'show'])->name('edit');
Route::put('edit/{id}', [ProductController::class, 'update']);
Route::delete('destroy', [ProductController::class, 'destroy']);
Route::post('upload/services', [UploadController::class, 'store']);