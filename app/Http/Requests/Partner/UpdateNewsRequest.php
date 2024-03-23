<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'id'                => 'required|exists:news,id',
            'tieuDe'            => 'required|max:100',
            'hinhAnh'           => 'required',
            'tomTat'            => 'required:max:1000',
            'noiDung'           => 'required',
            'chuyenMuc'         => 'required|min:1|max:3',
            'is_open'           => 'required|boolean',
        ];
    }
}
