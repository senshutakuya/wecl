<?php

namespace App\Libraries;

use App\Models\Tops;
use App\Models\Botms;
use App\Models\Style;
use App\Models\Part;
use App\Models\Color;
use App\Models\Outfit;
use APP\Libraries\C_Tops;
use Cloudinary;

class C_Botms_Color {
    private $outfit;
    private $c_tops;
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
        $this->c_tops = new C_Tops();
        // 各色のボトムスを取得
        $this->red_color = $this->getBottomsByColor(1); // 1のボトムス
        $this->orange_color = $this->getBottomsByColor(2); // オレンジ色のボトムス
        $this->yellow_color = $this->getBottomsByColor(3); // 1のボトムス
        $this->green_color = $this->getBottomsByColor(4); // 緑色のボトムス
        $this->blue_color = $this->getBottomsByColor(5); // 青色のボトムス
        $this->purple_color = $this->getBottomsByColor(6); // 紫のボトムス
        $this->brown_color = $this->getBottomsByColor(7); // 茶色のボトムス
        $this->gray_color = $this->getBottomsByColor(8); // グレーのボトムス
        $this->white_color = $this->getBottomsByColor(9); // 白色のボトムス
        $this->skin_color = $this->getBottomsByColor(10); // 肌色のボトムス
        $this->black_color = $this->getBottomsByColor(11); // 黒色のボトムス
        // 12以降を記載
        $this->red_yellow = $this->getBottomsByColor(12); // 赤＆黄のボトムス
        $this->red_blue = $this->getBottomsByColor(13); // 赤＆青のボトムス
        $this->red_green = $this->getBottomsByColor(14); // 赤＆緑のボトムス
        $this->red_purple = $this->getBottomsByColor(15); // 赤＆紫のボトムス
        $this->orange_blue = $this->getBottomsByColor(16); // オレンジ＆青のボトムス
        $this->orange_green = $this->getBottomsByColor(17); // オレンジ＆緑のボトムス
        $this->orange_purple = $this->getBottomsByColor(18); // オレンジ＆紫のボトムス
        $this->yellow_blue = $this->getBottomsByColor(19); // 黄色＆青のボトムス
        $this->yellow_green = $this->getBottomsByColor(20); // 黄色＆緑のボトムス
        $this->yellow_purple = $this->getBottomsByColor(21); // 黄色＆紫のボトムス
        $this->green_blue = $this->getBottomsByColor(22); // 緑＆青のボトムス
        $this->green_purple = $this->getBottomsByColor(23); // 緑＆紫のボトムス
        $this->blue_purple = $this->getBottomsByColor(24); // 青＆紫のボトムス
        $this->pink_orange = $this->getBottomsByColor(25); // ピンク＆オレンジのボトムス
        $this->pink_purple = $this->getBottomsByColor(26); // ピンク＆紫のボトムス
        $this->brown_orange = $this->getBottomsByColor(27); // ブラウン＆オレンジのボトムス
        $this->brown_green = $this->getBottomsByColor(28); // ブラウン＆緑のボトムス
        $this->brown_blue = $this->getBottomsByColor(29); // ブラウン＆青のボトムス
        $this->gray_blue = $this->getBottomsByColor(30); // グレー＆ブルーのボトムス
        $this->gray_pink = $this->getBottomsByColor(31); // グレー＆ピンクのボトムス
        $this->gray_yellow = $this->getBottomsByColor(32); // グレー＆イエローのボトムス
        $this->white_black = $this->getBottomsByColor(33); // ホワイト＆ブラックのボトムス
        $this->white_green = $this->getBottomsByColor(34); // ホワイト＆グリーンのボトムス
        $this->white_blue = $this->getBottomsByColor(35); // ホワイト＆ブルーのボトムス
        
        // 他のプロパティの初期化

        // ランダムな色のインデックスを生成
        // $this->red_random_color = $this->getRandomColorIndex($this->red_color);
        // 他の色に対するランダムな色のインデックスも生成
    }

    private function getBottomsByColor($colorId) {
        
        // dd($this->outfit);
        return $this->outfit->where('part_id', 2)->where('color_id', $colorId)->get();
    }

    private function getRandomColorIndex($colorArray) {
        $count_item = count($colorArray);
        if ($count_item > 0) {
            return random_int(0, $count_item - 1);
        } else {
            return null;
        }
    }

    public function red_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        
        // dd(!is_null($this->black_color));
        // dd($this->red_yellow->ToArray()); 

        if ($selectedTopsColor === 1 && $this->brown_color->ToArray() !== "[]" ) {
            $c_color = $this->brown_color;
            // 配列の要素数を取得
            $random_item = $this->getRandomColorIndex($this->brown_color);
            // dd($this->brown_color);
            // dd($random_item);
        } elseif ($selectedTopsColor === 1 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
            // dd($c_color);
        } elseif ($selectedTopsColor === 1 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 1 && $this->gray_color->ToArray() !== "[]") {
            $c_color = $this->gray_color;
            $random_item = $this->getRandomColorIndex($this->gray_color);
        } elseif ($selectedTopsColor === 1 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 1 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 1 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
            // dd($alert_different);
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
                dd($random_item);
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        // dd($alternativeColor);
        
        if($alternativeColor === null){
            $different_Color = null;
            $b_color_result = $c_color[$random_item];
        }else{
            $b_color_result = null;
            $different_Color = $alternativeColor[$random_item];
        }
        return [$b_color_result, $alert_different, $different_Color];
    }

    
    // オレンジ色
    public function orange_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        
        if ($selectedTopsColor === 2 && $this->blue_color->ToArray() !== "[]") {
            $c_color = $this->blue_color;
            $random_item = $this->getRandomColorIndex($this->blue_color);
        } elseif ($selectedTopsColor === 2 && $this->green_color->ToArray() !== "[]") {
            $c_color = $this->green_color;
            $random_item = $this->getRandomColorIndex($this->green_color);
        } elseif ($selectedTopsColor === 2 && $this->purple_color->ToArray() !== "[]") {
            $c_color = $this->purple_color;
            $random_item = $this->getRandomColorIndex($this->purple_color);
        } elseif ($selectedTopsColor === 2 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 2 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    // 同様に、他の色に対応する処理を記述
    // イエロー色
    public function yellow_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        
        if ($selectedTopsColor === 3 && $this->blue_color->ToArray() !== "[]") {
            $c_color = $this->blue_color;
            $random_item = $this->getRandomColorIndex($this->blue_color);
        } elseif ($selectedTopsColor === 3 && $this->green_color->ToArray() !== "[]") {
            $c_color = $this->green_color;
            $random_item = $this->getRandomColorIndex($this->green_color);
        } elseif ($selectedTopsColor === 3 && $this->purple_color->ToArray() !== "[]") {
            $c_color = $this->purple_color;
            $random_item = $this->getRandomColorIndex($this->purple_color);
        } elseif ($selectedTopsColor === 3 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 3 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }

    
    // グリーン色
    public function green_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        
        if ($selectedTopsColor === 4 && $this->blue_color->ToArray() !== "[]") {
            $c_color = $this->blue_color;
            $random_item = $this->getRandomColorIndex($this->blue_color);
        } elseif ($selectedTopsColor === 4 && $this->yellow_color->ToArray() !== "[]") {
            $c_color = $this->yellow_color;
            $$random_item = $this->getRandomColorIndex($this->yellow_color);
        } elseif ($selectedTopsColor === 4 && $this->purple_color->ToArray() !== "[]") {
            $c_color = $this->purple_color;
            $random_item = $this->getRandomColorIndex($this->purple_color);
        } elseif ($selectedTopsColor === 4 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 4 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }

    
    // 青色
    public function blue_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
    
        if ($selectedTopsColor === 5 && $this->gray_color->ToArray() !== "[]") {
            $c_color = $this->gray_color;
            $random_item = $this->getRandomColorIndex($this->gray_color);
        } elseif ($selectedTopsColor === 5 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 5 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 5 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }


    
    // 紫色
    public function purple_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 6 && $this->gray_color->ToArray() !== "[]") {
            $c_color = $this->gray_color;
            $random_item = $this->getRandomColorIndex($this->gray_color);
        } elseif ($selectedTopsColor === 6 && $this->yellow_color->ToArray() !== "[]") {
            $c_color = $this->yellow_color;
            $$random_item = $this->getRandomColorIndex($this->yellow_color);
        } elseif ($selectedTopsColor === 6 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 6 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    // 同様に、他の色に対応する処理を記述
    // 茶色
    public function brown_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 7 && $this->blue_color->ToArray() !== "[]") {
            $c_color = $this->blue_color;
            $random_item = $this->getRandomColorIndex($this->blue_color);
        } elseif ($selectedTopsColor === 7 && $this->green_color->ToArray() !== "[]") {
            $c_color = $this->green_color;
            $random_item = $this->getRandomColorIndex($this->green_color);
        } elseif ($selectedTopsColor === 7 && $this->purple_color->ToArray() !== "[]") {
            $c_color = $this->purple_color;
            $random_item = $this->getRandomColorIndex($this->purple_color);
        } elseif ($selectedTopsColor === 7 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 7 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    
    // グレー/モノクローム
    public function gray_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        dd($this->white_color->ToArray());
        if ($selectedTopsColor === 8 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 8 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 8 && $this->white_color->ToArray() === "[]") {
            // dd($this->white_color);
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor ->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    
    // 同様に、他の色に対応する処理を記述
    // 白色
    public function white_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 9 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 9 && $this->brown_color->ToArray() !== "[]") {
            $c_color = $this->brown_color;
            $random_item = $this->getRandomColorIndex($this->brown_color);
        } elseif ($selectedTopsColor === 9 && $this->gray_color->ToArray() !== "[]") {
            $c_color = $this->gray_color;
            $random_item = $this->getRandomColorIndex($this->gray_color);
        } elseif ($selectedTopsColor === 9 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    // 肌色
    public function skin_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 10 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 10 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 10 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    // 黒色
    public function black_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 11 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 11 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 11 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    
    // 12以降の色に対応する処理を同様に記述してください
    
    // 赤&黄
    public function red_yellow_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 12 && $this->yellow_color->ToArray() !== "[]") {
            $c_color = $this->yellow_color;
            $random_item = $this->getRandomColorIndex($this->yellow_color);
        } elseif ($selectedTopsColor === 12 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 12 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    
    // 赤&青
    public function red_blue_color_match($selectedTopsColor) {
        $$c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 13 && $this->blue_color->ToArray() !== "[]") {
            $c_color = $this->blue_color;
            $random_item = $this->getRandomColorIndex($this->blue_color);
        } elseif ($selectedTopsColor === 13 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 13 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    
    // 赤&緑
    public function red_green_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 14 && $this->green_color->ToArray() !== "[]") {
            $c_color = $this->green_color;
            $random_item = $this->getRandomColorIndex($this->green_color);
        } elseif ($selectedTopsColor === 14 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 14 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    // 以下、続く色に対応する処理を同様に記述してください
    
    
    // 赤&紫
    public function red_purple_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 15 && $this->purple_color->ToArray() !== "[]") {
            $c_color = $this->purple_color;
            $random_item = $this->getRandomColorIndex($this->purple_color);
        } elseif ($selectedTopsColor === 15 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 15 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    
    // オレンジ&青
    public function orange_blue_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 16 && $this->blue_color->ToArray() !== "[]") {
            $c_color = $this->blue_color;
            $random_item = $this->getRandomColorIndex($this->blue_color);
        } elseif ($selectedTopsColor === 16 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 16 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    
    // オレンジ&緑
    public function orange_green_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 17 && $this->green_color->ToArray() !== "[]") {
            $c_color = $this->green_color;
            $random_item = $this->getRandomColorIndex($this->green_color);
        } elseif ($selectedTopsColor === 17 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 17 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    // 以下、続く色に対応する処理を同様に記述してください
    
    // オレンジ&紫
    public function orange_purple_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 18 && $this->purple_color->ToArray() !== "[]") {
            $c_color = $this->purple_color;
            $random_item = $this->getRandomColorIndex($this->purple_color);
        } elseif ($selectedTopsColor === 18 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 18 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    
    // 黄色&青
    public function yellow_blue_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 19 && $this->blue_color->ToArray() !== "[]") {
            $c_color = $this->blue_color;
            $random_item = $this->getRandomColorIndex($this->blue_color);
        } elseif ($selectedTopsColor === 19 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 19 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    
    // 黄色&緑
    public function yellow_green_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 20 && $this->green_color->ToArray() !== "[]") {
            $c_color = $this->green_color;
            $random_item = $this->getRandomColorIndex($this->green_color);
        } elseif ($selectedTopsColor === 20 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 20 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    // 以下、続く色に対応する処理を同様に記述してください
    
    
    // 黄色&紫
    public function yellow_purple_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 21 && $this->purple_color->ToArray() !== "[]") {
            $c_color = $this->purple_color;
            $random_item = $this->getRandomColorIndex($this->purple_color);
        } elseif ($selectedTopsColor === 21 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 21 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    
    // 緑&青
    public function green_blue_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 22 && $this->blue_color->ToArray() !== "[]") {
            $c_color = $this->blue_color;
            $random_item = $this->getRandomColorIndex($this->blue_color);
        } elseif ($selectedTopsColor === 22 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 22 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    // 以下、続く色に対応する処理を同様に記述してください
    
    
    // 緑&紫
    public function green_purple_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 23 && $this->purple_color->ToArray() !== "[]") {
            $c_color = $this->purple_color;
            $random_item = $this->getRandomColorIndex($this->purple_color);
        } elseif ($selectedTopsColor === 23 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 23 && $this->black_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    
    
    // 青&紫
    public function blue_purple_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 24 && $this->purple_color->ToArray() !== "[]") {
            $c_color = $this->purple_color;
            $random_item = $this->getRandomColorIndex($this->purple_color);
        }elseif ($selectedTopsColor === 24 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 24 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 24 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    
    // ピンク&オレンジ
    public function pink_orange_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 25 && $this->orange_color->ToArray() !== "[]") {
            $c_color = $this->orange_color;
            $random_item = $this->getRandomColorIndex($this->orange_color);
        }elseif ($selectedTopsColor === 25 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 25 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 25 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    
    // ピンク&紫
    public function pink_purple_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 26 && $this->purple_color->ToArray() !== "[]") {
            $c_color = $this->purple_color;
            $random_item = $this->getRandomColorIndex($this->purple_color);
        }elseif ($selectedTopsColor === 26 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 26 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 26 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    
    
    // ブラウン&オレンジ
    public function brown_orange_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 27 && $this->orange_color->ToArray() !== "[]") {
            $c_color = $this->orange_color;
            $random_item = $this->getRandomColorIndex($this->orange_color);
        }elseif ($selectedTopsColor === 27 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 27 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 27 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    
    // ブラウン&緑
    public function brown_green_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 28 && $this->green_color->ToArray() !== "[]") {
            $c_color = $this->green_color;
            $random_item = $this->getRandomColorIndex($this->green_color);
        }elseif ($selectedTopsColor === 28 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 28 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 28 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    // ブラウン&青
    public function brown_blue_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 29 && $this->blue_color->ToArray() !== "[]") {
            $c_color = $this->blue_color;
            $$random_item = $this->getRandomColorIndex($this->blue_color);
        }elseif ($selectedTopsColor === 29 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 29 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 29 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    
    
    // グレー&ブルー
    public function gray_blue_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 30 && $this->blue_color->ToArray() !== "[]") {
            $c_color = $this->blue_color;
            $random_item = $this->getRandomColorIndex($this->blue_color);
        }elseif ($selectedTopsColor === 30 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 30 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 30 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    
    // グレー&ピンク
    public function gray_pink_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 31 && $this->pink_color->ToArray() !== "[]") {
            $c_color = $this->pink_color;
            $random_item = $this->getRandomColorIndex($this->pink_color);
        }elseif ($selectedTopsColor === 31 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 31 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 31 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    // グレー&イエロー
    public function gray_yellow_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 32 && $this->yellow_color->ToArray() !== "[]") {
            $c_color = $this->yellow_color;
            $random_item = $this->getRandomColorIndex($this->yellow_color);
        }elseif ($selectedTopsColor === 32 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 32 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 32 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    // ホワイト&ブラック
    public function white_black_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 33 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 33 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 33 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    
        // 他の関数
    
    // ホワイト&グリーン
    public function white_green_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 34 && $this->green_color->ToArray() !== "[]") {
            $c_color = $this->green_color;
            $random_item = $this->getRandomColorIndex($this->green_color);
        }elseif ($selectedTopsColor === 34 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 34 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 34 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    
    // ホワイト&ブルー
    public function white_blue_color_match($selectedTopsColor) {
        $c_color = null;
        $alternativeColor = null;
        $alert_different = "";
        $different_Color = null;
        if ($selectedTopsColor === 35 && $this->blue_color->ToArray() !== "[]") {
            $c_color = $this->blue_color;
            $random_item = $this->getRandomColorIndex($this->blue_color);
        }elseif ($selectedTopsColor === 35 && $this->black_color->ToArray() !== "[]") {
            $c_color = $this->black_color;
            $random_item = $this->getRandomColorIndex($this->black_color);
        } elseif ($selectedTopsColor === 35 && $this->white_color->ToArray() !== "[]") {
            $c_color = $this->white_color;
            $random_item = $this->getRandomColorIndex($this->white_color);
        } elseif ($selectedTopsColor === 35 && $this->white_color->ToArray() === "[]") {
            $alternativeColor = null;
    
            for ($i = 1; $i <= 35; $i++) {
                $alternativeColor = $this->getBottomsByColor($i);
                $random_item = $this->getRandomColorIndex($alternativeColor);
    
                // 見つかった場合、ループを終了
                if ($alternativeColor->ToArray() !== "[]") {
                    $alert_different = "似合う色ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う色がありません');
        }
        // $random_item を使用して結果を取得
        $b_color_result = $c_color[$random_item];
        $different_Color = $alternativeColor[$random_item];
        return [$b_color_result, $alert_different, $different_Color];
    }
    // 以下、続く色に対応する処理を同様に記述してください
    
    
    // ここから以下の色に対応する処理を同様に記述してください
    
    // 実際にトップスのカラーを取得する処理
    public function getSelectedColor($getcolor){
        switch($getcolor){
            
            case 1:
                $this->red_color_match($getcolor);
                
            break;
            
            case 2:
                $this->yellow_color_match($getcolor);
            break;
            
            case 3:
                $this->green_color_match($getcolor);
            break;
            
            case 4:
                $this->blue_color_match($getcolor);
            break;
            
            case 5:
                $this->purple_color_match($getcolor);
            break;
            
            case 6:
                $this->brown_color_match($getcolor);
            break;
            
            case 7:
                $this->gray_color_match($getcolor);
            break;
            
            case 8:
                $this->gray_color_match($getcolor);
            break;
            
            case 9:
                $this->white_color_match($getcolor);
            break;
            
            case 10:
                $this->skin_color_match($getcolor);
            break;
            
            case 11:
                $this->black_color_match($getcolor);
            break;
            
            case 12:
                $this->red_yellow_color_match($getcolor);
            break;
            
            case 13:
                $this->red_blue_color_match($getcolor);
            break;
            
            case 14:
                $this->red_green_color_match($getcolor);
            break;
            
            case 15:
                $this->red_purple_color_match($getcolor);
            break;
            
            case 16:
                $this->orange_blue_color_match($getcolor);
            break;
            
            case 17:
                $this->orange_green_color_match($getcolor);
            break;
            
            case 18:
                $this->orange_purple_color_match($getcolor);
            break;
            
            case 19:
                $this->yellow_blue_color_match($getcolor);
            break;
            
            case 20:
                $this->yellow_green_color_match($getcolor);
            break;
            
            case 21:
                $this->yellow_purple_color_match($getcolor);
            break;
            
            case 22:
                $this->green_blue_color_match($getcolor);
            break;
            
            case 23:
                $this->green_purple_color_match($getcolor);
            break;
            
            case 24:
                $this->blue_purple_color_match($getcolor);
            break;
            
            case 25:
                $this->pink_orange_color_match($getcolor);
            break;
            
            case 26:
                $this->pink_purple_color_match($getcolor);
            break;
            
            case 27:
                $this->brown_orange_color_match($getcolor);
            break;
            
            case 28:
                $this->brown_green_color_match($getcolor);
            break;
            
            case 29:
                $this->brown_blue_color_match($getcolor);
            break;
            
            case 30:
                $this->gray_blue_color_match($getcolor);
            break;
            
            case 31:
                $this->gray_pink_color_match($getcolor);
            break;
            
            case 32:
                $this->gray_yellow_color_match($getcolor);
            break;
            
            case 33:
                $this->white_black_color_match($getcolor);
            break;
            
            case 34:
                $this->white_green_color_match($getcolor);
            break;
            
            case 35:
                $this->white_blue_color_match($getcolor);
            break;
        }
    }
    
}
    