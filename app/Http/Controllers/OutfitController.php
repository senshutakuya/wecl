<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Outfit;
use App\Models\User;
// use App\Models\Category;
use App\Models\Gender;
use App\Models\Season;
use App\Models\Style;
use App\Models\Part;
use App\Models\Length;
use App\Models\Size;
use App\Models\Color;
use App\Models\Tops;
use App\Models\Botms;
use App\Models\Dores;
use App\Models\Outerware;
use App\Models\Accessory;
use App\Models\Shoes;
use App\Models\Overlap;
use App\Models\Impression;
use Cloudinary;
use App\Libraries\C_Tops;
use App\Libraries\C_Botms; 
use App\Libraries\C_Botms_Color;
use App\Libraries\C_Botms_style;
use App\Libraries\Get_Tops; 

/**
 * Post一覧を表示する
 * 
 * @param Outfit $outfit Outfitモデル
 * @return array Outfitモデルリスト
 */
 
class OutfitController extends Controller{
    
    
    private $client;
    
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }
    
    
    
    public function home(Outfit $outfit)
    {
        return view('outfits.index', ['outfits' => $outfit->get()]);
        // outfitsフォルダのindex.blade.phpを表示
       //blade内で使う変数'outfits'と設定。'outfits'の中身にgetを使い、インスタンス化した$outfitを代入。
    }
    
    
    public function logout(Request $request)
    {
        // ユーザーをログアウトする処理を実装
        // 例: セッションからユーザー情報を削除
        $request->session()->forget('user');
        // dd($aaa);
        // ログアウト後のリダイレクト
        return view('auth.register');
    }
    
    // 服の追加
    public function upload(Gender $gender, Season $season, Style $style, Part $part, Length $length, Size $size, Tops $tops, Botms $botms, Dores $dores, Outerware $outerware, Accessory $accessory, Shoes $shoes, Overlap $overlap, Impression $impression, Color $color)
    {
        
        return view('outfits.upload')->with([
            // 'categories' => $category->get(),
            'genders' => $gender->get(),
            'seasons' => $season->get(),
            'styles' => $style->get(),
            'parts' => $part->get(),
            'lengths' => $length->get(),
            'sizes' => $size->get(),
            'impressions' => $impression->get(),
            'tops' => $tops->get(),
            'botms' => $botms->get(),
            'dores' => $dores->get(),
            'outerwares' => $outerware->get(),
            'accessories' => $accessory->get(),
            'shoes' => $shoes->get(),
            'overlaps' => $overlap->get(),
            'colors' => $color->get(),
            
        ]);
    }
    
    public function cloth_list()
    {
        // 他の処理...
        // dd($aaa);
    
        // clothes_list.blade.php ビューを表示
        return view('outfits.clothes_list');
    }

    
    public function add(Request $request){
        $requestData = $request->all();

        // 取得したデータを表示
        // dd($requestData);
        // 前面の元のファイル名を取得
        
        $front_name = Cloudinary::upload($request->file('front_upfile_camera')->getRealPath())->getSecurePath();
        $back_name = Cloudinary::upload($request->file('front_upfile_camera')->getRealPath())->getSecurePath();
        // dd($image_url); 
        
        // $front_originalNameCamera = $request->file('front_upfile_camera')->getClientOriginalName();
        // dd($front_originalNameCamera);
        // 後面の元のファイル名を取得
        // $back_originalNameCamera = $request->file('back_upfile_camera')->getClientOriginalName();
        // dd($back_originalNameCamera);
        // Outfitモデルをインスタンス化
        $outfit = new Outfit();
    
        // ここで画像の保存などの処理を行います
        // ファイル名の生成やファイルの移動などを行います
    
        // 例：ファイル名の生成
        // $front_name = date('Ymd_His').'_front_'.$front_originalNameCamera;
        // $back_name = date('Ymd_His').'_back_'.$back_originalNameCamera;
    
        // ファイルの保存
        // $request->file('front_upfile_camera')->move('storage/images', $front_name);
        // $request->file('back_upfile_camera')->move('storage/images', $back_name);
    
        // その他のデータベースへの保存処理を行います
        
        // $gender_id
        
        // $gender_id = request()->input('gender');
        $genderData = json_decode($request->input('post.gender_id'));
        $genderId = $genderData->id;
        // dd($genderId);
        
        
        
        // $season_id

        $seasonData = json_decode($request->input('post.season_id'));
        $seasonId = $seasonData->id;
        // dd($seasonId);
        
        
        // $style_id

        $styleData = json_decode($request->input('post.style_id'));
        $styleId = $styleData->id;
        // dd($seasonId);
        
        // part_id
        $partData = json_decode($request->input('post.part_id'));
        $partId = $partData->id;
        // dd($partId);
        
        // length_id
        $lengthData = json_decode($request->input('post.length_id'));
        $lengthId = $lengthData->id;
        // dd($lengthId);
        // size_id
        $sizeData = json_decode($request->input('post.size_id'));
        $sizeId = $sizeData->id;
        // dd($sizeId);
        // category_id
        $A_array_categoryData = json_decode($request->input('post.category_id'), true);
        
        $categoryData = json_decode($request->input('post.category_id'));

        $categoryKeys = array_keys($A_array_categoryData);
        
        // デバッグでキーを出力
        // dd($categoryKeys[1]);
        
        switch ($categoryKeys[1]) {
            case 'tops':
                $tops_Id = $categoryData->id;
                $outfit->tops_id = $tops_Id;
                break;
        
            case 'botms':
                $botms_Id = $categoryData->id;
                $outfit->botms_id = $botms_Id;
                break;
        
            case 'dores':
                $dores_Id = $categoryData->id;
                $outfit->dores_id = $dores_Id;
                break;
                
            case 'outerware':
                $outerware_Id = $categoryData->id;
                $outfit->outerware_id = $outerware_Id;
                break;
            
            case 'accessory':
                $accessory_Id = $categoryData->id;
                $outfit->accessory_id = $accessory_Id;
                break;
                
            case 'shoes':
                $shoes_Id = $categoryData->id;
                $outfit->shoes_id = $shoes_Id;
                break;
            
            case 'overlap':
                $overlap_Id = $categoryData->id;
                $outfit->overlap_id = $overlap_Id;
                break;
        
            // 他のケースも同様に追加する
        
            default:
                // デフォルトの処理
                break;
        }


        // if($categoryData->)
        
        // dd($categoryId);
        // impression_id
        // impression_id
        $impressionData = json_decode($request->input('post.impression_id'));

        // dd($impressionId);
        $impressionId = $impressionData->id;
        // dd($impressionId);
        
        // color_id
        $colorData = json_decode($request->input('post.color_id'));
        $colorId = $colorData->id;
        
        // dd($front_name,$back_name);

            
        $outfit->front_image_path = $front_name;
        $outfit->back_image_path = $back_name;
        $outfit->gender_id = $genderId;
        $outfit->season_id = $seasonId;
        $outfit->style_id = $styleId;
        $outfit->part_id = $partId;
        $outfit->length_id = $lengthId;
        $outfit->size_id = $sizeId;
        // $outfit->category_id = $categoryId;
        $outfit->impression_id = $impressionId;
        $outfit->color_id = $colorId;
            
        // データベースに保存
        $outfit->save();
        // 画像をアップするページに戻る
        return back()->with('message', '画像を保存しました');
    }
    
    
    public function coordinate(){

        // 表示するページの処理
        return view('outfits.coordinate');
    }
    
    
    
    public function coordinate_gen(Outfit $outfit , Request $request , C_Tops $c_tops ,C_Botms $c_botms , C_Botms_Color $c_botms_color){
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
        $c_botms = new C_Botms();
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
        // dd($weatherData);
        // 最低気温
        $minTemperature = $weatherData['main']['temp_min'];
        $minTemperature = $minTemperature*100;
        // dd($minTemperature);
        
        // 最高気温
        $maxTemperature = $weatherData['main']['temp_max'];
        
        // 雨が降るか
        $weather_info = $weatherData['weather'][0]['description'];
        
        // dd($weather_info,$minTemperature);
        
        
        


        
        // dd($minTemperature,$maxTemperature,$weather_info);
        
        
        switch($weather_info){
            case '晴天':
                // outfitsテーブルのdiscriptionに日焼けしないようにしましょうとかく
                //     最低気温が20度以上なら
                if($minTemperature >= 2000){
                    // 		トップス半袖
                    $test = $c_tops->degrees_over_20();
                    // 		トップスの条件式
                    // もしトップスが選ばれたら                
                    if(!is_null($test)){
                        // switch()
                        $botms_test = $c_botms_color->combination_with_tops();
                    }
                }
                    
                // 	最低気温が16度以上なら
                elseif($minTemperature >= 1600 && $minTemperature <= 1999){
                    // 		アウターはなし
                    $test = $c_tops->degrees_over_16();
                    
                    if(!is_null($test)){
                        // switch()
                        dd($test[0][14]);
                    }
                }
                    
                
                
                // 最低気温が15度以下なら	
                elseif($minTemperature <= 1599){
                    $test = $c_tops->degrees_under_15();
                    
                    if(!is_null($test)){
                        // switch()
                        dd($test[0][14]);
                    }
                    // 		アウターをつける
                    // 		アウターの条件式
                }


                
                break;
            case '雨':
                
                if($minTemperature >= 2000){
                    // 		トップス半袖
                    $test = $c_tops->degrees_over_20();
                    // 		トップスの条件式
                    if(!is_null($test)){
                        // switch()
                        dd($test[0][14]);
                    }
                }
                    
                // 	最低気温が16度以上なら
                elseif($minTemperature >= 1600 && $minTemperature <= 1999){
                    // 		アウターはなし
                    $test = $c_tops->degrees_over_16();
                    
                    if(!is_null($test)){
                        // switch()
                        dd($test[0][14]);
                    }
                }
                    
                
                
                // 最低気温が15度以下なら	
                elseif($minTemperature <= 1599){
                    $test = $c_tops->degrees_under_15();
                    
                    if(!is_null($test)){
                        // switch()
                        dd($test[0][14]);
                    }
                    
                    // 		アウターをつける
                    // 		アウターの条件式
                }
                // outfitsテーブルのdiscriptionに傘を持っていきましょうとかく
                break;
                
            case '小雨':
                
                if($minTemperature >= 2000){
                    // 		トップス半袖
                    $test = $c_tops->degrees_over_20();
                    // 		トップスの条件式
                    if(!is_null($test)){
                        // switch()
                        dd($test[0][14]);
                    }
                }
                    
                // 	最低気温が16度以上なら
                elseif($minTemperature >= 1600 && $minTemperature <= 1999){
                    // 		アウターはなし
                    $test = $c_tops->degrees_over_16();
                    
                    if(!is_null($test)){
                        // switch()
                        dd($test[0][14]);
                    }
                }
                    
                
                
                // 最低気温が15度以下なら	
                elseif($minTemperature <= 1599){
                    $test = $c_tops->degrees_under_15();
                    
                    if(!is_null($test)){
                        // switch()
                        dd($test[0][14]);
                    }
                    
                    // 		アウターをつける
                    // 		アウターの条件式
                }
                // outfitsテーブルのdiscriptionに傘を持っていきましょうとかく
                break;
                
            case '曇りがち':
                
                if($minTemperature >= 2000){
                    // 		トップス半袖
                    $test = $c_tops->degrees_over_20();
                    
                    // dd($test);
                    // 		トップスの条件式
                    if(!is_null($test)){
                        
                        $test_botms = $c_botms->combination_with_tops($test);
                        dd($test_botms);
                        // switch()
                        // dd($test[0][14]);
                    }
                }
                    
                // 	最低気温が16度以上なら
                elseif($minTemperature >= 1600 && $minTemperature <= 1999){
                    // 		アウターはなし
                    $test = $c_tops->degrees_over_16();
                    
                    if(!is_null($test)){
                        // switch()
                        // dd($test[0][14]);
                        $botms_test = $c_botms->combination_with_tops($test);
                        dd($botms_test);
                    }
                    
                }
                    
                
                
                // 最低気温が15度以下なら	
                elseif($minTemperature <= 1599){
                    $test = $c_tops->degrees_under_15();
                    
                    if(!is_null($test)){
                        // switch()
                        dd($test[0][14]);
                    }
                    // 		アウターをつける
                    // 		アウターの条件式
                }
                // outfitsテーブルのdiscriptionに今日は曇りですとかく
                break;
                
                
            case '厚い雲' :
                // outfitsテーブルのdiscriptionに日焼けしないようにしましょうとかく
                //     最低気温が20度以上なら
                if($minTemperature >= 2000){
                    // 		トップス半袖
                    $test = $c_tops->degrees_over_20();
                    // 		トップスの条件式
                    if(!is_null($test)){
                        // switch()
                        $botms_test = $c_botms->combination_with_tops($test);
                        dd($botms_test);
                    }
                }
                    
                // 	最低気温が16度以上なら
                elseif($minTemperature >= 1600 && $minTemperature <= 1999){
                    // 		アウターはなし
                    $test = $c_tops->degrees_over_16();
                    
                    if(!is_null($test)){
                        // switch()
                        // dd($test[0][14]);
                        $botms_test = $c_botms->combination_with_tops($test);
                    }
                }
                    
                
                
                // 最低気温が15度以下なら	
                elseif($minTemperature <= 1599){
                    $test = $c_tops->degrees_under_15();
                    
                    if(!is_null($test)){
                        // switch()
                        $botms_test = $c_botms->combination_with_tops($test);
                    }
                    // 		アウターをつける
                    // 		アウターの条件式
                }
                
            
            case '薄い雲' :
                // outfitsテーブルのdiscriptionに日焼けしないようにしましょうとかく
                //     最低気温が20度以上なら
                if($minTemperature >= 2000){
                    // 		トップス半袖
                    $test = $c_tops->degrees_over_20();
                    // 		トップスの条件式
                    if(!is_null($test)){
                        // switch()
                        $botms_test = $c_botms->combination_with_tops($test);
                    }
                    
                }
                    
                // 	最低気温が16度以上なら
                elseif($minTemperature >= 1600 && $minTemperature <= 1999){
                    // 		アウターはなし
                    $test = $c_tops->degrees_over_16();
                    
                    if(!is_null($test)){
                        // switch()
                        $botms_test = $c_botms->combination_with_tops($test);
                    }
                    
                }
                    
                
                
                // 最低気温が15度以下なら	
                elseif($minTemperature <= 1599){
                    $test = $c_tops->degrees_under_15();
                    
                    if(!is_null($test)){
                        // switch()
                        $botms_test = $c_botms->combination_with_tops($test);
                    }
                    
                    // 		アウターをつける
                    // 		アウターの条件式
                }
                
            case '雲' :
                // outfitsテーブルのdiscriptionに日焼けしないようにしましょうとかく
                //     最低気温が20度以上なら
                if($minTemperature >= 2000){
                    // 		トップス半袖
                    $test = $c_tops->degrees_over_20();
                    $test_botms = $c_botms->combination_with_tops($test);
                        dd($test_botms);
                    // 		トップスの条件式
                    if(!is_null($test)){
                        // switch()
                        $colorId = $test[0];
                        $test_botms = $c_botms->combination_with_tops($test);
                        dd($test_botms);
                        // dd($colorId->color_id);
                        
                    }
                    
                }
                    
                // 	最低気温が16度以上なら
                elseif($minTemperature >= 1600 && $minTemperature <= 1999){
                    // 		アウターはなし
                    $test = $c_tops->degrees_over_16();
                    $test_botms = $c_botms->combination_with_tops($test);
                        dd($test_botms);
                    
                    if(!is_null($test)){
                        // switch()
                        $test_botms = $c_botms->combination_with_tops($test);
                        dd($test_botms);
                    }
                    
                }
                    
                
                
                // 最低気温が15度以下なら	
                elseif($minTemperature <= 1599){
                    $test = $c_tops->degrees_under_15();
                    $test_botms = $c_botms->combination_with_tops();
                        dd($test_botms);
                    
                    if(!is_null($test)){
                        // switch()
                        // dd($test[0]);
                        $test_botms = $c_botms->combination_with_tops();
                        dd($test_botms);
                    }
                    
                    // 		アウターをつける
                    // 		アウターの条件式
                }
        }
        
        
            
        

        // 必要な情報を抽出して返す
        
        // 表示するページの処理
        return view('outfits.coordinate_gen')->with('outfit', $outfit->get());
    }

    
    
    


}

