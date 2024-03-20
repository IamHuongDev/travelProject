<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'id'        => 'required|exists:categories,id',
            'name'      => 'required|max:100',
            'icon'      => 'required|max:20',
            'type'      => 'required|min:1|max:4',
            'status'    => 'required|boolean',
        ];
    }
}
