<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->string('slug_ten_san_pham');
            $table->string('anh_dai_dien');
            $table->string('anh_san_pham');
            $table->text('mo_ta_ngan');
            $table->text('mo_ta_chi_tiet');
            $table->integer('is_open')->default(1);
            $table->double('gia_ban');
            $table->double('gia_khuyen_mai')->nullable();
            $table->integer('loai_san_pham_id');
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
        Schema::dropIfExists('san_phams');
    }
}
