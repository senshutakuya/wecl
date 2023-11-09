<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Starcode extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'outfits';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        'discription',
        't_id',
        't_frontimage',
        't_backimage',
        'b_id',
        'b_frontimage',
        'b_backimage',
        'o_id',
        'o_frontimage',
        'o_backimage',
        'is_public',
        
    ];
    
    
    public $timestamps = true;
}
