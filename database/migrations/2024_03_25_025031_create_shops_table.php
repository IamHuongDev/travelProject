<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('tenShop');
            $table->string('diaChi');
            $table->string('soDienThoai');
            $table->string('email');
            $table->string('password');
            $table->integer('is_block');
            $table->string('tenChuShop');
            $table->date('ngaySinh');
            $table->string('gioMoCuaThu2');
            $table->string('gioMoCuaThu3');
            $table->string('gioMoCuaThu4');
            $table->string('gioMoCuaThu5');
            $table->string('gioMoCuaThu6');
            $table->string('gioMoCuaThu7');
            $table->string('gioMoCuaThu8');
            $table->integer('soSao');
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
        Schema::dropIfExists('shops');
    }
}
