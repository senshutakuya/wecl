<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OutfitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 最初に来たらlogoutに飛ばしてリダイレクトでログイン画面に



// /loginと来たらlogoutに飛ばしてリダイレクトでログイン画面に

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('logout');
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('login');
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('logout');
    Route::get('/', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('logout');
});

// ここはBreezeのルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ここからはoutfitのルート(カスタムルート)
Route::controller(OutfitController::class)->middleware(['auth'])->group(function(){
    // コーデを組む
    Route::post('/outfits', 'store')->name('store');
    // 服の追加画面
    Route::get('/upload', 'upload')->name('upload');
    // home画面
    Route::get('/home', 'home')->name('home');
    // 服の追加処理
    Route::post('/add', 'add')->name('add');
    // 服の一覧
    Route::get('/list', 'cloth_list')->name('list');
    // トップス一覧
    Route::get('/list/tops', 'tops_list')->name('topslist');
    // コーディネートの画面
    Route::get('/coordinate', 'coordinate')->name('coordinate');
    // コーディネートの結果画面
    Route::get('/coordinate_gen', 'coordinate_gen')->name('coordinate_gen');
    // コーディネートの保存画面
    Route::post('/cordinate_save', 'cordinate_save')->name('cordinate_save');
    // トップスの一覧
    Route::get('/list/tops','list_tops')->name('list_tops');
    // ボトムスの一覧
    Route::get('/list/botms','list_botms')->name('list_botms');
    // アウターの一覧
    Route::get('/list/outer','list_outer')->name('list_outer');
    // ドレスの一覧
    Route::get('/list/dress','list_dress')->name('list_dress');
    // アクセサリの一覧
    Route::get('/list/accessory','list_accessory')->name('list_accessory');
    // 靴の一覧
    Route::get('/list/shoes','list_shoes')->name('list_shoes');
    // 被り物の一覧
    Route::get('/list/headgear','list_headgear')->name('list_headgear');
    // コーディネートの一覧
    Route::get('/list/code','list_code')->name('list_code');
    // 編集画面
    // Route::post("/list/{post}/edit",'edit')->name('edit');
    
    Route::get("/list/{post}/edit", 'edit')->name('edit');
    // 編集処理
    Route::put("/list/{post}",'update')->name('update');
    
    // Route::get("/list/{post}",'update')->name('update');
    
    
});

require __DIR__.'/auth.php';

