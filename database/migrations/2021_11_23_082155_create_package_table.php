<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageTable extends Migration
{
    public function up()
    {
        //tạo các gói tin
        Schema::create('package', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->bigInteger('price')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
         Schema::dropIfExists('package');
    }
}
