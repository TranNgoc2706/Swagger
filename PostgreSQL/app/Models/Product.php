<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     required={"name", "price", "thumb"},
 *     @OA\Property(property="name", type="string", example=" Name"),
 *     @OA\Property(property="price", type="number", format="float", example=29.99),
 *     @OA\Property(property="thumb", type="string", example="/images/product-thumb.jpg")
 * )
 */

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'thumb',
    ];
}
/**
 * @OA\Schema(
 *     schema="PaginatedProductResponse",
 *     type="object",
 *     @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Product")),
 *     @OA\Property(property="current_page", type="integer"),
 *     @OA\Property(property="total_pages", type="integer"),
 *     @OA\Property(property="total_items", type="integer")
 * )
 */