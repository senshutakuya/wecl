<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>服の追加</title>
        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
        <link rel="stylesheet" href="{{ asset('css/upload/upload.css') }}">
    </head>
    <body>
        <x-app-layout>
            <div id="wrapper">
                <x-slot name="header">
                    <header>
                    <h1>服の追加</h1>
                    </header>
                </x-slot>
            <div class='posts'>
                <div class='post'>
                    <p class='content_title'>服を追加してね</p>
                </div>
            </div>
            <div class="main">
                <!--enctypeの部分でフォーム送信時のデータ形式を指定している-->
                <!--今回はドラッグアンドドロップもやろうと思っている-->
                <form action="/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- カメラからの画像キャプチャ用の<input>要素 -->
                    <!--表面-->
                    <!--前面-->
       
                    @if(session('error_message'))
                        <p>{{ session('error_message') }}</p>
                    @endif
                    @if(session('message'))
                        <p>{{ session('message') }}</p>
                    @endif
                    <div class ="image_form">
                        <label class="select_image" for="frontCameraCapture">
                            <h1 class="textalign center">前面を選択</h1>
                            <input class="input_file" type="file" name="front_upfile_camera" class="cameraCapture" accept="image/*"  required>
                        </label>
                        <!--裏面-->
                        <label class="select_image" for="backCameraCapture">
                            <h1 class="textalign center">裏面を選択</h1>
                            <input class="input_file" type="file" name="back_upfile_camera" class="cameraCapture" accept="image/*"  required>
                        </label>
                    </div>
    
                    
                     <!--性別-->
                    
                    <!-- outfits/upload.blade.php -->
    
                    <div class="gender">
                        <h2>性別</h2>
                        <select name="post[gender_id]">
                            @foreach ($genders as $gender)
                                <option value="{{ $gender }}">{{ $gender->gender }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    
                    
                    <!--季節-->
                    
                    <!-- outfits/upload.blade.php -->
    
                    <div class="season">
                        <h2>季節</h2>
                        <select name="post[season_id]">
                            @foreach ($seasons as $season)
                                <option value="{{ $season }}">{{ $season->season }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    
                    
                    <!--系統-->
                    
                    <!-- outfits/upload.blade.php -->
    
                    <div class="style">
                        <h2>系統</h2>
                        <select name="post[style_id]">
                            @foreach ($styles as $style)
                                <option value="{{ $style }}">{{ $style->style }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    
                    
                    <!--部位-->
                    
                    <!-- outfits/upload.blade.php -->
    
                    <div class="part">
                        <h2>部位</h2>
                        <select id="partSelect" name="post[part_id]">
                            @foreach ($parts as $part)
                                <option value="{{ $part }}">{{ $part->part }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    
                    
                    <!--丈の長さ-->
                    
                    <!-- outfits/upload.blade.php -->
    
                    <div class="length">
                        <h2>丈の長さ</h2>
                        <select name="post[length_id]">
                            @foreach ($lengths as $length)
                                <option value="{{ $length }}">{{ $length->length }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    
                    
                    
                    <!--服の大きさ-->
                    
                    <!-- outfits/upload.blade.php -->
    
                    <div class="size">
                        <h2>服のサイズ</h2>
                        <select name="post[size_id]">
                            @foreach ($sizes as $size)
                                <option value="{{ $size }}">{{ $size->size }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    
                    <!--カテゴリー-->
                    
                    <!-- outfits/upload.blade.php -->
    
                   <div class="category">
                        <h2>服のカテゴリ</h2>
                        <select id="categorySelect" name="post[category_id]">
                            @foreach ($tops as $as_tops)
                                <option id="tops" value="{{ $as_tops }}">{{ $as_tops->tops }}</option>
                            @endforeach
                            @foreach ($botms as $as_botms)
                                <option id="botms" value="{{ $as_botms }}">{{ $as_botms->botms }}</option>
                            @endforeach
                            @foreach ($dores as $as_dores)
                                <option id="dores" value="{{ $as_dores }}">{{ $as_dores->dores }}</option>
                            @endforeach
                            @foreach ($outerwares as $as_outerware)
                                <option id="outerware" value="{{ $as_outerware }}">{{ $as_outerware->outerware }}</option>
                            @endforeach
                            @foreach ($accessories as $as_accessory)
                                <option id="accessory" value="{{ $as_accessory }}">{{ $as_accessory->accessory }}</option>
                            @endforeach
                            @foreach ($shoes as $as_shoes)
                                <option id="shoes" value="{{ $as_shoes }}">{{ $as_shoes->shoes }}</option>
                            @endforeach
                            @foreach ($overlaps as $as_overlap)
                                <option id="overlap" value="{{ $as_overlap }}">{{ $as_overlap->overlap }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <br>
                    
                    
                    <!--服の印象-->
                    
                    <!-- outfits/upload.blade.php -->
    
                    <div class="impression">
                        <h2>服の印象</h2>
                        <select id="impressionSelect" name="post[impression_id]">
                            @foreach ($impressions as $impression)
                                <option value="{{ $impression }}">{{ $impression->inmpression }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    
                    
                    <!--服の色-->
                    
                    <!-- outfits/upload.blade.php -->
                    
                    <div class="color">
                        <h2>服の色</h2>
                        <select id="colorSelect" name="post[color_id]">
                            @foreach ($colors as $color)
                                @if (!empty($color->co_one_value))
                                    <option id ="co_one" value="{{ $color->id }}">{{ $color->co_one_value }}</option>
                                @endif
                                @if (!empty($color->co_two_value))
                                    <option id ="co_two" value="{{ $color->id }}">{{ $color->co_two_value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <br>
                    
                    
                    
                    
                    
                    <!--保存ボタン-->
                    
                    <input type="submit" class="save_button" value="保存">
                </form>
            </div>
        </x-app-layout>
    </div>
    <script src="{{ asset('js/upload.js') }}"></script>
    </body>
</html>











