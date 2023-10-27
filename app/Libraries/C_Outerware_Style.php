<?php

namespace App\Libraries;

use App\Models\Botms;
use App\Models\Part;
use App\Models\Color;
use App\Models\Outfit;
use APP\Libraries\C_Botms;
use Cloudinary;

class C_Outerware_Style {
    private $outfit;
    private $c_Botms;
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
    // 他のプロパティ

    public function __construct() {
        $this->outfit = new Outfit();
        $this->c_Botms = new C_Botms();
        // 各色のボトムスを取得
        
        $this->natural = $this->getOuterwareByStyle(1); 
        $this->street = $this->getOuterwareByStyle(2); 
        $this->old_clothes = $this->getOuterwareByStyle(3);
        $this->sports = $this->getOuterwareByStyle(4);
        $this->rock = $this->getOuterwareByStyle(5);
        $this->casual = $this->getOuterwareByStyle(6);
        $this->cute = $this->getOuterwareByStyle(7);
        $this->formal = $this->getOuterwareByStyle(8);
        $this->mode = $this->getOuterwareByStyle(9);
        $this->boyish = $this->getOuterwareByStyle(10);
        $this->drat = $this->getOuterwareByStyle(11);
        
        
        // 他のプロパティの初期化

        // ランダムな色のインデックスを生成
        // $this->red_random_color = $this->getRandomColorIndex($this->red_color);
        // 他の色に対するランダムな色のインデックスも生成
    }
    
    // ここで引数に入れられたスタイルIDが該当するボトムスを取得する処理を書く
    private function getOuterwareByStyle($styleId) {
        return $this->outfit->where('part_id', 2)->where('style_id', $styleId)->get();
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
    private function baseStyleMatch($selectedBotmsStyle, $confirmationBotmsStyle, $propertyName) {
        $cStyle = null;
        $alertDifferent = "";
        
        
    
        if ($selectedBotmsStyle === $confirmationBotmsStyle) {
            if ($propertyName->isNotEmpty()) {
                $cStyle = $proertyName;
                $random_item = $this->getRandomStyleIndex($propertyName);
                // return [$random_item , $cStyle];
            } elseif ($this->natural->isNotEmpty()) {
                $cStyle = $this->natural;
                $random_item = $this->getRandomStyleIndex($this->natural);
            } elseif ($this->casual->isNotEmpty()) {
                $cStyle = $this->casual;
                $random_item = $this->getRandomStyleIndex($this->casual);
            } elseif ($this->casual->isEmpty()) {
                for ($i = 1; $i <= 10; $i++) {
                    $cStyle = $this->getOuterwareByStyle($i);
                    if ($cStyle->isNotEmpty()) {
                        $alertDifferent = "この系統はあいません";
                        break;
                    }
                    
                    if($i >=10){
                        break;
                    }
                }
            } else {
                // ここまでくるとエラー
                throw new \Exception('適した系統が見つかりませんでした');
            }
        }
    
        // $random_item = $this->getRandomStyleIndex($cStyle);
        
        $oStyleResult = $cStyle[$random_item];
    
        return [$oStyleResult, $alertDifferent];
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