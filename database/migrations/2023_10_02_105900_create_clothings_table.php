<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClothingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('discription', 500)->nullable();
            $table->string('front_image_path', 100);
            $table->string('back_image_path', 100);
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('season_id');
            $table->unsignedBigInteger('style_id');
            $table->unsignedBigInteger('part_id');
            $table->unsignedBigInteger('length_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('impression_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('tops_id')->nullable(); // Make tops_id nullable
            $table->unsignedBigInteger('botms_id')->nullable(); // Make botms_id nullable
            $table->unsignedBigInteger('dores_id')->nullable(); // Make dores_id nullable
            $table->unsignedBigInteger('outerware_id')->nullable(); // Make outerware_id nullable
            $table->unsignedBigInteger('innerware_id')->nullable(); // Make innerware_id nullable
            $table->unsignedBigInteger('accessory_id')->nullable(); // Make accessory_id nullable
            $table->unsignedBigInteger('shoes_id')->nullable(); // Make shoes_id nullable
            $table->unsignedBigInteger('overlap_id')->nullable(); // Make overlap_id nullable
            $table->boolean('delete_flag')->default(false); // 削除フラグ

            // 外部キー制約を追加
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->foreign('style_id')->references('id')->on('styles');
            $table->foreign('part_id')->references('id')->on('parts');
            $table->foreign('length_id')->references('id')->on('lengths');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('impression_id')->references('id')->on('impressions');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('tops_id')->references('id')->on('tops');
            $table->foreign('botms_id')->references('id')->on('botms');
            $table->foreign('dores_id')->references('id')->on('dores');
            $table->foreign('outerware_id')->references('id')->on('outerwares');
            $table->foreign('innerware_id')->references('id')->on('innerwares');
            $table->foreign('accessory_id')->references('id')->on('accessories');
            $table->foreign('shoes_id')->references('id')->on('shoes');
            $table->foreign('overlap_id')->references('id')->on('overlaps');

            $table->timestamps(); // created_at, updated_at カラムを有効にします。
            $table->softDeletes(); // ここでSoftDeletesを有効にします。
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clothings', function (Blueprint $table) {
            // 外部キー制約の削除
            $table->dropForeign('clothings_user_id_foreign');
            $table->dropForeign('clothings_gender_id_foreign');
            $table->dropForeign('clothings_season_id_foreign');
            $table->dropForeign('clothings_style_id_foreign');
            $table->dropForeign('clothings_part_id_foreign');
            $table->dropForeign('clothings_length_id_foreign');
            $table->dropForeign('clothings_size_id_foreign');
            $table->dropForeign('clothings_impression_id_foreign');
            $table->dropForeign('clothings_color_id_foreign');
            $table->dropForeign('clothings_tops_id_foreign');
            $table->dropForeign('clothings_botms_id_foreign');
            $table->dropForeign('clothings_dores_id_foreign');
            $table->dropForeign('clothings_outerware_id_foreign');
            $table->dropForeign('clothings_innerware_id_foreign');
            $table->dropForeign('clothings_accessory_id_foreign');
            $table->dropForeign('clothings_shoes_id_foreign');
            $table->dropForeign('clothings_overlap_id_foreign');
        });

        Schema::dropIfExists('clothings');
    }
}
