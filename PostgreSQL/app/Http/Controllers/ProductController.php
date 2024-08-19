<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFromRequest;
use Illuminate\Http\Request;    
use App\Http\Services\ProductService;
use App\Models\Product;

/**
 * @OA\Info(
 *     title="Laravel API Documentation",
 *     version="1.0.0",
 *     description="This is the API documentation for my Laravel project.",
 *     @OA\Contact(
 *         email="contact@example.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
class ProductController extends Controller
{
    protected $ProductService;
    public function __construct(ProductService $ProductService )
    {
        $this->ProductService = $ProductService;
    }

     /**
     * @OA\Get(
     *     path="/list",
     *     tags={"Products"},
     *     summary="Get the list of all products",
     *     @OA\Response(
     *         response=200,
     *         description="A list of products",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Product")
     *         )
     *     )
     * )
     */
    public function index()
    {
         $products =  $this->ProductService->get();
        return view('list',[
            'title'=>'danh sach san pham',
            'products'=>$products,
        ]);
    }


      /**
     * @OA\Get(
     *     path="/add",
     *     tags={"Products"},
     *     summary="Show form to add a new product",
     *     @OA\Response(
     *         response=200,
     *         description="Display add product form"
     *     )
     * )
     */
    public function create()
    {
        
        $products =  $this->ProductService->get();
        return view('add', [
            'title' => 'them san pham moi ',
            'products'=> $products,
        ]);
    }

     /**
     * @OA\Post(
     *     path="/add",
     *     tags={"Products"},
     *     summary="Store a new product",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name", "price", "thumb"},
     *             @OA\Property(property="name", type="string", example="Product Name"),
     *             @OA\Property(property="price", type="number", format="float", example=29.99),
     *             @OA\Property(property="thumb", type="string", example="/images/product-thumb.jpg")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product created successfully"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input"
     *     )
     * )
     */
    public function store(CreateFromRequest $request )
    {
        $this->ProductService->insert($request);
        return redirect()->back();
    }
     /**
     * @OA\Get(
     *     path="/edit/{id}",
     *     tags={"Products"},
     *     summary="Show form to edit a product",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the product to edit",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Display edit product form"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     )
     * )
     */
    public function show(Product $product )
    {
        return view('edit',[
            'title'=>'chinh sua sản phẩm: '.$product->name,
            'product'=>$product,
        ]);
    }

     /**
     * @OA\Put(
     *     path="/edit/{id}",
     *     tags={"Products"},
     *     summary="Update a product",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the product to update",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name", "price", "thumb"},
     *             @OA\Property(property="name", type="string", example="Updated Product Name"),
     *             @OA\Property(property="price", type="number", format="float", example=39.99),
     *             @OA\Property(property="thumb", type="string", example="/images/updated-thumb.jpg")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     )
     * )
     */
    public function update(Request $request, Product $product)
    {
        $this->ProductService->update($request, $product);
        return redirect()->route('edit', ['id' => $product->id])->with('success', 'Cập nhật thành công');
    }

     /**
     * @OA\Delete(
     *     path="/destroy",
     *     tags={"Products"},
     *     summary="Delete a product",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     )
     * )
     */
    public function destroy(Request $request)
    {
        $result = $this->ProductService->delete($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message' => 'xoa thanh cong'
            ]);
        }
        return response()->json([
            'error'=>true]);
    }
}
