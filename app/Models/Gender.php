<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'genders';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'gender',
    ];
    
    // public static function GenderValues()
    // {
    //     return [
    //         '男性用', '女性用', 'どちらでも着れる',
    //     ];
    // }
    
    public $timestamps = false;
}
