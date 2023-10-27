<?php

namespace App\Libraries;

use App\Models\Botms;
use App\Models\Outerware;
use App\Models\Style;
use App\Models\Part;
use App\Models\Color;
use App\Models\Outfit;
use APP\Libraries\C_Botms;
use Cloudinary;

class C_Outerware_Color {
    private $outfit;
    private $c_Botms;
    private $red_color;
    private $orange_color;
    private $yellow_color;
    private $green_color;
    private $blue_color;
    private $purple_color;
    private $brown_color;
    private $gray_color;
    private $white_color;
    private $skin_color;
    private $black_color;
    private $red_yellow;
    private $red_blue;
    private $red_green;
    private $red_purple;
    private $orange_blue;
    private $orange_green; 
    private $orange_purple;
    private $yellow_blue;
    private $yellow_green;
    private $yellow_purple;
    private $green_blue;
    private $green_purple;
    private $blue_purple;
    private $pink_orange;
    private $pink_purple;
    private $brown_orange;
    private $brown_green;
    private $brown_blue;
    private $gray_blue;
    private $gray_pink;
    private $gray_yellow;
    private $white_black;
    private $white_green;
    private $white_blue;

    
    // 他のプロパティ

    public function __construct() {
        $this->outfit = new Outfit();
        $this->c_Botms = new C_Botms();
        // 各色のボトムスを取得
        $this->red_color = $this->getOuterwareByColor(1); // 赤のボトムス
        $this->orange_color = $this->getOuterwareByColor(2); // オレンジ色のボトムス
        $this->yellow_color = $this->getOuterwareByColor(3); // 黄色のボトムス
        $this->green_color = $this->getOuterwareByColor(4); // 緑色のボトムス
        $this->blue_color = $this->getOuterwareByColor(5); // 青色のボトムス
        $this->purple_color = $this->getOuterwareByColor(6); // 紫のボトムス
        $this->brown_color = $this->getOuterwareByColor(7); // 茶色のボトムス
        $this->gray_color = $this->getOuterwareByColor(8); // グレーのボトムス
        $this->white_color = $this->getOuterwareByColor(9); // 白色のボトムス
        $this->skin_color = $this->getOuterwareByColor(10); // 肌色のボトムス
        $this->black_color = $this->getOuterwareByColor(11); // 黒色のボトムス
        // 12以降を記載
        $this->red_yellow = $this->getOuterwareByColor(12); // 赤＆黄のボトムス
        $this->red_blue = $this->getOuterwareByColor(13); // 赤＆青のボトムス
        $this->red_green = $this->getOuterwareByColor(14); // 赤＆緑のボトムス
        $this->red_purple = $this->getOuterwareByColor(15); // 赤＆紫のボトムス
        $this->orange_blue = $this->getOuterwareByColor(16); // オレンジ＆青のボトムス
        $this->orange_green = $this->getOuterwareByColor(17); // オレンジ＆緑のボトムス
        $this->orange_purple = $this->getOuterwareByColor(18); // オレンジ＆紫のボトムス
        $this->yellow_blue = $this->getOuterwareByColor(19); // 黄色＆青のボトムス
        $this->yellow_green = $this->getOuterwareByColor(20); // 黄色＆緑のボトムス
        $this->yellow_purple = $this->getOuterwareByColor(21); // 黄色＆紫のボトムス
        $this->green_blue = $this->getOuterwareByColor(22); // 緑＆青のボトムス
        $this->green_purple = $this->getOuterwareByColor(23); // 緑＆紫のボトムス
        $this->blue_purple = $this->getOuterwareByColor(24); // 青＆紫のボトムス
        $this->pink_orange = $this->getOuterwareByColor(25); // ピンク＆オレンジのボトムス
        $this->pink_purple = $this->getOuterwareByColor(26); // ピンク＆紫のボトムス
        $this->brown_orange = $this->getOuterwareByColor(27); // ブラウン＆オレンジのボトムス
        $this->brown_green = $this->getOuterwareByColor(28); // ブラウン＆緑のボトムス
        $this->brown_blue = $this->getOuterwareByColor(29); // ブラウン＆青のボトムス
        $this->gray_blue = $this->getOuterwareByColor(30); // グレー＆ブルーのボトムス
        $this->gray_pink = $this->getOuterwareByColor(31); // グレー＆ピンクのボトムス
        $this->gray_yellow = $this->getOuterwareByColor(32); // グレー＆イエローのボトムス
        $this->white_black = $this->getOuterwareByColor(33); // ホワイト＆ブラックのボトムス
        $this->white_green = $this->getOuterwareByColor(34); // ホワイト＆グリーンのボトムス
        $this->white_blue = $this->getOuterwareByColor(35); // ホワイト＆ブルーのボトムス
        
        // 他のプロパティの初期化

        // ランダムな色のインデックスを生成
        // $this->red_random_color = $this->getRandomColorIndex($this->red_color);
        // 他の色に対するランダムな色のインデックスも生成
    }
    
    
    // カラーIDを引数で指定して返値でそのボトムスを返す。
    private function getOuterwareByColor($colorId) {
        
        // dd($this->outfit->where('part_id', 2)->where('color_id', $colorId)->get());
        return $this->outfit->where('part_id', 3)->where('color_id', $colorId)->get();
    }

    // 選ばれたカラーのボトムスの数の中でランダムに１つに絞る
    private function getRandomColorIndex($colorArray) {
        if ($colorArray === null) {
            return "{$colorArray}がnullになってる";
        }
    
        $count_item = count($colorArray);
    
        if ($count_item > 0) {
            return random_int(0, $count_item - 1);
        } else {
            return null;
        }
    }

    
   // 引数でプロパティ名を指定して判定するメソッド
    private function baseColorMatch($selectedBotmsColor, $confirmationBotmsColor, $propertyName) {
        $cColor = null;
        $alertDifferent = "";
    
        if ($selectedBotmsColor === $confirmationBotmsColor) {
            if ($propertyName->isNotEmpty()) {
                $cColor = $propertyName;
                $random_item = $this->getRandomColorIndex($propertyName);
                // dd($random_item);
                // return [$random_item, $cColor];
            } elseif ($this->black_color->isNotEmpty()) {
                $cColor = $this->black_color;
                $random_item = $this->getRandomColorIndex($this->black_color);
                dd($random_item);
                // return [$random_item, $cColor];
            } elseif ($this->white_color->isNotEmpty()) {
                $cColor = $this->white_color;
                $random_item = $this->getRandomColorIndex($this->white_color);
                dd($random_item);
                // return [$random_item, $cColor];
            } elseif ($this->white_color->isEmpty()) {
                for ($i = 1; $i <= 35; $i++) {
                    $cColor = $this->getOuterwareByColor($i);
                    // dd($this->getOuterwareBycolor(1));
                    // dd($this->getRandomColorIndex($alternativeColor));
                    $random_item = $this->getRandomColorIndex($cColor);
                    if ($cColor->isNotEmpty()) {
                        $alertDifferent = "この色はあいません";
                        // dd($random_item);
                        // return [$random_item, $alternativeColor];
                        break;
                    }
                    
                    if($i >=35){
                        break;
                    }
                    // dd($random_item);
                }
            } else {
                throw new \Exception('適した色が見つかりませんでした');
            }

    }else{
         throw new \Exception('適した色が見つかりませんでした');
    }
        // ここで dd を配置
        // dd($random_item);
        $oColorResult = $cColor[$random_item];
    
        return [$oColorResult, $alertDifferent];
    }
    
    
    public function getSelectedColor($getcolor) {
        switch ($getcolor) {
            case 1:
                // 赤
                // dd($this->baseColorMatch($getcolor, 1, $this->brown_color));
                return $this->baseColorMatch($getcolor, 1, $this->brown_color);
                break;
            case 2:
                // オレンジ
                return $this->baseColorMatch($getcolor, 2, $this->brown_color);
                break;
            case 3:
                // 黄色
                return $this->baseColorMatch($getcolor, 3, $this->gray_color);
                break;
            case 4:
                // 緑
                return $this->baseColorMatch($getcolor, 4, $this->blue_color);
                break;
            case 5:
                // 青
                return $this->baseColorMatch($getcolor, 5, $this->orange_color);
                break;
            case 6:
                // 紫
                return $this->baseColorMatch($getcolor, 6, $this->gray_color);
                break;
            case 7:
                // 茶色
                return $this->baseColorMatch($getcolor, 7, $this->gray_color);
                break;
            case 8:
                // グレー
                return $this->baseColorMatch($getcolor, 8, $this->red_color);
                break;
            case 9:
                // 白色
                return $this->baseColorMatch($getcolor, 9, $this->blue_color);
                break;
            case 10:
                // 肌色
                return $this->baseColorMatch($getcolor, 10, $this->green_color);
                break;
            case 11:
                // 黒色
                return $this->baseColorMatch($getcolor, 11, $this->purple_color);
                break;
            case 12:
                // 赤、黄
                return $this->baseColorMatch($getcolor, 12, $this->skin_color);
                break;
            case 13:
                // 赤、青
                return $this->baseColorMatch($getcolor, 13, $this->purple_color);
                break;
            case 14:
                // 赤、緑
                return $this->baseColorMatch($getcolor, 14, $this->orange_color);
                break;
            case 15:
                // 赤、紫
                return $this->baseColorMatch($getcolor, 15, $this->brown_color);
                break;
            case 16:
                // オレンジ、青
                return $this->baseColorMatch($getcolor, 16, $this->gray_color);
                break;
            case 17:
                // オレンジ、緑
                return $this->baseColorMatch($getcolor, 17, $this->red_color);
                break;
            case 18:
                // オレンジ、紫
                return $this->baseColorMatch($getcolor, 18, $this->green_color);
                break;
            case 19:
                // 黄色、青
                return $this->baseColorMatch($getcolor, 19, $this->gray_color);
                break;
            case 20:
                // 黄色、緑
                return $this->baseColorMatch($getcolor, 20, $this->purple_color);
                break;
            case 21:
                // 黄色、紫
                return $this->baseColorMatch($getcolor, 21, $this->green_color);
                break;
            case 22:
                // 緑、青
                return $this->baseColorMatch($getcolor, 22, $this->yellow_color);
                break;
            case 23:
                // 緑、紫
                return $this->baseColorMatch($getcolor, 23, $this->red_color);
                break;
            case 24:
                // 青、紫
                return $this->baseColorMatch($getcolor, 24, $this->red_color);
                break;
            case 25:
                // ピンク、オレンジ
                return $this->baseColorMatch($getcolor, 25, $this->brown_color);
                break;
            case 26:
                // ピンク、紫
                return $this->baseColorMatch($getcolor, 26, $this->gray_color);
                break;
            case 27:
                // 茶色、オレンジ
                return $this->baseColorMatch($getcolor, 27, $this->skin_color);
                break;
            case 28:
                // 茶色、緑
                return $this->baseColorMatch($getcolor, 28, $this->red_color);
                break;
            case 29:
                // 茶色、青
                return $this->baseColorMatch($getcolor, 29, $this->blue_color);
                break;
            case 30:
                // グレー、青
                return $this->baseColorMatch($getcolor, 30, $this->green_color);
                break;
            case 31:
                // グレー、ピンク
                return $this->baseColorMatch($getcolor, 31, $this->red_color);
                break;
            case 32:
                // グレー、黄
                return $this->baseColorMatch($getcolor, 32, $this->yellow_color);
                break;
            case 33:
                // ホワイト、黒
                return $this->baseColorMatch($getcolor, 33, $this->blue_color);
                break;
            case 34:
                // ホワイト、緑
                return $this->baseColorMatch($getcolor, 34, $this->gray_color);
                break;
            case 35:
                // ホワイト、青
                return $this->baseColorMatch($getcolor, 35, $this->gray_color);
                break;

                
            // 他のケース
            default:
                return "colorのボトムスがない";
                break;
        }
    }
}
    