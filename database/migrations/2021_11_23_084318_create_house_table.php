<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseTable extends Migration
{
    public function up()
    {
        // thông tin nhà
        Schema::create('house', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('front')->default(0);
            //Số mặt tiền
            $table->bigInteger('deep')->default(0);
            //Chiều sâu
            $table->tinyInteger('type_house')->nullable();
            //Loại hình nhà ở
            $table->tinyInteger('type_street')->nullable();
            //Loại đường bên ngoài nha
            $table->string('direction')->nullable();
            //Hướng nhà
            $table->string('total_floor')->default(0);
            //Tổng số tầng
            $table->bigInteger('floor')->default(0);
            //Số tầng
            $table->bigInteger('total_path_room')->default(0);
            //Số phòng tắm
            $table->bigInteger('total_kitchen_room')->default(0);
            //Số phòng bếp
            $table->bigInteger('type_legal_paperwork')->nullable();
            //Loại giấy tờ
            $table->string('level_transaction')->nullable();
            //Mức độ giao dịch
            $table->string('highlights')->nullable();
            //Đặc điểm nổi bật
            $table->tinyInteger('agency')->default(0);
            //qua môi giới 0 : không, 1: có
            $table->bigInteger('commission')->nullable();
            //Hoa hồng
            $table->timestamps();
        });
    }

    public function down()
    {
         Schema::dropIfExists('house');
    }
}
