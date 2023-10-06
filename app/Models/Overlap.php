<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overlap extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'overlaps';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'overlap',
    ];
    

    public $timestamps = false;
}
