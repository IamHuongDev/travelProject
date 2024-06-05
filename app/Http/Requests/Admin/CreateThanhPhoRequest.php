<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateThanhPhoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' =>'required|unique:thanh_phos,name',
            'slug' =>'nullable|unique:thanh_phos,slug',
            'is_open' => 'required|boolean',
        ];
    }


}
