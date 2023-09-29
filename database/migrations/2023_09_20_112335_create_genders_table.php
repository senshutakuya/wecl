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
        // Gendersテーブルの作成
        Schema::create('genders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gender', 10);
            // $table->enum('gender', ['男性用', '女性用', 'どちらでも着れる']);
        });

    //     // Gender IDとEnum値の関連付け用のテーブルを作成
    //     Schema::create('gender_enum_mapping', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->unsignedBigInteger('gender_id');
    //         $table->string('enum_value'); // Enum値を保存するカラム
    //         $table->timestamps();
    //     });

    //     // Genderテーブルの各Enum値とIDを関連付けるデータを挿入
    //     DB::table('gender_enum_mapping')->insert([
    //         ['gender_id' => 1, 'enum_value' => '男性用'],
    //         ['gender_id' => 2, 'enum_value' => '女性用'],
    //         ['gender_id' => 3, 'enum_value' => 'どちらでも着れる'],
    //     ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('gender_enum_mapping');
        Schema::dropIfExists('genders');
    }
};
