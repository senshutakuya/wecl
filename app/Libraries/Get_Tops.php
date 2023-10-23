<?php

namespace App\Libraries;

use App\Models\Tops;
use App\Models\Part;
use App\Models\Outfit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Cloudinary;
use APP\Libraries\C_Tops;
use APP\Libraries\C_Botms_Color;
use APP\Libraries\C_Style;
class Get_Tops
{
    private $apiKey;
    
    public function random_tops(Request $request , Outfit $outfit , C_Tops $c_tops){
        // 前画像の表示処理
        // $front_image_path = json_decode($outfit->get('front_image_path'), true);
        
        // // 配列から要素を取得する
        // $frontImagePath = $front_image_path['front_image_path'];
        
        // dd($frontImagePath);
        // 54000d99cbc9d1a4d126abc2b3f7c5a7
        
        $outfit = new Outfit();
        
        $outfitWithPartId2 = $outfit->firstWhere([
            'part_id' => 1,
            'length_id' => 1
        ]);
        
        // dd($outfitWithPartId2);
        
        $c_tops = new C_Tops();
        // $test = $c_tops->degrees_over_20();
        // dd($c_tops);

        
        
        // OpenWeather APIキー
        $apiKey = '54000d99cbc9d1a4d126abc2b3f7c5a7';

        // 都市名をリクエストから取得
        $city = $request->input('city');

        // OpenWeather APIにリクエストを送信
        $response = Http::get("http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&lang=ja&units=metric");
        
        
        // レスポンスからJSONデータを取得
        $weatherData = $response->json();
        
        // 必要なデータを抽出
        dd($weatherData);
        // 最低気温
        $minTemperature = $weatherData['main']['temp_min'];
        // 最高気温
        $maxTemperature = $weatherData['main']['temp_max'];
        // 雨が降るか
        $weather_info = $weatherData['weather'][0]['description'];
        
        
        $tops_colorId = 0;
        $tops_styleId = 0;
        
        
        
        // dd($minTemperature,$maxTemperature,$weather_info);
        
        switch($weather_info){
                case '晴天':
                    // outfitsテーブルのdiscriptionに日焼けしないようにしましょうとかく
                    //     最低気温が20度以上なら
                    if($minTemperature >= 20){
                        // 		トップス半袖
                        $tops_info = $c_tops->degrees_over_20();
                        // 		トップスの条件式
                        // もしトップスが選ばれたら                
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('トップスがありません');
                        }
                    }
                        
                    // 	最低気温が16度以上なら
                    elseif($minTemperature >= 16 && $minTemperature <= 19){
                        // 		アウターはなし
                        $test = $c_tops->degrees_over_16();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('トップスがありません');
                        }
                    }
                        
                    
                    
                    // 最低気温が15度以下なら	
                    elseif($minTemperature <= 15){
                        $test = $c_tops->degrees_under_15();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('トップスがありません');
                        }
                    }
    
    
                    
                    break;
                case '雨':
                    
                    if($minTemperature >= 20){
                        // 		トップス半袖
                        $test = $c_tops->degrees_over_20();
                        // 		トップスの条件式
                       if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    // 	最低気温が16度以上なら
                    elseif($minTemperature >= 16 && $minTemperature <= 19){
                        // 		アウターはなし
                        $test = $c_tops->degrees_over_16();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    
                    
                    // 最低気温が15度以下なら	
                    elseif($minTemperature <= 15){
                        $test = $c_tops->degrees_under_15();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                        
                        // 		アウターをつける
                        // 		アウターの条件式
                    }
                    // outfitsテーブルのdiscriptionに傘を持っていきましょうとかく
                    break;
                    
                case '小雨':
                    
                    if($minTemperature >= 20){
                        // 		トップス半袖
                        $test = $c_tops->degrees_over_20();
                        // 		トップスの条件式
                       if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    // 	最低気温が16度以上なら
                    elseif($minTemperature >= 16 && $minTemperature <= 19){
                        // 		アウターはなし
                        $test = $c_tops->degrees_over_16();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    
                    
                    // 最低気温が15度以下なら	
                    elseif($minTemperature <= 15){
                        $test = $c_tops->degrees_under_15();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                        
                        // 		アウターをつける
                        // 		アウターの条件式
                    }
                    // outfitsテーブルのdiscriptionに傘を持っていきましょうとかく
                    break;
                    
                case '曇りがち':
                    
                    if($minTemperature >= 20){
                        // 		トップス半袖
                        $test = $c_tops->degrees_over_20();
                        // 		トップスの条件式
                       if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    // 	最低気温が16度以上なら
                    elseif($minTemperature >= 16 && $minTemperature <= 19){
                        // 		アウターはなし
                        $test = $c_tops->degrees_over_16();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    
                    
                    // 最低気温が15度以下なら	
                    elseif($minTemperature <= 15){
                        $test = $c_tops->degrees_under_15();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                        
                        // 		アウターをつける
                        // 		アウターの条件式
                    }
                    // outfitsテーブルのdiscriptionに傘を持っていきましょうとかく
                    break;
                    
                    
                case '厚い雲':
                    
                    if($minTemperature >= 20){
                        // 		トップス半袖
                        $test = $c_tops->degrees_over_20();
                        // 		トップスの条件式
                       if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    // 	最低気温が16度以上なら
                    elseif($minTemperature >= 16 && $minTemperature <= 19){
                        // 		アウターはなし
                        $test = $c_tops->degrees_over_16();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    
                    
                    // 最低気温が15度以下なら	
                    elseif($minTemperature <= 15){
                        $test = $c_tops->degrees_under_15();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                        
                        // 		アウターをつける
                        // 		アウターの条件式
                    }
                    // outfitsテーブルのdiscriptionに傘を持っていきましょうとかく
                    break;
                    
                
                case '薄い雲':
                    
                    if($minTemperature >= 20){
                        // 		トップス半袖
                        $test = $c_tops->degrees_over_20();
                        // 		トップスの条件式
                       if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    // 	最低気温が16度以上なら
                    elseif($minTemperature >= 16 && $minTemperature <= 19){
                        // 		アウターはなし
                        $test = $c_tops->degrees_over_16();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    
                    
                    // 最低気温が15度以下なら	
                    elseif($minTemperature <= 15){
                        $test = $c_tops->degrees_under_15();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                        
                        // 		アウターをつける
                        // 		アウターの条件式
                    }
                    // outfitsテーブルのdiscriptionに傘を持っていきましょうとかく
                    break;
                    
                case '雲':
                    
                    if($minTemperature >= 20){
                        // 		トップス半袖
                        $test = $c_tops->degrees_over_20();
                        // 		トップスの条件式
                       if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    // 	最低気温が16度以上なら
                    elseif($minTemperature >= 16 && $minTemperature <= 19){
                        // 		アウターはなし
                        $test = $c_tops->degrees_over_16();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    
                    
                    // 最低気温が15度以下なら	
                    elseif($minTemperature <= 15){
                        $test = $c_tops->degrees_under_15();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                        
                        // 		アウターをつける
                        // 		アウターの条件式
                    }
                    // outfitsテーブルのdiscriptionに傘を持っていきましょうとかく
                    break;
                
                default:
                    if($minTemperature >= 20){
                        // 		トップス半袖
                        $test = $c_tops->degrees_over_20();
                        // 		トップスの条件式
                       if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    // 	最低気温が16度以上なら
                    elseif($minTemperature >= 16 && $minTemperature <= 19){
                        // 		アウターはなし
                        $test = $c_tops->degrees_over_16();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                    }
                        
                    
                    
                    // 最低気温が15度以下なら	
                    elseif($minTemperature <= 15){
                        $test = $c_tops->degrees_under_15();
                        
                        if(!is_null($tops_info)){
                            // color_idを取得
                            $tops_colorId = $tops_info[0]->color_id;
                            // style_idを取得
                            $tops_styleId = $tops_info[0]->style_id;
                        }else {
                            // トップスが見つからない場合、例外をスローする
                            throw new \Exception('選択できるトップスがありません');
                        }
                        
                        // 		アウターをつける
                        // 		アウターの条件式
                    }
                    // outfitsテーブルのdiscriptionに傘を持っていきましょうとかく
                    break;
        }
        
        // トップスの選んだカラーとスタイルを表示
        return[$tops_colorId,$tops_styleId];
    }
}
