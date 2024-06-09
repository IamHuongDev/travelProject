<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateLoaiSanPhamRequest extends FormRequest
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
     * @return array
        */
    public function rules()
    {
        return [
            'ten_loai_san_pham' => 'required|min:2|max:200',
            'is_open' => 'required|boolean',
            'loai_san_pham_id' => 'required',
        ];
    }
}
