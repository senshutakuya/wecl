<?php

namespace App\Libraries;

use App\Models\Tops;
use App\Models\Part;
use App\Models\Color;
use App\Models\Outfit;
use APP\Libraries\C_Tops;
use Cloudinary;

class C_Botms_Style {
    private $outfit;
    private $c_tops;
    private $natural;
    private $street;
    private $old_clothes;
    private $sports;
    private $rock;
    private $casual;
    private $cute;
    private $formal;
    private $mode;
    private $boyish;
    private $drat;
    private $user;
    // 他のプロパティ

    public function __construct() {
        $this->outfit = new Outfit();
        $this->c_tops = new C_Tops();
        $this->user = auth()->user();
        // 各色のボトムスを取得
        
        $this->natural = $this->getBottomsByStyle(1); 
        $this->street = $this->getBottomsByStyle(2); 
        $this->old_clothes = $this->getBottomsByStyle(3);
        $this->sports = $this->getBottomsByStyle(4);
        $this->rock = $this->getBottomsByStyle(5);
        $this->casual = $this->getBottomsByStyle(6);
        $this->cute = $this->getBottomsByStyle(7);
        $this->formal = $this->getBottomsByStyle(8);
        $this->mode = $this->getBottomsByStyle(9);
        $this->boyish = $this->getBottomsByStyle(10);
        $this->drat = $this->getBottomsByStyle(11);
        
        
        // 他のプロパティの初期化

        // ランダムな色のインデックスを生成
        // $this->red_random_color = $this->getRandomColorIndex($this->red_color);
        // 他の色に対するランダムな色のインデックスも生成
    }
    
    // ここで引数に入れられたスタイルIDが該当するボトムスを取得する処理を書く
    private function getBottomsByStyle($styleId) {
        return $this->outfit->where('part_id', 2)->where('style_id', $styleId)->where('user_id', $this->user->id)->get();
    }
    
    private function getRandomStyleIndex($styleArray) {
        if ($styleArray === null) {
            return "{$styleArray}がnullになってる";
        }
        $count_item = count($styleArray);
        if ($count_item > 0) {
            return random_int(0, $count_item - 1);
        } else {
            return null;
        }
    }
    
    // styleを選ぶベースの関数
    private function baseStyleMatch($selectedTopsStyle, $confirmationTopsStyle, $propertyName) {
        $cStyle = null;
        $alertDifferent = "";
        $random_item = null; 
        
        
    
        if ($selectedTopsStyle === $confirmationTopsStyle) {
            if ($propertyName->isNotEmpty()) {
                $cStyle = $propertyName;
                $random_item = $this->getRandomStyleIndex($propertyName);
            } elseif ($this->natural->isNotEmpty()) {
                $cStyle = $this->natural;
                $random_item = $this->getRandomStyleIndex($this->natural);
            } elseif ($this->casual->isNotEmpty()) {
                $cStyle = $this->casual;
                $random_item = $this->getRandomStyleIndex($this->casual);
            } elseif ($this->casual->isEmpty()) {
                for ($i = 1; $i <= 10; $i++) {
                    $cStyle = $this->getBottomsByStyle($i);
                    if ($cStyle->isNotEmpty()) {
                        $alertDifferent = "おすすめはしません";
                        $random_item = $this->getRandomStyleIndex($cStyle);
                        break;
                    }
                    
                    if($i > 10){
                        break;
                    }
                }
            } else {
                // ここまでくるとエラー
                throw new \Exception('適した系統が見つかりませんでした');
            }
        }
    
        // $randomItem = $this->getRandomStyleIndex($cStyle);
        // dd($random_item);
        
        
        if(!is_null($random_item)){
            $bStyleResult = $cStyle[$random_item];
            // dd($bStyleResult);
    
            return [$bStyleResult, $alertDifferent];
        }else{
            return null;
        }
        
    }
    
    
    // 実際にトップスのカラーを取得する処理
    public function getSelectedStyle($getstyle){
        switch($getstyle){
            
            case 1:
                // ナチュラルな場合
                return $this->baseStyleMatch($getstyle,1,$this->boyish);
                break;
            
            case 2:
                // ストリートな場合
                return $this->baseStyleMatch($getstyle,2,$this->old_clothes);
                break;
            
            case 3:
                // 古着な場合
                return $this->baseStyleMatch($getstyle,3,$this->street_clothes);
                break;
            
            case 4:
                // スポーツな場合
                return $this->baseStyleMatch($getstyle,4,$this->sports);
                break;
            case 5:
                // ロックな場合
                return $this->baseStyleMatch($getstyle,5,$this->rock);
                break;
            case 6:
                // カジュアルな場合
                return $this->baseStyleMatch($getstyle,6,$this->street);
                break;
            case 7:
                // キュートな場合
                return $this->baseStyleMatch($getstyle,7,$this->old_clothes);
                break;
            case 8:
                // フォーマルな場合
                return $this->baseStyleMatch($getstyle,8,$this->old_clothes);
                break;
            case 9:
                // モードな場合
                return $this->baseStyleMatch($getstyle,9,$this->old_clothes);
                break;
            case 10:
                // ボーイッシュな場合
                return $this->baseStyleMatch($getstyle,10,$this->old_clothes);
                break;
            case 11:
                // ドラッドな場合
                return $this->baseStyleMatch($getstyle,11,$this->old_clothes);
                break;
            
            default:
                return "styleのボトムスがない";
                break;
            
           
        }
    }
    
}