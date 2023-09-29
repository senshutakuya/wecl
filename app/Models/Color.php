<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'colors';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'co_variable_id',
        'co_variable_value',
        'co_id',
        'co_one_value',
        'co_two_value',

    ];
    

    // {
    //     return [
    //         '1色', '2色', '3色', '柄','プリント系',
    //     ];
    // }
    
    // public static function One_colorValues()
    // {
    //     return [
    //         '赤色', 'オレンジ色', '黄色', '緑色','青色','紫色','茶色','グレー/モノクローム','白色','ベージュ/ヌード',
    //     ];
    // }
    
    // public static function Two_colorValues()
    // {
    //     return [
    //         '赤&黄','赤&青' ,'赤&緑', '赤&紫', 'オレンジ&青','オレンジ&緑','オレンジ&紫','黄色&青','黄色&緑','黄色&紫','緑&青','緑&紫','青&紫','ピンク&オレンジ','ピンク&紫','ブラウン&オレンジ','ブラウン&緑','ブラウン&青','グレー&ブルー','グレー&ピンク','グレー&イエロー','ホワイト&ブラック','ホワイト&グリーン','ホワイト&ブルー',
    //     ];
    // }
    
    
    public $timestamps = false;
}
