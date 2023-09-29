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
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('ca_variable_id')->nullable();
            $table->string('ca_variable_value', 20)->nullable();
            $table->smallInteger('ca_id')->nullable();
            $table->string('ca_tops_value', 20)->nullable();
            $table->string('ca_botms_value', 21)->nullable();
            $table->string('ca_dores_value', 22)->nullable();
            $table->string('ca_outerware_value', 23)->nullable();
            $table->string('ca_innerware_value', 24)->nullable();
            $table->string('ca_accessory_value', 25)->nullable();
            $table->string('ca_shoes_value', 26)->nullable();
            $table->string('ca_overlap_value', 27)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};

