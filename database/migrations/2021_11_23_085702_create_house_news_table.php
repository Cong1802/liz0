<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseNewsTable extends Migration
{
    public function up()
    {
        // liên kết nhà và bài đăng 
        Schema::create('house_news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('news_id')->comment('id tin đăng')->nullable();
            $table->bigInteger('house_id')->comment('id nhà')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
         Schema::dropIfExists('house_news');
    }
}
