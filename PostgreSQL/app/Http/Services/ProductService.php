<?php
namespace App\Http\Services;

use App\Http\Requests\Product\CreateFormRequest;
use App\Models\Product;
use App\Http\Services\UploadService;


class ProductService{

    public function insert( $request)
    {
        try{
            $existingProduct = Product::where('name', $request->input('name'))->first();
            if ($existingProduct) {
                $request->session()->flash('error', 'sản phẩm đã tồn tại');
                return false;
            }

            Product::create($request->all());
            $request->session()->flash('success', 'san pham thanh cong');
        } catch (\Exception $err) {
            $request->session()->flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function get()
    {
        return Product::all()->paginate(5);
    }
    public function update($request, $product)
    {
        try {
            // Xử lý tệp tải lên nếu có
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('uploads', $filename, 'public');
                $product->thumb = $path;
            }

            $product->fill($request->except('upload'));
            $product->save();

            $request->session()->flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            $request->session()->flash('error', 'Cập nhật thất bại: ' . $err->getMessage());
            return false;
        }

        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id',$request->input('id'))->first();
        if($request){
            $product->delete();
            return true;
        }
        return false;
    }
}