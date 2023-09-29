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
        Schema::create('colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('co_variable_id')->nullable();
            $table->string('co_variable_value', 20)->nullable();
            $table->smallInteger('co_id')->nullable();
            $table->string('co_one_value', 20)->nullable();
            $table->string('co_two_value', 21)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colors');
    }
};

