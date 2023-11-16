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
use App\Models\Starcode;
use Cloudinary;
use App\Libraries\C_Tops;
use App\Libraries\C_Botms; 
use App\Libraries\C_Botms_Color;
use App\Libraries\C_Botms_style;
use App\Libraries\C_Outerware;

/**
 * Post一覧を表示する
 * 
 * @param Outfit $outfit Outfitモデル
 * @return array Outfitモデルリスト
 */
 
class OutfitController extends Controller{
    
    
    private $client;
    private $user;
    
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
        $this->user = auth()->user();
    }
    
    
    
    public function home(Outfit $outfit)
    {
        return view('outfits.index', ['outfits' => $outfit->get()]);
        // outfitsフォルダのindex.blade.phpを表示
       //blade内で使う変数'outfits'と設定。'outfits'の中身にgetを使い、インスタンス化した$outfitを代入。
    }
    
    
    public function reload(Request $request){
        
        // dd($request);
        return redirect()->back();
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
    
    public function cloth_list(Part $part)
    {
        // 他の処理...
        // dd($aaa);
    
        // clothes_list.blade.php ビューを表示
        return view('outfits.clothes_list',['parts' => $part->get()]);
    }

    
    public function add(Request $request){
        $requestData = $request->all();
        
        $user = auth()->user();

        // 取得したデータを表示
        // dd($requestData);
        // 前面の元のファイル名を取得
        
        $front_name = Cloudinary::upload($request->file('front_upfile_camera')->getRealPath())->getSecurePath();
        $back_name = Cloudinary::upload($request->file('back_upfile_camera')->getRealPath())->getSecurePath();
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
        
        // dd($A_array_categoryData);
        
        $categoryData = json_decode($request->input('post.category_id'));

        $categoryKeys = array_keys($A_array_categoryData);
        
        // デバッグでキーを出力
        // dd($requestData);
        
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
        // dd($request->input('post.color_id'));
        $colorData = json_decode($request->input('post.color_id'));
        $colorId = $request->input('post.color_id');
        
        // dd($front_name,$back_name);

        $outfit->user_id = $user->id;
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
        
            // セッションからエラーメッセージを取得
        $errorMessage = session('error_message');
    
        // セッションからエラーメッセージを削除
        session()->forget('error_message');
    
        // ビューにエラーメッセージを渡して表示
        return view('outfits.coordinate', ['errorMessage' => $errorMessage]);


    }
    
    
    // ボタンを押されたらコーディネート処理
    public function coordinate_gen(Outfit $outfit , Request $request , C_Tops $c_tops ,C_Botms $c_botms , C_Botms_Color $c_botms_color ,C_Outerware $c_outerware){
        try {
        
            // 前画像の表示処理
            // $front_image_path = json_decode($outfit->get('front_image_path'), true);
            
            // // 配列から要素を取得する
            // $frontImagePath = $front_image_path['front_image_path'];
            
            // dd($frontImagePath);
            // 54000d99cbc9d1a4d126abc2b3f7c5a7
            
            $outfit = new Outfit();
            
            // dd($outfitWithPartId2);
            
            $c_tops = new C_Tops();
            $c_botms = new C_Botms();
            $c_outerware = new C_Outerware();
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
            
            $tops_data = null;
            $botms_data = null;
            $outerware_data = null;
            
    
    
            
            // dd($minTemperature,$maxTemperature,$weather_info);
            
            
            switch($weather_info){
                case '晴天':
                    // outfitsテーブルのdiscriptionに日焼けしないようにしましょうとかく
                        // 最低気温が20度以上なら
                    if($minTemperature >= 2000){
                        // 		トップス半袖
                        $tops_data = $c_tops->degrees_over_20();
                        
                        // dd($test);
                        // 		トップスの条件式
                        // もしトップスが選ばれたら                
                        if(!is_null($tops_data)){
                            // switch()
                            $botms_data = $c_botms->combination_with_tops($tops_data);
                        }
                        else{
                            return $alert = "服が無い";
                        }
                    }
                        
                    // 	最低気温が16度以上なら
                    elseif($minTemperature >= 1600 && $minTemperature <= 1999){
                        // 		アウターはなし
                        $tops_data = $c_tops->degrees_over_16();
                        
                        if(!is_null($tops_data)){
                            // switch()
                            $botms_data = $c_botms->combination_with_tops($tops_data);
                            // dd($botms_test);
                        }
                        else{
                            return $alert = "服が無い";
                        }
                    }
                        
                    
                    
                    // 最低気温が15度以下なら	
                    elseif($minTemperature <= 1599){
                        $tops_data = $c_tops->degrees_under_15();
                        
                        if(!is_null($tops_data)){
                            // switch()
                            $botms_data = $c_botms->combination_with_tops($tops_data);
                            // dd($botms_test);
                            // 		アウターをつける
                            if(!is_null($botms_data)){
                                // 		アウターの条件式
                                $outerware_data = $c_outerware->combination_with_botms($botms_data);
                                // dd($tops_data,$botms_data,$outerware_data);
                                
                            }
                            else{
                                break;
                            }
                        }
                        else{
                            return $alert = "服が無い";
                        }
                        
                    }
    
    
                    
                    break;
                case '雨':
                    
                    // outfitsテーブルのdiscriptionに日焼けしないようにしましょうとかく
                    //     最低気温が20度以上なら
                    if($minTemperature >= 2000){
                        // 		トップス半袖
                        $tops_data = $c_tops->degrees_over_20();
                        
                        // dd($test);
                        // 		トップスの条件式
                        // もしトップスが選ばれたら                
                        if(!is_null($tops_data)){
                            // switch()
                            $botms_data = $c_botms->combination_with_tops($tops_data);
                        }
                        else{
                            return $alert = "服が無い";
                        }
                    }
                        
                    // 	最低気温が16度以上なら
                    elseif($minTemperature >= 1600 && $minTemperature <= 1999){
                        // 		アウターはなし
                        $tops_data = $c_tops->degrees_over_16();
                        
                        if(!is_null($tops_data)){
                            // switch()
                            $botms_data = $c_botms->combination_with_tops($tops_data);
                            // dd($botms_test);
                        }
                        else{
                            return $alert = "服が無い";
                        }
                    }
                        
                    
                    
                    // 最低気温が15度以下なら	
                    elseif($minTemperature <= 1599){
                        $tops_data = $c_tops->degrees_under_15();
                        
                        if(!is_null($tops_data)){
                            // switch()
                            $botms_data = $c_botms->combination_with_tops($tops_data);
                            // dd($botms_test);
                            // 		アウターをつける
                            if(!is_null($botms_data)){
                                // 		アウターの条件式
                                $outerware_data = $c_outerware->combination_with_botms($botms_data);
                                // dd($botms_data,$outerware_data);
                            }
                            else{
                                break;
                            }
                            
                        }
                        else{
                            return $alert = "服が無い";
                        }
                        
                    }
    
    
                    
                    break;
                // それ以外
                default:
                    // outfitsテーブルのdiscriptionに日焼けしないようにしましょうとかく
                        // 最低気温が20度以上なら
                    if($minTemperature >= 2000){
                        // 		トップス半袖
                        $tops_data = $c_tops->degrees_over_20();
                        
                        // dd($test);
                        // 		トップスの条件式
                        // もしトップスが選ばれたら                
                        if(!is_null($tops_data)){
                            // switch()
                            $botms_data = $c_botms->combination_with_tops($tops_data);
                            
                            // dd($tops_data,$botms_data);
                        }
                        else{
                            return $alert = "服が無い";
                        }
                    }
                        
                    // 	最低気温が16度以上なら
                    elseif($minTemperature >= 1600 && $minTemperature <= 1999){
                        // 		アウターはなし
                        $tops_data = $c_tops->degrees_over_16();
                        
                        if(!is_null($tops_data)){
                            // switch()
                            $botms_data = $c_botms->combination_with_tops($tops_data);
                            // dd($botms_data);
                        }
                        else{
                            // dd($botms_data);
                            return $alert = "服が無い";
                        }
                    }
                        
                    
                    
                    // 最低気温が15度以下なら	
                    elseif($minTemperature <= 1599){
                        $tops_data = $c_tops->degrees_under_15();
                        // dd($tops_data);
                        
                        if(!is_null($tops_data)){
                            // switch()
                            $botms_data = $c_botms->combination_with_tops($tops_data);
                            // dd($botms_data);
                            
                            // dd($botms_test);
                            // 		アウターをつける
                            if(!is_null($botms_data)){
                                $outerware_data = $c_outerware->combination_with_botms($botms_data);
                                // dd($tops_data,$botms_data,$outerware_data);
                            }
                            else{
                                // dd($botms_data);
                                break;
                            }
                            
                                
                            // 		アウターの条件式
                        }
                        else{
                            // dd($tops_data);
                            return $alert = "服が無い";
                        }
                        
                    }
    
    
                    
                    break;
               
            }
            
            
                
            
    
            // 必要な情報を抽出して返す
            // dd($tops_data);
            
            // 表示するページの処理
            return view('outfits.coordinate_gen',['tops_data' => $tops_data,'botms_data' => $botms_data, 'outerware_data' => $outerware_data, 'weather_data' => $weatherData,  'mintemperature' => $minTemperature ]);
        } catch (\Exception $e) {
            // エラーメッセージを設定してエラーページを表示
            return redirect('/coordinate')->with('error_message', '指定された都市名が見つかりませんでした。');
        }
    }

    
    
    
    public function cordinate_save(Request $request){
        $requestData = $request->all();
        $user = auth()->user();

        // 取得したデータを表示
        // dd($requestData);
        
        // Starモデルをインスタンス化
        $star_code = new Starcode();

        if($request->select_botms === "one_botms") {
            $b_id = $request->one_botms_id;
            $b_frontimage = $request->one_botms_front;
            $b_backimage = $request->one_botms_back;
        }else{
            $b_id = $request->two_botms_id;
            $b_frontimage = $request->two_botms_front;
            $b_backimage = $request->two_botms_back;
        }
        
        if($request->select_outerware === "one_outerware") {
            $o_id = $request->one_outerware_id;
            $o_frontimage = $request->one_outerware_front;
            $o_backimage = $request->one_outerware_back;
        }else{
            $o_id = $request->two_outerware_id;
            $o_frontimage = $request->two_outerware_front;
            $o_backimage = $request->two_outerware_back;
        }
        
        


        // dd($front_name,$back_name);

        $star_code->user_id = $user->id;
        $star_code->t_id = $request->tops_id;
        $star_code->t_frontimage = $request->tops_front;
        $star_code->t_backimage = $request->tops_back;
        $star_code->b_id = $b_id;
        $star_code->b_frontimage = $b_frontimage;
        $star_code->b_backimage = $b_backimage;
        $star_code->o_id = $o_id;
        $star_code->o_frontimage = $o_frontimage;
        $star_code->o_backimage = $o_backimage;
        
        // dd($o_frontimage);
            
        // データベースに保存
        $star_code->save();
        // 画像をアップするページに戻る
        return view('outfits.coordinate');
    }
    
    
    public function list_tops (Outfit $outfit){
        $user = auth()->user();
        // dd($this->user);
        
        $tops_list = $outfit->where('part_id', 1)->where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(5);


        
        return view('outfits.tops_list',['tops_list' => $tops_list]);
        
    }
    
    
    public function list_botms (Outfit $outfit){
        $user = auth()->user();
        $botms_list = $outfit->where('part_id', 2)->where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(5);


        
        return view('outfits.botms_list',['botms_list' => $botms_list]);
        
    }
    
    
    public function list_outer (Outfit $outfit){
        $user = auth()->user();
        $outerware_list = $outfit->where('part_id', 3)->where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(5);


        
        return view('outfits.outerware_list',['outerware_list' => $outerware_list]);
        
    }
    
    
    public function list_dress (Outfit $outfit){
        $user = auth()->user();
        $dress_list = $outfit->where('part_id', 4)->where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(5);


        
        return view('outfits.dress_list',['dress_list' => $dress_list]);
        
    }
    
    
    public function list_accessory (Outfit $outfit){
        $user = auth()->user();
        $accessory_list = $outfit->where('part_id', 6)->where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(5);


        
        return view('outfits.accessory_list',['accessory_list' => $accessory_list]);
        
    }
    
    
    public function list_shoes (Outfit $outfit){
        $user = auth()->user();
        $shoes_list = $outfit->where('part_id', 7)->where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(5);


        
        return view('outfits.shoes_list',['shoes_list' => $shoes_list]);
        
    }
    
    
    public function list_headgear (Outfit $outfit){
        $user = auth()->user();
        $headgear_list = $outfit->where('part_id', 8)->where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(5);


        
        return view('outfits.headgear_list',['headgear_list' => $headgear_list]);
        
    }
    
    
    public function list_code (Starcode $star_code){
        
        // dd($this->user);
        $user = auth()->user();
        
        $code_list = $star_code->where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate(5);

        
        return view('outfits.code_list',['code_list' => $code_list]);
        
    }
    
    
    public function edit($post, Outfit $outfit, Request $request, Gender $gender, Season $season, Style $style, Part $part, Length $length, Size $size, Tops $tops, Botms $botms, Dores $dores, Outerware $outerware, Accessory $accessory, Shoes $shoes, Overlap $overlap, Impression $impression, Color $color){
        $user = auth()->user();
        // dd($post);
        $outfit = $outfit::where('user_id', $user->id)->where('id', $post);
        $outfit = $outfit->get();
        // $previous_id = $request->previous_data;
        // // dd($previous_id);
        // $previous = $outfit->where('id', $previous_id)->where('user_id', $user->id);
        // $tmp = $previous->get();
        // // dd($previous);
        // $previous_data = $tmp[0];
        // dd($post);
        return view('outfits.edit_clothing')->with([
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
            // 'previous_data' => $previous_data,
            // 'post' =>$post,
            'outfit' =>$outfit[0],
            
        ]);
        
    }
    
    public function update($post, Outfit $outfit, Request $request, Gender $gender, Season $season, Style $style, Part $part, Length $length, Size $size, Tops $tops, Botms $botms, Dores $dores, Outerware $outerware, Accessory $accessory, Shoes $shoes, Overlap $overlap, Impression $impression, Color $color) {
        $requestData = $request->all();
        
        // ユーザーを取得
        $user = auth()->user();
        // dd($post);
        // 前回のデータを取得
        $previous_data = $outfit::where('user_id', $user->id)->where('id', $post);
        $previous_data = $previous_data->get();
        $previous_data = $previous_data[0];
        // 新しい画像ファイルの処理
        if ($request->hasFile('front_upfile_camera')) {
            $front_name = Cloudinary::upload($request->file('front_upfile_camera')->getRealPath())->getSecurePath();
        } else {
            $front_name = $requestData["previous_front"];
        }
        
        if ($request->hasFile('back_upfile_camera')) {
            $back_name = Cloudinary::upload($request->file('back_upfile_camera')->getRealPath())->getSecurePath();
        } else {
            $back_name = $requestData["previous_back"];
        }
    
        // 各属性のデータを取得
        $genderData = json_decode($request->input('post.gender_id'));
        $genderId = $genderData->id;
    
        $seasonData = json_decode($request->input('post.season_id'));
        $seasonId = $seasonData->id;
    
        $styleData = json_decode($request->input('post.style_id'));
        $styleId = $styleData->id;
    
        $partData = json_decode($request->input('post.part_id'));
        $partId = $partData->id;
    
        $lengthData = json_decode($request->input('post.length_id'));
        $lengthId = $lengthData->id;
    
        $sizeData = json_decode($request->input('post.size_id'));
        $sizeId = $sizeData->id;
    
        // 他の属性についても同様に取得
    
        // カテゴリIDを取得
        $A_array_categoryData = json_decode($request->input('post.category_id'), true);
        $categoryData = json_decode($request->input('post.category_id'));
        $categoryKeys = array_keys($A_array_categoryData);
    
        // カテゴリに応じてIDを設定
        $tops_Id = null;
        $botms_Id = null;
        $outerware_Id = null;
        $accessory_Id = null;
        $shoes_Id = null;
        $overlap_Id = null;
        $dores_Id = null;
    
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
    
            // 他のカテゴリに応じた処理も追加
    
            default:
                // デフォルトの処理
                break;
        }
    
        // 印象IDを取得
        $impressionData = json_decode($request->input('post.impression_id'));
        $impressionId = $impressionData->id;
    
        // 色IDを取得
        $colorData = json_decode($request->input('post.color_id'));
        $colorId = $request->input('post.color_id');
    
        // データモデルに前回のデータを取得
        // $previous_data = Outfit::find($previous_data->id);
    
        if (!$previous_data) {
            return redirect()->back()->with('error', '指定されたデータが見つかりませんでした');
        }
    
        // dd($outfit->user_id);
        // dd($outfit);
        // フィールドごとにデータを比較し、変更があれば更新
        // フィールドごとにデータを比較し、変更があれば更新
        $previous_data->update([
            'user_id' => $user->id,
            'front_image_path' => $front_name != $previous_data->front_image_path ? $front_name : $previous_data->front_image_path,
            'back_image_path' => $back_name != $previous_data->back_image_path ? $back_name : $previous_data->back_image_path,
            'gender_id' => $genderId != $previous_data->gender_id ? $genderId : $previous_data->gender_id,
            'season_id' => $seasonId != $previous_data->season_id ? $seasonId : $previous_data->season_id,
            'style_id' => $styleId != $previous_data->style_id ? $styleId : $previous_data->style_id,
            'part_id' => $partId != $previous_data->part_id ? $partId : $previous_data->part_id,
            'length_id' => $lengthId != $previous_data->length_id ? $lengthId : $previous_data->length_id,
            'size_id' => $sizeId != $previous_data->size_id ? $sizeId : $previous_data->size_id,
            'tops_id' => $tops_Id !=$previous_data->tops_id ? $tops_Id : $previous_data->tops_id,
            'botms_id' => $botms_Id !=$previous_data->botms_id ? $botms_Id : $previous_data->botms_id,
            'dores_id' => $dores_Id !=$previous_data->dores_id ? $dores_Id : $previous_data->dores_id,
            'outerware_id' => $outerware_Id !=$previous_data->outerware_id ? $outerware_Id : $previous_data->outerware_id,
            'accessory_id' => $accessory_Id !=$previous_data->accessory_id ? $accessory_Id : $previous_data->accessory_id,
            'shoes_id' => $shoes_Id !=$previous_data->shoes_id ? $shoes_Id : $previous_data->shoes_id,
            'overlap_id' => $overlap_Id !=$previous_data->overlap_id ? $overlap_Id : $previous_data->overlap_id,
            // 他の属性についても同様に比較と更新を行う
            'impression_id' => $impressionId != $previous_data->impression_id ? $impressionId : $previous_data->impression_id,
            'color_id' => $colorId != $previous_data->color_id ? $colorId : $previous_data->color_id,
        ]);
        
        return redirect()->route('edit', ['post' => $previous_data->id])->with('success', 'データが更新されました');
    }
    
    
     public function delete(Outfit $outfit , $deletePost)
    {
        $user = auth()->user();
        $delete_list = $outfit->where('user_id', $user->id)->where('id', $deletePost)->first();
        // $outfit->delete();
        // dd($deletePost);
        // dd($delete_list);
        if ($delete_list) {
            $delete_list->delete();
        // レコードが存在すれば削除
        }   
        // モデルクラスのdelete関数を使う事で簡単に消せる
        return redirect('/list');
        // /にリダイレクト処理
    }
    
    public function delete_code(Starcode $starcode , $deletePost)
    {
        $user = auth()->user();
        $delete_list = $starcode->where('user_id', $user->id)->where('id', $deletePost)->first();
        // $outfit->delete();
        // dd($deletePost);
        // dd($delete_list);
        if ($delete_list) {
            $delete_list->delete();
        // レコードが存在すれば削除
        }   
        // モデルクラスのdelete関数を使う事で簡単に消せる
        return redirect('/list');
        // /にリダイレクト処理
    }
    
    // 削除されたデータ一覧
    public function deletion_data()
    {
        return view('outfits.deletiton_data');
    }
    
    // 削除された服データの一覧表示
    public function deletion_list_data(Outfit $outfit)
    {
        $user = auth()->user();
    
        $deletion_data = $outfit->onlyTrashed()
            ->where('user_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
    
        // クエリの結果をデバッグしてダンプ
        // dd($deletion_data);
    
        return view('outfits.deletion_list', ['deletion_list' => $deletion_data]);
    }


    
     // 削除されたcodeデータの一覧表示
    public function deletion_code_data(Starcode $code)
    {
        $user = auth()->user();
        $deletion_data = $code->onlyTrashed()
            ->where('user_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
            
            
        // dd($deletion_data);
    
        return view('outfits.deletion_code',['deletion_code' => $deletion_data]);
    }
    
    
    
    // 例: 服の復元の処理
    public function restoreRecord($post , Outfit $outfit)
    {
        
        // ソフトデリートされたレコードを復元
        // dd($outfit::withTrashed()->find($post));
        $outfit::withTrashed()->find($post)->restore();
    
        return redirect('/list');
    }
    
    
    // 例: コーデの復元の処理
    public function restore_code_Record($post , Starcode $code)
    {
        // ソフトデリートされたレコードを復元
        $code::withTrashed()->find($post)->restore();
    
        return redirect('/list');
    }
    
        
    
    // 服の物理削除
    public function deletion_cloth($post , Outfit $outfit)
    {
        // dd($outfit::withTrashed()->find($post));
        $outfit::withTrashed()->find($post)->forceDelete();  // 物理削除
        
        return redirect('/deletion_data');
    }
    
    
    // コーデの物理削除
    public function deletion_code($post , Starcode $code)
    {
        // dd($outfit::withTrashed()->find($post));
        $code::withTrashed()->find($post)->forceDelete();  // 物理削除
        
        return redirect('/deletion_data');
    }
 
    


}

