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
        // トップス
        'tops_id',
        // ボトムス
        'botms_id',
        // ドレス
        'dores_id',
        // アウターウェア
        'outerware_id',
        // アクセサリー
        'accessory_id',
        // 靴
        'shoes_id',
        // 被り物
        'overlap_id',
    ];
    
    public $timestamps = true;
    
    // public function getBytops(int $limit_count = 5)
    // {
    //     $outfit = new Outfit();
    //     return $tops_list = $this->$outfit->where('part_id', 1)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    // }

}
