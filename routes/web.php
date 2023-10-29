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
Route::get('/', [OutfitController::class, 'logout']);

// /loginと来たらlogoutに飛ばしてリダイレクトでログイン画面に
Route::get('/login', [OutfitController::class, 'logout']);

Route::get('/logout', [OutfitController::class, 'logout']);

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
    // 服の追加
    Route::get('/upload', 'upload')->name('upload');
    // home画面
    Route::get('/home', 'home')->name('home');
    
    Route::post('/add', 'add')->name('add');
    
    Route::get('/list', 'cloth_list')->name('list');
    
    Route::get('/list/tops', 'tops_list')->name('topslist');
    
    Route::get('/coordinate', 'coordinate')->name('coordinate');
    
    Route::get('/coordinate_gen', 'coordinate_gen')->name('coordinate_gen');
    
    Route::post('/cordinate_save', 'cordinate_save')->name('cordinate_save');
    
    
    
});

require __DIR__.'/auth.php';

