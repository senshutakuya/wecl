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
        Schema::create('clothings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('discription', 500)->nullable();
            $table->string('front_image_path', 100)->nullable();
            $table->string('back_image_path', 100)->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('season_id')->nullable();
            $table->unsignedBigInteger('style_id')->nullable();
            $table->unsignedBigInteger('part_id')->nullable();
            $table->unsignedBigInteger('length_id')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('impression_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();

            // 外部キー制約を追加
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->foreign('style_id')->references('id')->on('styles');
            $table->foreign('part_id')->references('id')->on('parts');
            $table->foreign('length_id')->references('id')->on('lengths');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('impression_id')->references('id')->on('impressions');
            $table->foreign('color_id')->references('id')->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clothings');
    }
};
