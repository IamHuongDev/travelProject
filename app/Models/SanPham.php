<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'san_phams';

    protected $fillable = [
        'ten_san_pham',
        'slug_ten_san_pham',
        'anh_dai_dien',
        'anh_san_pham',
        'mo_ta_ngan',
        'mo_ta_chi_tiet',
        'is_open',
        'gia_ban',
        'gia_khuyen_mai',
        'loai_san_pham_id',
    ];
}
