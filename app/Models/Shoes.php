<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoes extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'shoes';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'shoes',
    ];
    

    public $timestamps = false;
}
