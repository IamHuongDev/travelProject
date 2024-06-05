<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhaHangKhachSansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_hang_khach_sans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('mo_ta_ngan');
            $table->string('mo_ta_chi_tiet');
            $table->string('dia_chi');
            $table->string('so_dien_thoai');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twiter')->nullable();
            $table->string('gio_lam_viec_thu_2');
            $table->string('gio_lam_viec_thu_3');
            $table->string('gio_lam_viec_thu_4');
            $table->string('gio_lam_viec_thu_5');
            $table->string('gio_lam_viec_thu_6');
            $table->string('gio_lam_viec_thu_7');
            $table->string('gio_lam_viec_thu_8');
            $table->string('danh_sach_hinh_anh')->nullable();
            $table->string('video');
            $table->string('muc_gia');
            $table->string('rate');
            $table->string('banner');
            $table->string('slug');
            $table->integer('danh_muc_id');
            $table->text('thuoc_tinh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nha_hang_khach_sans');
    }
}
