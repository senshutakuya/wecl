<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'seasons';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'season',
    ];
    
    // public static function SeasonValues()
    // {
    //     return [
    //         '春用', '夏用', '秋用','冬用','ALLシーズン',
    //     ];
    // }
    
    public $timestamps = false;
}
