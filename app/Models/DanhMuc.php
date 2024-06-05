<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;

    protected $table = 'danh_mucs';

    protected $fillable = [
        'name',
        'slug',
        'is_open',
        'loai_danh_muc',
        'thanh_pho_id',
    ];

    public function tenThanhPho(){
        return $this->belongsTo('\App\Models\thanhPho', 'thanh_pho_id', 'id');
    }
}
