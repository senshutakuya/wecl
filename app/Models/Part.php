<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'parts';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'part',
    ];
    
    // public static function PartValues()
    // {
    //     return [
    //         'トップス', 'ボトムス', 'アウターウェア', 'ドレス', 'インナーウェア', 'アクセサリー', '靴', '被り物',
    //     ];
    // }
    
    public $timestamps = false;
}
