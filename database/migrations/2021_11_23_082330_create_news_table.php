<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        //tạo các bài đăng
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->tinyInteger('type_user')->nullable();
            // đối tượng người dùng
            $table->string('type_service')->nullable();
            //nhu cầu
            $table->string('type_house')->nullable();
            //loại nhà
            $table->integer('total_area')->nullable();
            //diện tích đất
            $table->integer('used_area')->nullable();
            //diện tích đất đã sử dụng
            $table->integer('price')->nullable();
            //giá bán
            $table->integer('price_house')->nullable();
            //giá đất
            $table->string('currency')->nullable();
            //đơn vị
            $table->string('price_can_edit')->nullable();
            //thương lượng giá
            $table->string('status_price')->nullable();
            //hiển thị giá
            $table->string('tag')->nullable();
            //thẻ
            $table->string('image')->nullable();
            //ảnh
            $table->string('video')->nullable();
            //video
            $table->integer('user_id')->nullable();
            //id người dùng
            $table->string('name_user')->nullable();
            //ten người dùng
            $table->string('email_user')->nullable();
            //email người dùng
            $table->string('phone_user')->nullable();
            //số điện thoại người dùng
            $table->string('note_user')->nullable();
            //ghi chú người dùng
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->integer('status')->default(0);
            // trạng thái nhà
            $table->tinyInteger('can_meet')->default(0)->nullable();
            //xem trực tiếp
            $table->tinyInteger('can_see_video')->default(0)->nullable();
            //xem qua video
            $table->string('day_meet')->nullable();
            //ngày hẹn gặp
            $table->string('time_meet')->nullable();
            //giờ hẹn gặp
            $table->string('day')->nullable()->nullable();
            //ngày đăng
            //Địa chỉ
            $table->string('city')->index()->nullable();
            $table->string('district')->index()->nullable();
            $table->string('wards')->index()->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }  

    public function down()
    {
         Schema::dropIfExists('news');
    }
}
