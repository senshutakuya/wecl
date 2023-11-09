<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('outfits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('discription', 500)->nullable();
            $table->bigInteger('t_id')->nullable();
            $table->string('t_frontimage', 100)->nullable();
            $table->string('t_backimage', 100)->nullable();
            $table->bigInteger('b_id')->nullable();
            $table->string('b_frontimage', 100)->nullable();
            $table->string('b_backimage', 100)->nullable();
            $table->bigInteger('o_id')->nullable();
            $table->string('o_frontimage', 100)->nullable();
            $table->string('o_backimage', 100)->nullable();
            $table->boolean('is_public')->default(true);
            $table->timestamps(); // created_at, updated_at カラムを有効にします。
            $table->softDeletes(); // ここでSoftDeletesを有効にします。
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('outfits');
        $table->dropForeign('clothings_user_id_foreign');
    }
};

