<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageNewsTable extends Migration
{
    public function up()
    {
        // liên kết gói và bài đăng kèm theo thời gian đăng bài theo gói
        Schema::create('package_news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('news_id')->nullable();
            //id bài đăng
            $table->bigInteger('package_id')->nullable();
            //id gói tin
            $table->string('package_id_later')->nullable();
            //id gói tin cho lần đăng sau
            $table->string('time_post_news')->nullable();
            //thời gian đăng bài
            $table->string('post_news_start')->nullable();
            //bắt đầu ngày đăng bài
            $table->string('post_news_end')->nullable();
            //kết thúc ngày đăng bài
            $table->string('auto_post')->nullable();
            //đẩy tin tự động
            $table->timestamps();
        });
    }

    public function down()
    {
         Schema::dropIfExists('package_news');
    }
}
