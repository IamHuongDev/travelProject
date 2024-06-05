<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateDanhMucRequest extends FormRequest
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
            'name' => 'required|unique:danh_mucs,name',
            'slug' =>'nullable|unique:danh_mucs,slug',
            'is_open' => 'required|boolean',
            'loai_danh_muc' => 'required|min:1|max:4',
            'thanh_pho_id' => 'required|exists:thanh_phos,id',
        ];
    }
}
