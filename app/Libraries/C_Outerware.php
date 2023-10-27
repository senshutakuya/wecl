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

 
class C_Outerware
{
    private $o_color;
    private $c_botms;
    private $o_style;
    private $Outerware_result_array;
    private $request;
    private $outfit;
    private $Botms_result_one;
    private $Botms_result_two;

    public function __construct(){
        $this->o_color = new C_Outerware_Color();
        $this->o_style = new C_Outerware_Style();
        $this->c_botms = new C_Botms();
        $this->o_style_style = new C_Outerware_Style();
        $this->request = new HttpRequest();
        $this->outfit = new Outfit();
        $this->Outerware_result_array =[];
        $this->Botms_result_one = null;
        $this->Botms_result_two = null;
    }
    
    public function combination_with_botms($test){
        
        // dd($test);
        // dd($test[0]);
        // $Botms_result = $this->get_tops->random_tops( $this->request , $this->outfit ,  $this->c_tops); // 例: 選択したtopsを取得
        $Botms_result = $test;
        // dd($Botms_result,count($Botms_result));
        $B_length = count($Botms_result);
        
        if($B_length === 4){
            if(is_array($Botms_result)) {
                $this->Botms_result_one = $Botms_result[0];
                
                $this->Botms_result_two = $Botms_result[2];
            }else{
                if($Botms_result !== null) {
                    // $Botms_result が少なくとも1つ以上の要素を持つ場合
                    $this->Botms_result_one = $Botms_result;
                    $this->Botms_result_two = null;
                } else {
                    return "ボトムスの結果がどっちもない";
                }
                
            }
        }else{
            if(is_array($Botms_result)) {
                $this->Botms_result_one = $Botms_result[0];
                
                $this->Botms_result_two = null;
            }else{
                if($Botms_result !== null) {
                    // $Botms_result が少なくとも1つ以上の要素を持つ場合
                    $this->Botms_result_one = $Botms_result;
                    $this->Botms_result_two = null;
                } else {
                    return "ボトムスの結果がどっちもない";
                }
                
            }
        }
        
        
        
        // dd($Botms_result,$Botms_result[0],$Botms_result[1],$this->Botms_result_one,$this->Botms_result_two);
        // dd($Botms_result,$this->Botms_result_one,$this->Botms_result_two);
        if($B_length === 4){
            if($Botms_result[0] !== null && $Botms_result[2] !== null){
                $Botms_colorResult = $this->Botms_result_one->color_id; // 例: 選択したカラーを取得
                $Botms_styleResult = $this->Botms_result_two->style_id; // 例: 選択したスタイルを取得
            }
            elseif($this->Botms_result_one !== null && $this->Botms_result_two === null){
                $Botms_colorResult = $this->Botms_result_one->color_id; // 例: 選択したカラーを取得
                $this->Botms_result_two = 400;
                $Botms_styleResult = 400; // 例: 選択したスタイルを取得
            }
            elseif($this->Botms_result_one === null && $this->Botms_result_two !== null){
                       // dd($Botms_colorResult);
                // dd($Botms_colorResult);
                $this->Botms_result_one = 400;
                $Botms_colorResult = 400; // 例: 選択したカラーを取得
                
                $Botms_styleResult = $this->Botms_result_two->style_id; // 例: 選択したスタイルを取得
            }else{
                return "ボトムスの結果がどっちもない";
            }
        }
        else{
            $Botms_colorResult = $this->Botms_result_one->color_id; // 例: 選択したカラーを取得
            $this->Botms_result_two = 400;
            $Botms_styleResult = 400; // 例: 選択したスタイルを取得
        }
        
 
        
        // まずセレクトボトムスという配列にcolorとstyleの結果を入れる
        // セレクトボトムス[0]はcolor[1]はstyle
        // dd($Botms_colorResult,$Botms_styleResult);
        if(is_string($Botms_colorResult)){
            $Outerware_result[0] = $Botms_colorResult;
        }
        else{
            $Outerware_result[0] = $this->o_color->getSelectedColor($Botms_colorResult);
        }
        // dd($this->Botms_result_two);
        // dd($Botms_result,$Botms_colorResult,$Botms_styleResult);
        // dd($this->o_style->getSelectedStyle($Botms_styleResult));
        // dd($Botms_styleResult);
        if(is_string($Botms_styleResult)) {
            $Outerware_result[1] = $Botms_styleResult;
        }else{
            $Outerware_result[1] = $this->o_style->getSelectedStyle($Botms_styleResult);
        }
        
        
        $colorResult = $Outerware_result[0];
        $styleResult = $Outerware_result[1];
        
        // dd($colorResult,$styleResult);
        // dd($Outerware_result[0]);
        // dd($Botms_colorResult);
        // dd($Botms_result);
        // dd($this->c_color->getSelectedColor(1));

        // もしcolorとstyleがどちらもあって且つidが同じものなら
        if($colorResult !== "colorのボトムスがない" && $styleResult !== "styleのボトムスがない"){
            // dd($colorResult[0]);
            if( $colorResult[0]->id === $styleResult[0]->id){
            // オススメとしてボトムスを１つ表示する
            $recommendedOuterware = $this->selectRecommendedOuterware($colorResult, $styleResult);
            return $recommendedOuterware;
            }
             // もしcolorとstyleがどちらもあるが、どちらも違う場合
            elseif($colorResult[0]->id !== $styleResult[0]->id){
                // for文で2つの異なるボトムスを表示する
                $differentOuterware = $this->selectDifferentOuterware($colorResult, $styleResult);
                // dd($differentOuterware);
                return $differentOuterware;
            }
        }
        
        elseif($colorResult !== "colorのボトムスがない" && $styleResult === "styleのボトムスがない"){
           // カラーに合ったボトムスを表示
            $colorMatchedOuterware = $this->selectOuterwareByColor($colorResult);
            return $colorMatchedOuterware;
        }
        
        elseif($colorResult === "colorのボトムスがない" && $styleResult !== "styleのボトムスがない"){
           // スタイルに合ったボトムスを表示
            $styleMatchedOuterware = $this->selectOuterwareByStyle($styleResult);
            return $styleMatchedOuterware;
        }
        
        else {
            throw new \Exception('似合う服がありません、追加してください');
        }
        
        // dd($recommendedOuterware , $colorMatchedOuterware, $styleMatchedOuterware);
        
    }

    // 以下は追加のメソッド例です

    private function selectRecommendedOuterware($color, $style){
        // 推奨のボトムスを選択するロジックを実装
        // 例: $color と $style に基づいてボトムスを取得
        return [$color[0],$color[1]];
    }

    private function selectDifferentOuterware($color, $style){
        // 異なるボトムスを2つ選択するロジックを実装
        return [$color[0],$color[1],$style[0],$style[1]];
    }

    private function selectOuterwareByColor($color){
        // カラーに合ったボトムスを選択するロジックを実装
        return [$color[0],$color[1]];
    }

    private function selectOuterwareByStyle($style){
        // スタイルに合ったボトムスを選択するロジックを実装
        return [$style[0],$style[1]];
    }
}
