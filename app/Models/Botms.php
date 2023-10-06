<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Botms extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'botms';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'botms',
    ];

    
    public $timestamps = false;
}
