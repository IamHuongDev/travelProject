<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('tieuDe');
            $table->string('slug');
            $table->string('hinhAnh');
            $table->longText('tomTat');
            $table->longText('noiDung');
            $table->integer('chuyenMuc')->comment('1: Địa điểm, 2: Giới thiệu, 3: Quảng cáo');
            $table->integer('is_open');
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
        Schema::dropIfExists('news');
    }
}
