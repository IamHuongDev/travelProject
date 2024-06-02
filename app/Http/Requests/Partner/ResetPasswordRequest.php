<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'hash' => 'required',
            'password' => 'required|min:8',
            're_password' => 'required|min:8|same:password'
        ];
    }

    public function messages ()
    {
        return [
            'required' => ':attribute không được để trống ',
            'min'  => ':attribute chỉ từ 8 đến 30 ký tự ',
        ];
    }

    public function attributes()
    {
        return [
            'hash'  => 'Mã hash',
            'password' => 'Mật khẩu' ,
            're_password' => 'Nhập lại mật khẩu' ,
        ];
    }
}
