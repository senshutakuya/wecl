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
        Schema::create('styles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('st_variable_id')->nullable();
            $table->string('st_variable_value', 20)->nullable();
            $table->smallInteger('st_id')->nullable();
            $table->string('st_man_value', 20)->nullable();
            $table->string('st_woman_value', 21)->nullable();
            $table->string('st_gender_value', 22)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('styles');
    }
};
