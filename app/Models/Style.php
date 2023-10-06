<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'styles';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'style',

    ];
    
    // public static function Woman_styleValues()
    // {
    //     return [
    //         'ナチュラル', 'コンサバ', 'きれいめ', 'カジュアル', '可愛い系', 'フォーマル系', 'クール系', 'モード系', 'ボーイッシュ系',
    //     ];
    // }
    
    // public static function Man_styleValues()
    // {
    //     return [
    //         'きれいめ&シンプル', 'ナチュラル', 'アメカジ', 'ストリート', 'トラッド', 'ワーク', 'ミリタリー', 'サーフ', '古着', 'アウトドア', 'スポーツ', 'モード', 'ロック', 'フレンチカジュアル', 'ビジネス・スーツ',
    //     ];
    // }
    
    // public static function Gender_styleValues()
    // {
    //     return [
    //         'ナチュラル', 'シンプル', 'リラックスコーデ', 'カジュアル', 'マニッシュコーデ', 'スポーティーMIX', 'トラッド系', 'モード系', 'クール系',
    //     ];
    // }
    public $timestamps = false;
}
