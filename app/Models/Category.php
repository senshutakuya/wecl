<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'categories';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'ca_variable_id',
        'ca_variable_value',
        'ca_id',
        'ca_tops_value',
        'ca_botms_value',
        'ca_botms_value',
        'ca_dores_value',
        'ca_outerware_value',
        'ca_innerware_value',
        'ca_accessory_value',
        'ca_shoes_value',
        'ca_overlap_value',

    ];
    
    // public static function getTopsValues()
    // {
    //     return [
    //         'Tシャツ', 'シャツ', 'ブラウス', 'ポロシャツ', 'タンクトップ', 'スウェットシャツ', 'カーディガン', 'パーカー',
    //     ];
    // }
    
    // public static function getBotmsValues()
    // {
    //     return [
    //         'ジーンズ', 'スラックス', 'ショートパンツ', 'スカート','レギンス','パンツ','ショーツ','キュロット',
    //     ];
    // }
    
    // public static function getDoresValues()
    // {
    //     return [
    //         'カジュアルドレス', 'カクテルドレス', 'イブニングドレス', '結婚式のドレス','マキシドレス','ミディドレス','ミニドレス','サマードレス',
    //     ];
    // }
    
    // public static function getOuterwareValues()
    // {
    //     return [
    //         'ジャケット', 'コート', 'ブルゾン', 'ベスト','ピーコート','ダウンジャケット','ブレザー','カーディガン',
    //     ];
    // }
    
    // public static function getInnerwareValues()
    // {
    //     return [
    //         'ブラジャー', 'パンティー', 'ショーツ', 'キャミソール','スリップ','タンクトップ','ボクサーショーツ','レディースタンゴ',
    //     ];
    // }
    
    // public static function getAccessoryValues()
    // {
    //     return [
    //         'ネックレス', 'ブレスレット', 'イヤリング', 'リング','バッグ','帽子','サングラス','スカーフ',
    //     ];
    // }
    
    // public static function getShoesValues()
    // {
    //     return [
    //         'スニーカー', 'ブーツ', 'ヒールシューズ', 'フラットシューズ','サンダル','ローファー','エスパドリーユ','レインブーツ'
    //     ];
    // }
    
    // public static function getOverlapValues()
    // {
    //     return [
    //         '帽子', 'ビーニー', 'ハット', 'キャップ','フード','ヘッドバンド','ターバン','ヘッドピース'
    //     ];
    // }
    
    public $timestamps = false;
}
