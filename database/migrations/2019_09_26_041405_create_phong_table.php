<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nhanghi_id');
            $table->foreign('nhanghi_id')->references('id')->on('nhanghi');
            $table->string('tenphong');
            $table->integer('chieudai');
            $table->integer('chieurong');
            $table->string('hinhanh');
            $table->integer('trangthai')->comment('0>Phòng trống,1>Đã thanh toán,2>Chưa thanh toán');;
            $table->integer('dongia');
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
        Schema::dropIfExists('phong');
    }
}
