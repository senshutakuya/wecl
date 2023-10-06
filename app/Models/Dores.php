<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dores extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'dores';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'dores',
    ];
    

    public $timestamps = false;
}
