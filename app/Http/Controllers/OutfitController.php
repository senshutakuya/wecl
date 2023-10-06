<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        // Genderモデルをインスタンス化
        // $genderModel = new Gender;
        // $genders = $genderModel->GenderValues();
        
        // // Seasonモデルをインスタンス化
        // $seasonModel = new Season;
        // $seasons = $seasonModel->SeasonValues();
        
        
        // // styleモデルをインスタンス化
        // $styleModel = new Style;
    
        // // すべてのstyleーを結合して配列にする
        // $styles = array_merge(
        //     $styleModel->man_styleValues(),
        //     $styleModel->woman_styleValues(),
        //     $styleModel->gender_styleValues(),
        // );
        
        
        // // partモデルをインスタンス化
        // $partModel = new Part;
        // $parts = $partModel->partValues();
    
    
        // // lengthモデルをインスタンス化
        // $lengthModel = new Length;
        // $lengths = $lengthModel->lengthValues();
        
        // // sizeモデルをインスタンス化
        // $sizeModel = new Size;
        // $sizes = $sizeModel->sizeValues();
        
        // // カテゴリーモデルをインスタンス化
        // $categoryModel = new Category;
    
        // // すべてのカテゴリーを結合して配列にする
        // $categories = array_merge(
        //     $categoryModel->getTopsValues(),
        //     $categoryModel->getBotmsValues(),
        //     $categoryModel->getDoresValues(),
        //     $categoryModel->getOuterwareValues(),
        //     $categoryModel->getInnerwareValues(),
        //     $categoryModel->getAccessoryValues(),
        //     $categoryModel->getShoesValues(),
        //     $categoryModel->getOverlapValues()
        // );
        
        // colorモデルをインスタンス化
        // $colorModel = new Color;
        
        // 
  
    
        // // すべてのカテゴリーを結合して配列にする
        // $colors = array_merge(
        //     $colorModel->One_colorValues(),
        //     $colorModel->Two_colorValues(),
        // );
        
        // tops
        
        // $topsCategories = $category->get()->where('ca_variable_value', 'tops');

        // $topsValues = $topsCategories->pluck('ca_tops_value')->toArray();
        
        // // tops
        
        // $topsCategories = $category->get()->where('ca_variable_value', 'botms');

        // $topsValues = $topsCategories->pluck('ca_tops_value')->toArray();
        
        // dd($topsValues);


    
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
    
    
    
    
    public function coordinate(Outfit $outfit){
        
        
        $front_image_path = json_decode($outfit->get('front_image_path'));
        
        dd($front_image_path[]->front_image_path);
        
        
        // 表示するページの処理
        return view('outfits.coordinate')->with('outfit',$outfit->get());
        
    }
    
    
    


}

// $table->unsignedBigInteger('gender_id')->nullable();
//             $table->unsignedBigInteger('season_id')->nullable();
//             $table->unsignedBigInteger('style_id')->nullable();
//             $table->unsignedBigInteger('part_id')->nullable();
//             $table->unsignedBigInteger('length_id')->nullable();
//             $table->unsignedBigInteger('size_id')->nullable();
//             $table->unsignedBigInteger('category_id')->nullable();
//             $table->unsignedBigInteger('impression_id')->nullable();
//             $table->unsignedBigInteger('color_id')->nullable();