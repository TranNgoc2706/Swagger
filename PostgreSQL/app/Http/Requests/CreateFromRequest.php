<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFromRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            'name'=>'required',
            'thumb'=>'required',
        ];
    }
    public function messages():array
    {
        return[
            'name.required'=>'vui long nhap ten san phẩm',
            'thumb.required'=>'hình ảnh không được trống'
        ];
    }
}
