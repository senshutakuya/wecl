<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'sizes';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'size',
    ];
    
    // public static function SizeValues()
    // {
    //     return [
    //         'S', 'M', 'L', 'オーバーサイズ',
    //     ];
    // }
    
    public $timestamps = false;
}
