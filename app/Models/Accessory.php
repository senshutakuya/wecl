<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'accessories';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'accessory',
    ];
    

    public $timestamps = false;
}
