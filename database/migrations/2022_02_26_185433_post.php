<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // tạo cột id, số id tự tăng
            $table->string('title'); //tạo cột có kiểu dữ liệu varchar
            $table->text('description'); //tạo cột có kiểu dữ liệu text
            $table->string('image');
            $table->integer('status'); //tạo cột có kiểu dữ liệu int
            $table->timestamps(); // sẽ tự tạo 2 cột created_at và updated_at có kiểu dữ liệu timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
