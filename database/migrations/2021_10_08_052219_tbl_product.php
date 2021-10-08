<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produts', function (Blueprint $table) {
            // php artisan migrate --path=database/migrations/TênFileMớiTạo.php
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->integer('price');
            $table->integer('price_sales');
            $table->integer('quanlity');
            $table->tinyInteger('status');
            $table->string('description');
            $table->bigInteger('child_cate_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->date('add_day');
            $table->date('expired_day');
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
        Schema::dropIfExists('produts');
    }
}
