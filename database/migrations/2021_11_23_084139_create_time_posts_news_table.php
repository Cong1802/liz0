<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimePostsNewsTable extends Migration
{
    public function up()
    {
        //thời gian đăng bài
        Schema::create('time_posts_news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('news_id')->comment('id bài đăng')->nullable();
            $table->string('day')->comment('ngày đăng')->nullable();
            $table->string('time')->comment('giờ đăng')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
         Schema::dropIfExists('time_posts_news');
    }
}
