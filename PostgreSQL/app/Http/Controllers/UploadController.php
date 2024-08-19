<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UploadService;

class UploadController extends Controller
{
    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function store(Request $request)
    {
    
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = $file->store('public/images');
                $url = asset('storage/' . str_replace('public/', '', $path));
    
                return response()->json(['error' => false, 'url' => $url]);
            }
    
            return response()->json(['error' => true, 'message' => 'Upload file lỗi']);
        
    }
    
}


