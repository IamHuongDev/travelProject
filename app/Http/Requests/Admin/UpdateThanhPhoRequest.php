<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateThanhPhoRequest extends FormRequest
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
            'id' => 'required|exists:thanh_phos,id',
            'name' =>'required|unique:thanh_phos,name,' . $this->id,
            'slug' =>'nullable|unique:thanh_phos,slug,' . $this->id,
            'is_open' => 'required|boolean',
        ];
    }
}
