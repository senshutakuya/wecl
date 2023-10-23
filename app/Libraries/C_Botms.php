<?php

namespace App\Libraries;


use Illuminate\Http\Request;
use App\Models\Tops;
use App\Models\Part;
use App\Models\Outfit;
use Illuminate\Http\Request as HttpRequest;;
use Cloudinary;
use App\Libraries\C_Tops;
use App\Libraries\C_Botms_Color;
use App\Libraries\C_Style;
use App\Libraries\Get_Tops;

 
class C_Botms
{
    private $c_color;
    private $c_tops;
    private $c_style;
    private $get_tops;
    private $Tops_result_array;
    private $request;
    private $outfit;

    public function __construct(){
        $this->c_color = new C_Botms_Color();
        $this->c_tops = new C_Tops();
        $this->c_style = new C_Botms_Style();
        $this->get_tops = new Get_Tops();
        $this->request = new HttpRequest();
        $this->outfit = new Outfit();
        $this->Tops_result_array =[];
    }
    
    public function combination_with_tops($test){
        // $Tops_result = $this->get_tops->random_tops( $this->request , $this->outfit ,  $this->c_tops); // 例: 選択したtopsを取得
        $Tops_result = $test;
        // dd($Tops_result);
        $Tops_colorResult = $Tops_result[0]->color_id; // 例: 選択したカラーを取得
        // dd($Tops_colorResult);
        $Tops_styleResult = $Tops_result[0]->style_id; // 例: 選択したスタイルを取得
        
        // まずセレクトボトムスという配列にcolorとstyleの結果を入れる
        // セレクトボトムス[0]はcolor[1]はstyle
        $Botms_result[0] = $this->c_color->getSelectedColor($Tops_colorResult);
        $Botms_result[1] = $this->c_style->getSelectedStyle($Tops_styleResult);
        
        $colorResult = $Botms_result[0];
        $styleResult = $Botms_result[1];
        // dd($Tops_colorResult);
        dd($Tops_result);
        dd($this->c_color->getSelectedColor(1));

        // もしcolorとstyleがどちらもあって且つidが同じものなら
        if(!is_null($colorResult) && !is_null($styleResult) && $colorResult === $styleResult){
            // オススメとしてボトムスを１つ表示する
            $recommendedBottoms = $this->selectRecommendedBottoms($colorResult, $styleResult);
            return $recommendedBottoms;
        }
        // もしcolorとstyleがどちらもあるが、どちらも違う場合
        elseif(!is_null($colorResult) && !is_null($styleResult) && $colorResult !== $styleResult){
            // for文で2つの異なるボトムスを表示する
            $differentBottoms = $this->selectDifferentBottoms($colorResult, $styleResult);
            return $differentBottoms;
        }
        // もしどちらかひとつなら
        elseif(!is_null($colorResult) && is_null($styleResult)){
            // カラーに合ったボトムスを表示
            $colorMatchedBottoms = $this->selectBottomsByColor($colorResult);
            return $colorMatchedBottoms;
        }
        // もしどちらかひとつなら
        elseif(is_null($colorResult) && !is_null($styleResult)){
            // スタイルに合ったボトムスを表示
            $styleMatchedBottoms = $this->selectBottomsByStyle($styleResult);
            return $styleMatchedBottoms;
        } else {
            throw new \Exception('似合う服がありません、追加してください');
        }
        
        return[$recommendedBottoms , $colorMatchedBottoms, $styleMatchedBottoms];
    }

    // 以下は追加のメソッド例です

    private function selectRecommendedBottoms($color, $style){
        // 推奨のボトムスを選択するロジックを実装
        // 例: $color と $style に基づいてボトムスを取得
        return $color;
    }

    private function selectDifferentBottoms($color, $style){
        // 異なるボトムスを2つ選択するロジックを実装
        return [$color,$style];
    }

    private function selectBottomsByColor($color){
        // カラーに合ったボトムスを選択するロジックを実装
        return $colorResult;
    }

    private function selectBottomsByStyle($style){
        // スタイルに合ったボトムスを選択するロジックを実装
        return $style;
    }
}
