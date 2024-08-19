<?php
 
namespace App\Http\Services;


use Illuminate\Support\Facades\Storage;

class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                // Lấy tên tệp gốc
                $name = $request->file('file')->getClientOriginalName();
                // Tạo đường dẫn đầy đủ
                $pathFull = 'uploads/' . date("Y/m/d");

                // Kiểm tra và tạo thư mục nếu chưa tồn tại
                if (!Storage::exists('public/' . $pathFull)) {
                    Storage::makeDirectory('public/' . $pathFull);
                }

                // Lưu tệp vào thư mục storage
                $request->file('file')->storeAs('public/' . $pathFull, $name);
                // Trả về đường dẫn tệp đã upload
                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
        return "loi upload";
    }
}