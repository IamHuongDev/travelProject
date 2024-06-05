<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaHangKhachSan extends Model
{
    use HasFactory;

    protected $table = 'nha_hang_khach_sans';

    protected $fillable = [
        'name',
        'mo_ta_ngan',
        'mo_ta_chi_tiet',
        'dia_chi',
        'so_dien_thoai',
        'email',
        'website',
        'facebook',
        'instagram',
        'twiter',
        'gio_lam_viec_thu_2',
        'gio_lam_viec_thu_3',
        'gio_lam_viec_thu_4',
        'gio_lam_viec_thu_5',
        'gio_lam_viec_thu_6',
        'gio_lam_viec_thu_7',
        'gio_lam_viec_thu_8',
        'danh_sach_hinh_anh',
        'video',
        'muc_gia',
        'rate',
        'banner',
        'slug',
        'danh_muc_id',
        'thuoc_tinh',
    ];
}
