<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateNhaHangKhachSanRequest extends FormRequest
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
            'name' => 'required',
            'mo_ta_ngan' => 'required',
            'mo_ta_chi_tiet' => 'required',
            'dia_chi' => 'required',
            'so_dien_thoai' => 'required',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twiter' => 'nullable|url',
            'gio_lam_viec_thu_2' => 'required',
            'gio_lam_viec_thu_3' => 'required',
            'gio_lam_viec_thu_4' => 'required',
            'gio_lam_viec_thu_5' => 'required',
            'gio_lam_viec_thu_6' => 'required',
            'gio_lam_viec_thu_7' => 'required',
            'gio_lam_viec_thu_8' => 'required',
            'danh_sach_hinh_anh' => '',
            'video' => 'required',
            'muc_gia' => 'required|numeric|min:1|max:10',
            'rate' => 'required|numeric|min:1|max:10',
            'banner' => 'required',
            'slug' => '',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
            'thuoc_tinh' => 'required',
        ];
    }


}
