<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Outfit;
use App\Models\User;

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
    
    
    public function index()
    {

        return view('outfits.login');
        // outfitsフォルダのindex.blade.phpを表示
       //blade内で使う変数'outfits'と設定。'outfits'の中身にgetを使い、インスタンス化した$outfitを代入。
    }
    
    public function home(Outfit $outfit)
    {
        return view('outfits.index', ['outfits' => $outfit->get()]);
        // outfitsフォルダのindex.blade.phpを表示
       //blade内で使う変数'outfits'と設定。'outfits'の中身にgetを使い、インスタンス化した$outfitを代入。
    }
    

    public function login(Request $request)
    // フォームから送信されたデータの取得の為にrequestを使う
    {
        $email = $request->input('email');
        $password = $request->input('password');
        // ユーザーのフォームで入力した内容を変数に格納
        
        // dd($email, $password);
        
        
        // ユーザーをデータベースから取得
         $user = User::where('email', $email)->first();
        // where メソッドは、指定された条件に一致するレコードを取得する
        // ->first(): where 条件に一致する最初のレコードを取得、もし一致するレコードが見つからない場合、null が返されます。
        
         if ($email === $user->email && $password === $user->password) {
            
            // セッションの再生成
            $request->session()->regenerate();
            
            // dd("");
            
            return redirect()->intended('/home'); // ログイン後のリダイレクト先を指定

        }
        else{
            

            
            return view('outfits.login'); // ログイン失敗後の画面表示
            // 認証失敗時の処理
        }
    }
    
    public function logout(Request $request)
    {
        // ユーザーをログアウトする処理を実装
        // 例: セッションからユーザー情報を削除
        $request->session()->forget('user');
        // dd($aaa);
        // ログアウト後のリダイレクト
        return view('auth.login');
    }
}

