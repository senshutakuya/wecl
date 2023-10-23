<?php

namespace App\Libraries;

use App\Models\Tops;
use App\Models\Part;
use App\Models\Outfit;
use Cloudinary;

class C_Tops
{
    private $random_length;
    private $short_sleeve;
    private $seveneighths_length;
    private $long_sleeve;
    private $non_sleeve;
    private $non_item_length;
    private $short_item_length;
    private $seven_item_length;
    private $long_item_length;
    private $non_random_tops;
    private $short_random_tops;
    private $seven_random_tops;
    private $long_random_tops;

    public function __construct()
    {
        $this->random_length = random_int(1, 3);

        // Outfitをインスタンス化
        $outfit = new Outfit();

        // partのidが1(トップス)かつlength_idが1(半袖)の物を取得
        $this->short_sleeve = $outfit->Where([
            'part_id' => 1,
            'length_id' => 1
        ])->get();

        // トップス且つ七分丈の物を取得
        $this->seveneighths_length = $outfit->Where([
            'part_id' => 1,
            'length_id' => 2
        ])->get();

        // 長袖
        $this->long_sleeve = $outfit->Where([
            'part_id' => 1,
            'length_id' => 3
        ])->get();

        // 袖なし
        $this->non_sleeve = $outfit->Where([
            'part_id' => 1,
            'length_id' => 4
        ])->get();
        
        $this->non_item_length = count($this->non_sleeve);
        $this->short_item_length = count($this->short_sleeve);
        $this->seven_item_length = count($this->seveneighths_length);
        $this->long_item_length = count($this->long_sleeve);
        
        // max(0, $this->non_item_length - 1) の部分は、0未満になることを防ぐ
        
        $this->non_random_tops = random_int(0, max(0, $this->non_item_length - 1));
        $this->short_random_tops = random_int(0, max(0, $this->short_item_length - 1));
        $this->seven_random_tops = random_int(0, max(0, $this->seven_item_length - 1));
        $this->long_random_tops = random_int(0, max(0, $this->long_item_length - 1));

    }

    // 20度以上
    public function degrees_over_20()
    {
        $result_length = null; // 初期値をnullに設定
        $count_item = 0;
        $random_item = 0;
        

        if ($this->random_length === 1 && !is_null($this->short_sleeve)) {
            // トップス半袖
            $result_length = $this->short_sleeve;
            $count_item = $this->short_item_length;
            $random_item = $this->short_random_tops; // 修正
        } elseif ($this->random_length === 2 && !is_null($this->seveneighths_length)) {
            // 七分丈
            $result_length = $this->seveneighths_length;
            $count_item = $this->seven_item_length;
            $random_item = $this->seven_random_tops; // 修正
        } elseif ($this->random_length === 3 && !is_null($this->non_sleeve)) {
            // 袖なし
            $result_length = $this->non_sleeve;
            $count_item = $this->non_item_length;
            $random_item = $this->non_random_tops;
        } elseif (!is_null($this->long_sleeve)) {
            // 長袖
            $result_length = $this->long_sleeve;
            $count_item = $this->long_item_length;
            $random_item = $this->long_random_tops; // 修正
        } else {
            // トップスが見つからない場合、例外をスローする
            throw new \Exception('トップスがありません');
        }
        
        // $random_item を使用して結果を取得
        $selected_result = $result_length[$random_item];

        return [$selected_result, $count_item, $random_item];
    }
    
    // 16度以上なら
    public function degrees_over_16()
    {
        $result_length = null; // 初期値をnullに設定
        $count_item = 0;
        $random_item = 0;
        
        $random_16_over = $this->random_length = random_int(2, 3);

        if ($this->random_length === 2 && !is_null($this->short_sleeve)) {
            // トップス半袖
            $result_length = $this->short_sleeve;
            $count_item = $this->short_item_length;
            $random_item = $this->short_random_tops; // 修正
        } elseif ($this->random_length === 3 && !is_null($this->seveneighths_length)) {
            // 七分丈
            $result_length = $this->seveneighths_length;
            $count_item = $this->seven_item_length;
            $random_item = $this->seven_random_tops; // 修正
        } elseif (!is_null($this->non_sleeve)) {
            // 袖なし
            $result_length = $this->non_sleeve;
            $count_item = $this->non_item_length;
            $random_item = $this->non_random_tops;
        } elseif (!is_null($this->long_sleeve)) {
            // 長袖
            $result_length = $this->long_sleeve;
            $count_item = $this->long_item_length;
            $random_item = $this->long_random_tops; // 修正
        } else {
            // トップスが見つからない場合、例外をスローする
            throw new \Exception('トップスがありません');
        }

        // $random_item を使用して結果を取得
        $selected_result = $result_length[$random_item];

        return [$selected_result, $count_item, $random_item];
    }
    
    // 15度以下なら
    public function degrees_under_15()
    {
        $result_length = null; // 初期値をnullに設定
        $count_item = 0;
        $random_item = 0;
        
        $random_15_under = $this->random_length = random_int(3, 4);

        if ($this->random_length === 3 && !is_null($this->seveneighths_length)) {
            // 七分丈
            $result_length = $this->seveneighths_length;
            $count_item = $this->seven_item_length;
            $random_item = $this->seven_random_tops; // 修正
        } elseif ($this->random_length === 4 && !is_null($this->long_sleeve)) {
            // 長袖
            $result_length = $this->long_sleeve;
            $count_item = $this->long_item_length;
            $random_item = $this->long_random_tops; // 修正
        } elseif (!is_null($this->short_sleeve)) {
            // トップス半袖
            $result_length = $this->short_sleeve;
            $count_item = $this->short_item_length;
            $random_item = $this->short_random_tops; // 修正
        } elseif (!is_null($this->non_sleeve)) {
            // 袖なし
            $result_length = $this->non_sleeve;
            $count_item = $this->non_item_length;
            $random_item = $this->non_random_tops;
        } else {
            // トップスが見つからない場合、例外をスローする
            throw new \Exception('トップスがありません');
        }

        // $random_item を使用して結果を取得
        $selected_result = $result_length[$random_item];

        return [$selected_result, $count_item, $random_item];
    }
}
