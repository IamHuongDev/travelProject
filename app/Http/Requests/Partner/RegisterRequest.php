<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'full_name' => 'required' ,
            'email' => 'required|email|unique:partners,email' ,
            'password' => 'required|min:8|max:30' ,
            're_password' => 'required|min:8|max:30|same:password' ,
            'dob' => 'required|date' ,
            'phone' => 'required|digits:10' ,
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages ()
    {
        return [
            'required' => ':attribute không được để trống ',
            'digits' => ':attribute chỉ được 10 số ',
            'min'  => ':attribute chỉ từ 8 đến 30 ký tự ',
            'max'   => ':attribute chỉ từ 8 đến 30 ký tự ',
            'email'   => ':attribute phải là email',
            'date'  => ':attribute phải là kiểu ngày tháng năm',
            'unique'  => ':attribute đã tồn tại',
            'captcha' => ':attribute yêu cầu phải chọn',
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => 'Họ và tên' ,
            'email' => 'Email' ,
            'password' => 'Mật khẩu' ,
            're_password' => 'Nhập lại mật khẩu' ,
            'dob' => 'Ngày sinh' ,
            'phone' => 'Số điện thoại' ,
            'g-recaptcha-response' => 'Mã captcha'
        ];
    }
}
