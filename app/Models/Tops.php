<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tops extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'tops';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'tops',
    ];
    
    
    public $timestamps = false;
}
