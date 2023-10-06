<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outerware extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'outerwares';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'outerware',
    ];
    

    public $timestamps = false;
}
