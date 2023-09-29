<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    use HasFactory;
    // protected $table = '紐付けたいテーブル名';
    protected $table = 'clothings';
    
    protected $fillable = [
        // 許可するカラムを指定
        'id',
        // 'name',
        // 説明
        'discription',
        // 画像(前)
        'front_image_path',
        // 画像(後ろ)
        'back_image_path',
        // 誰が着れるか
        'gender_id',
        // 季節
        'season_id',
        // 系統
        'style_id',
        // 部位
        'part_id',
        // 丈の長さ
        'length_id',
        // 大きさ
        'size_id',
        // カテゴリー
        'category_id',
        // 印象
        'impression_id',
        // 色
        'color_id',
    ];
    
    public $timestamps = false;
    
    // categoryモデルとのリレーションを定義
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
        
    }
}
