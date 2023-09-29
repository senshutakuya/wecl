<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Length extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'lengths';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'length',
    ];
    
    // public static function LengthValues()
    // {
    //     return [
    //         '半袖', '七分丈', '長袖', '袖なし',
    //     ];
    // }
    public $timestamps = false;
}
