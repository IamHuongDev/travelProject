<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhMucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_mucs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('is_open')->comment('1: Hiển thị, 0: Không hiển thị');
            $table->integer('loai_danh_muc')->comment('1: Nhà Hàng, 2: Shopping, 3: Hotels, 4: Địa điểm');
            $table->integer('thanh_pho_id');
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
        Schema::dropIfExists('danh_mucs');
    }
}
