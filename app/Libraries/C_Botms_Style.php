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
    // 他のプロパティ

    public function __construct() {
        $this->outfit = new Outfit();
        $this->c_tops = new C_Tops();
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
        return $this->outfit->where('part_id', 2)->where('style_id', $styleId)->get();
    }
    
    private function getRandomStyleIndex($styleArray) {
        $count_item = count($styleArray);
        if ($count_item > 0) {
            return random_int(0, $count_item - 1);
        } else {
            return null;
        }
    }
    
    // ナチュラル
    public function natural_match($selectedTopsStyle) {
        $c_style = null;
        $alternativeStyle = null;
        $alert_different = "";
        $different_Style = null;
        if ($selectedTopsStyle === 1 && !is_null($this->natural)) {
            $c_style = $this->natural;
            $random_item = $this->getRandomStyleIndex($this->natural);
        } elseif ($selectedTopsStyle === 1 && !is_null($this->casual)) {
            $c_color = $this->casual;
            $random_item = $this->getRandomStyleIndex($this->casual);
        } elseif ($selectedTopsStyle === 1 && !is_null($this->boyish)) {
            $c_color = $this->boyish;
            $random_item = $this->getRandomStyleIndex($this->boyish);
        } elseif ($selectedTopsStyle === 1 && is_null($this->casual)) {
            $alternativeStyle = null;
    
            for ($i = 1; $i <= 11; $i++) {
                $alternativeStyle = $this->getBottomsByStyle($i);
                $random_item = $this->getRandomColorIndex($alternativeStyle);
    
                // 見つかった場合、ループを終了
                if (!is_null($alternativeStyle)) {
                    $alert_different = "似合う系統ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う系統がありません');
        }
        // $random_item を使用して結果を取得
        if($alternativeStyle === null){
            $different_Style = null;
            $b_style_result = $c_style[$random_item];
            
        }else{
            $b_style_result = null;
            $different_Style = $alternativeStyle[$random_item];
        }
        
        return [$b_style_result, $alert_different, $different_Style];
    }

    
    // ストリート系
    public function street_match($selectedTopsStyle) {
        $c_style = null;
        $alternativeStyle = null;
        $alert_different = "";
        $different_Style = null;
        if ($selectedTopsStyle === 2 && !is_null($this->street)) {
            $c_style = $this->street;
            $random_item = $this->getRandomStyleIndex($this->street);
        } elseif ($selectedTopsStyle === 2 && !is_null($this->casual)) {
            $c_color = $this->casual;
            $random_item = $this->getRandomStyleIndex($this->casual);
        } elseif ($selectedTopsStyle === 2 && !is_null($this->old_clothes)) {
            $c_color = $this->old_clothes;
            $random_item = $this->getRandomStyleIndex($this->old_clothes);
        } elseif ($selectedTopsStyle === 2 && !is_null($this->sports)) {
            $c_color = $this->sports;
            $random_item = $this->getRandomStyleIndex($this->sports);
        } elseif ($selectedTopsStyle === 2 && is_null($this->sports)) {
            $alternativeStyle = null;
    
            for ($i = 1; $i <= 11; $i++) {
                $alternativeStyle = $this->getBottomsByStyle($i);
                $random_item = $this->getRandomColorIndex($alternativeStyle);
    
                // 見つかった場合、ループを終了
                if (!is_null($alternativeStyle)) {
                    $alert_different = "似合う系統ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う系統がありません');
        }
        // $random_item を使用して結果を取得
        $b_style_result = $c_style[$random_item];
        $different_Style = $alternativeStyle[$random_item];
        return [$b_style_result, $alert_different, $different_Style];
    }
    
    
    
    // 古着系
    public function old_clothes_match($selectedTopsStyle) {
        $c_style = null;
        $alternativeStyle = null;
        $alert_different = "";
        $different_Style = null;
        if ($selectedTopsStyle === 3 && !is_null($this->old_clothes)) {
            $c_style = $this->old_clothes;
            $random_item = $this->getRandomStyleIndex($this->old_clothes);
        } elseif ($selectedTopsStyle === 3 && !is_null($this->street)) {
            $c_color = $this->street;
            $random_item = $this->getRandomStyleIndex($this->street);
        } elseif ($selectedTopsStyle === 3 && !is_null($this->casual)) {
            $c_color = $this->casual;
            $random_item = $this->getRandomStyleIndex($this->casual);
        } elseif ($selectedTopsStyle === 3 && is_null($this->casual)) {
            $alternativeStyle = null;
    
            for ($i = 1; $i <= 11; $i++) {
                $alternativeStyle = $this->getBottomsByStyle($i);
                $random_item = $this->getRandomColorIndex($alternativeStyle);
    
                // 見つかった場合、ループを終了
                if (!is_null($alternativeStyle)) {
                    $alert_different = "似合う系統ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う系統がありません');
        }
        // $random_item を使用して結果を取得
        $b_style_result = $c_style[$random_item];
        $different_Style = $alternativeStyle[$random_item];
        return [$b_style_result, $alert_different, $different_Style];
    }
    
    
    
    
    // スポーツ系
    public function sports_match($selectedTopsStyle) {
        $c_style = null;
        $alternativeStyle = null;
        $alert_different = "";
        $different_Style = null;
        if ($selectedTopsStyle === 4 && !is_null($this->sports)) {
            $c_style = $this->sports;
            $random_item = $this->getRandomStyleIndex($this->sports);
        } elseif ($selectedTopsStyle === 4 && !is_null($this->street)) {
            $c_color = $this->street;
            $random_item = $this->getRandomStyleIndex($this->street);
        } elseif ($selectedTopsStyle === 4 && !is_null($this->casual)) {
            $c_color = $this->casual;
            $random_item = $this->getRandomStyleIndex($this->casual);
        } elseif ($selectedTopsStyle === 4 && is_null($this->casual)) {
            $alternativeStyle = null;
    
            for ($i = 1; $i <= 11; $i++) {
                $alternativeStyle = $this->getBottomsByStyle($i);
                $random_item = $this->getRandomColorIndex($alternativeStyle);
    
                // 見つかった場合、ループを終了
                if (!is_null($alternativeStyle)) {
                    $alert_different = "似合う系統ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う系統がありません');
        }
        // $random_item を使用して結果を取得
        $b_style_result = $c_style[$random_item];
        $different_Style = $alternativeStyle[$random_item];
        return [$b_style_result, $alert_different, $different_Style];
    }
    
    
    
    
    // ロック系
    public function rock_match($selectedTopsStyle) {
        $c_style = null;
        $alternativeStyle = null;
        $alert_different = "";
        $different_Style = null;
        if ($selectedTopsStyle === 5 && !is_null($this->rock)) {
            $c_style = $this->rock;
            $random_item = $this->getRandomStyleIndex($this->rock);
        } elseif ($selectedTopsStyle === 5 && !is_null($this->street)) {
            $c_color = $this->street;
            $random_item = $this->getRandomStyleIndex($this->street);
        } elseif ($selectedTopsStyle === 5 && !is_null($this->casual)) {
            $c_color = $this->casual;
            $random_item = $this->getRandomStyleIndex($this->casual);
        } elseif ($selectedTopsStyle === 5 && is_null($this->rock)) {
            $alternativeStyle = null;
    
            for ($i = 1; $i <= 11; $i++) {
                $alternativeStyle = $this->getBottomsByStyle($i);
                $random_item = $this->getRandomColorIndex($alternativeStyle);
    
                // 見つかった場合、ループを終了
                if (!is_null($alternativeStyle)) {
                    $alert_different = "似合う系統ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う系統がありません');
        }
        // $random_item を使用して結果を取得
        $b_style_result = $c_style[$random_item];
        $different_Style = $alternativeStyle[$random_item];
        return [$b_style_result, $alert_different, $different_Style];
    }
    
    
    
    
    // カジュアル系
    public function casual_match($selectedTopsStyle) {
        $c_style = null;
        $alternativeStyle = null;
        $alert_different = "";
        $different_Style = null;
        if ($selectedTopsStyle === 6 && !is_null($this->casual)) {
            $c_style = $this->casual;
            $random_item = $this->getRandomStyleIndex($this->casual);
        } elseif ($selectedTopsStyle === 6 && !is_null($this->street)) {
            $c_color = $this->street;
            $random_item = $this->getRandomStyleIndex($this->street);
        } elseif ($selectedTopsStyle === 6 && !is_null($this->natural)) {
            $c_color = $this->natural;
            $random_item = $this->getRandomStyleIndex($this->natural);
        } elseif ($selectedTopsStyle === 6 && is_null($this->natural)) {
            $alternativeStyle = null;
    
            for ($i = 1; $i <= 11; $i++) {
                $alternativeStyle = $this->getBottomsByStyle($i);
                $random_item = $this->getRandomColorIndex($alternativeStyle);
    
                // 見つかった場合、ループを終了
                if (!is_null($alternativeStyle)) {
                    $alert_different = "似合う系統ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う系統がありません');
        }
        // $random_item を使用して結果を取得
        $b_style_result = $c_style[$random_item];
        $different_Style = $alternativeStyle[$random_item];
        return [$b_style_result, $alert_different, $different_Style];
    }
    
    
    
    
    // 可愛い系
    public function cute_match($selectedTopsStyle) {
        $c_style = null;
        $alternativeStyle = null;
        $alert_different = "";
        $different_Style = null;
        if ($selectedTopsStyle === 7 && !is_null($this->cute)) {
            $c_style = $this->cute;
            $random_item = $this->getRandomStyleIndex($this->cute);
        } elseif ($selectedTopsStyle === 7 && !is_null($this->boyish)) {
            $c_color = $this->boyish;
            $random_item = $this->getRandomStyleIndex($this->boyish);
        } elseif ($selectedTopsStyle === 7 && !is_null($this->sports)) {
            $c_color = $this->sports;
            $random_item = $this->getRandomStyleIndex($this->sports);
        } elseif ($selectedTopsStyle === 7 && is_null($this->sports)) {
            $alternativeStyle = null;
    
            for ($i = 1; $i <= 11; $i++) {
                $alternativeStyle = $this->getBottomsByStyle($i);
                $random_item = $this->getRandomColorIndex($alternativeStyle);
    
                // 見つかった場合、ループを終了
                if (!is_null($alternativeStyle)) {
                    $alert_different = "似合う系統ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う系統がありません');
        }
        // $random_item を使用して結果を取得
        $b_style_result = $c_style[$random_item];
        $different_Style = $alternativeStyle[$random_item];
        return [$b_style_result, $alert_different, $different_Style];
    }
    
    
    
    // フォーマル系
    public function formal_match($selectedTopsStyle) {
        $c_style = null;
        $alternativeStyle = null;
        $alert_different = "";
        $different_Style = null;
        if ($selectedTopsStyle === 8 && !is_null($this->formal)) {
            $c_style = $this->formal;
            $random_item = $this->getRandomStyleIndex($this->formal);
        } elseif ($selectedTopsStyle === 8 && !is_null($this->mode)) {
            $c_color = $this->mode;
            $random_item = $this->getRandomStyleIndex($this->mode);
        } elseif ($selectedTopsStyle === 8 && !is_null($this->natural)) {
            $c_color = $this->natural;
            $random_item = $this->getRandomStyleIndex($this->natural);
        } elseif ($selectedTopsStyle === 8 && is_null($this->natural)) {
            $alternativeStyle = null;
    
            for ($i = 1; $i <= 11; $i++) {
                $alternativeStyle = $this->getBottomsByStyle($i);
                $random_item = $this->getRandomColorIndex($alternativeStyle);
    
                // 見つかった場合、ループを終了
                if (!is_null($alternativeStyle)) {
                    $alert_different = "似合う系統ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う系統がありません');
        }
        // $random_item を使用して結果を取得
        $b_style_result = $c_style[$random_item];
        $different_Style = $alternativeStyle[$random_item];
        return [$b_style_result, $alert_different, $different_Style];
    }
    
    
    
    
    
    
    // モード系
    public function mode_match($selectedTopsStyle) {
        $c_style = null;
        $alternativeStyle = null;
        $alert_different = "";
        $different_Style = null;
        if ($selectedTopsStyle === 9 && !is_null($this->mode)) {
            $c_style = $this->mode;
            $random_item = $this->getRandomStyleIndex($this->mode);
        } elseif ($selectedTopsStyle === 9 && !is_null($this->formal)) {
            $c_color = $this->formal;
            $random_item = $this->getRandomStyleIndex($this->formal);
        } elseif ($selectedTopsStyle === 9 && !is_null($this->natural)) {
            $c_color = $this->natural;
            $random_item = $this->getRandomStyleIndex($this->natural);
        } elseif ($selectedTopsStyle === 9 && is_null($this->natural)) {
            $alternativeStyle = null;
    
            for ($i = 1; $i <= 11; $i++) {
                $alternativeStyle = $this->getBottomsByStyle($i);
                $random_item = $this->getRandomColorIndex($alternativeStyle);
    
                // 見つかった場合、ループを終了
                if (!is_null($alternativeStyle)) {
                    $alert_different = "似合う系統ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う系統がありません');
        }
        // $random_item を使用して結果を取得
        $b_style_result = $c_style[$random_item];
        $different_Style = $alternativeStyle[$random_item];
        return [$b_style_result, $alert_different, $different_Style];
    }
    
    
    
    
    // ボーイッシュ系
    public function boyish_match($selectedTopsStyle) {
        $c_style = null;
        $alternativeStyle = null;
        $alert_different = "";
        $different_Style = null;
        if ($selectedTopsStyle === 10 && !is_null($this->boyish)) {
            $c_style = $this->boyish;
            $random_item = $this->getRandomStyleIndex($this->boyish);
        } elseif ($selectedTopsStyle === 10 && !is_null($this->street)) {
            $c_color = $this->street;
            $random_item = $this->getRandomStyleIndex($this->street);
        } elseif ($selectedTopsStyle === 10 && !is_null($this->casual)) {
            $c_color = $this->casual;
            $random_item = $this->getRandomStyleIndex($this->casual);
        } elseif ($selectedTopsStyle === 10 && is_null($this->casual)) {
            $alternativeStyle = null;
    
            for ($i = 1; $i <= 11; $i++) {
                $alternativeStyle = $this->getBottomsByStyle($i);
                $random_item = $this->getRandomColorIndex($alternativeStyle);
    
                // 見つかった場合、ループを終了
                if (!is_null($alternativeStyle)) {
                    $alert_different = "似合う系統ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う系統がありません');
        }
        // $random_item を使用して結果を取得
        $b_style_result = $c_style[$random_item];
        $different_Style = $alternativeStyle[$random_item];
        return [$b_style_result, $alert_different, $different_Style];
    }
    
    
    
    
    
    
    
    // ドラッド系
    public function dorad_match($selectedTopsStyle) {
        $c_style = null;
        $alternativeStyle = null;
        $alert_different = "";
        $different_Style = null;
        if ($selectedTopsStyle === 11 && !is_null($this->drat)) {
            $c_style = $this->drat;
            $random_item = $this->getRandomStyleIndex($this->drat);
        } elseif ($selectedTopsStyle === 11 && !is_null($this->formal)) {
            $c_color = $this->formal;
            $random_item = $this->getRandomStyleIndex($this->formal);
        } elseif ($selectedTopsStyle === 11 && !is_null($this->old_clothes)) {
            $c_color = $this->old_clothes;
            $random_item = $this->getRandomStyleIndex($this->old_clothes);
        } elseif ($selectedTopsStyle === 11 && !is_null($this->natural)) {
            $c_color = $this->natural;
            $random_item = $this->getRandomStyleIndex($this->natural);
        } elseif ($selectedTopsStyle === 11 && is_null($this->natural)) {
            $alternativeStyle = null;
    
            for ($i = 1; $i <= 11; $i++) {
                $alternativeStyle = $this->getBottomsByStyle($i);
                $random_item = $this->getRandomColorIndex($alternativeStyle);
    
                // 見つかった場合、ループを終了
                if (!is_null($alternativeStyle)) {
                    $alert_different = "似合う系統ではないよ";
                    break;
                }
            }
        } else {
            throw new \Exception('似合う系統がありません');
        }
        // $random_item を使用して結果を取得
        $b_style_result = $c_style[$random_item];
        $different_Style = $alternativeStyle[$random_item];
        return [$b_style_result, $alert_different, $different_Style];
    }
    
    
    // 実際にトップスのカラーを取得する処理
    public function getSelectedStyle($getstyle){
        switch($getstyle){
            
            case 1:
                $this->natural_match($getstyle);
            break;
            
            case 2:
                $this->street_match($getstyle);
            break;
            
            case 3:
                $this->old_clothes_match($getstyle);
            break;
            
            case 4:
                $this->sports_match($getstyle);
            break;
            
            case 5:
                $this->rock_match($getstyle);
            break;
            
            case 6:
                $this->casual_match($getstyle);
            break;
            
            case 7:
                $this->cute_match($getstyle);
            break;
            
            case 8:
                $this->formal_match($getstyle);
            break;
            
            case 9:
                $this->mode_match($getstyle);
            break;
            
            case 10:
                $this->boyish_match($getstyle);
            break;
            
            case 11:
                $this->dorad_match($getstyle);
            break;
            
           
        }
    }
    
}