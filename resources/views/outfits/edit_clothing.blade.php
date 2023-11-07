<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>edit</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>服の編集</h1>
                </header>
            </x-slot>
        <div class='posts'>
            <div class='post'>
                <h2 class='title'>てすとだよん</h2>
                <p class='body'>服を編集してね</p>
            </div>
        </div>
        <div class="main">
            
            
            <!--enctypeの部分でフォーム送信時のデータ形式を指定している-->
            <!--今回はドラッグアンドドロップもやろうと思っている-->
            <form action="{{ route('update', ['post' => $outfit->id]) }}" method ="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- カメラからの画像キャプチャ用の<input>要素 -->
                <!--表面-->
                <!--前面-->
                <label for="frontCameraCapture">
                    <h1 class="textalign center">新しい前面を選択</h1>
                    <input type="file" name="front_upfile_camera" class="cameraCapture" accept="image/*" capture="camera" />
                    <img src='{{ $outfit->front_image_path }}' alt='前面画像'>
                    <input type="hidden" name= "previous_front" value="{{ $outfit->front_image_path }}"/>
                </label>
                <!--裏面-->
                <label for="backCameraCapture">
                    <h1 class="textalign center">新しい裏面を選択</h1>
                    <input type="file" name="back_upfile_camera" class="cameraCapture" accept="image/*" capture="camera" />
                    <img src='{{ $outfit->back_image_path }}' alt='後ろ面画像'>
                    <input type="hidden" name= "previous_back" value="{{ $outfit->back_image_path }}"/>
                </label>

                
                 <!--性別-->
                
                <!-- outfits/upload.blade.php -->

                <div class="gender">
                    <h2>性別</h2>
                    <select name="post[gender_id]">
                        @foreach ($genders as $gender)
                        <!--三項演算を使って前データと一致すればselectedを返しそれ以外なら''を返す-->
                            <option value="{{ $gender }}"{{ $gender->id == $outfit->gender_id ? 'selected' : '' }}>{{ $gender->gender }}</option>
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
                            <option value="{{ $season }}"{{ $season->id == $outfit->season_id ? 'selected' : '' }}>{{ $season->season }}</option>
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
                            <option value="{{ $style }}"{{ $style->id == $outfit->style_id ? 'selected' : '' }}>{{ $style->style }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                
                
                <!--部位-->
                
                <!-- outfits/upload.blade.php -->

                <div class="part">
                    <h2>部位</h2>
                    <select name="post[part_id]">
                        @foreach ($parts as $part)
                            <option value="{{ $part }}"{{ $part->id == $outfit->part_id ? 'selected' : '' }}>{{ $part->part }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                
                
                <!--丈の長さ-->
                
                <!-- outfits/upload.blade.php -->

                <div class="length">
                    <h2>部位</h2>
                    <select name="post[length_id]">
                        @foreach ($lengths as $length)
                            <option value="{{ $length }}"{{ $length->id == $outfit->length_id ? 'selected' : '' }}>{{ $length->length }}</option>
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
                            <option value="{{ $size }}"{{ $size->id == $outfit->size_id ? 'selected' : '' }}>{{ $size->size }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                
                <!--カテゴリー-->
                
                <!-- outfits/upload.blade.php -->

               <div class="category">
                    <h2>服のカテゴリ</h2>
                    <select name="post[category_id]">
                        @foreach ($tops as $as_tops)
                            <option value="{{ json_encode($as_tops) }}" {{ $outfit->tops_id == $as_tops->id ? 'selected' : '' }}>{{ $as_tops->tops }}</option>
                        @endforeach
                        @foreach ($botms as $as_botms)
                            <option value="{{ json_encode($as_botms) }}" {{ $outfit->botms_id == $as_botms->id ? 'selected' : '' }}>{{ $as_botms->botms }}</option>
                        @endforeach
                        @foreach ($dores as $as_dores)
                            <option value="{{ json_encode($as_dores) }}" {{ $outfit->dores_id == $as_dores->id ? 'selected' : '' }}>{{ $as_dores->dores }}</option>
                        @endforeach
                        @foreach ($outerwares as $as_outerware)
                            <option value="{{ json_encode($as_outerware) }}" {{ $outfit->outerware_id == $as_outerware->id ? 'selected' : '' }}>{{ $as_outerware->outerware }}</option>
                        @endforeach
                        @foreach ($accessories as $as_accessory)
                            <option value="{{ json_encode($as_accessory) }}" {{ $outfit->accessory_id == $as_accessory->id ? 'selected' : '' }}>{{ $as_accessory->accessory }}</option>
                        @endforeach
                        @foreach ($shoes as $as_shoes)
                            <option value="{{ json_encode($as_shoes) }}" {{ $outfit->shoes_id == $as_shoes->id ? 'selected' : '' }}>{{ $as_shoes->shoes }}</option>
                        @endforeach
                        @foreach ($overlaps as $as_overlap)
                            <option value="{{ json_encode($as_overlap) }}" {{ $outfit->overlap_id == $as_overlap->id ? 'selected' : '' }}>{{ $as_overlap->overlap }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                
                
                <!--服の印象-->
                
                <!-- outfits/upload.blade.php -->

                <div class="impression">
                    <h2>服の印象</h2>
                    <select name="post[impression_id]">
                        @foreach ($impressions as $impression)
                            <option value="{{ $impression }}"{{ $impression->id == $outfit->impression_id ? 'selected' : '' }}>{{ $impression->inmpression }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                
                
                <!--服の色-->
                
                <!-- outfits/upload.blade.php -->

                <div class="color">
                    <h2>服の色</h2>
                    <select name="post[color_id]">
                        @foreach ($colors as $color)
                            @if (!empty($color->co_one_value))
                                <option value="{{ $color->id }}" @if ($outfit->color_id == $color->id) selected @endif>
                                    {{ $color->co_one_value }}
                                </option>
                            @endif
                            @if (!empty($color->co_two_value))
                                <option value="{{ $color->id }}" @if ($outfit->color_id == $color->id) selected @endif>
                                    {{ $color->co_two_value }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <br>
                
                
                
                
                
                <!--保存ボタン-->
                <input type="hidden" name="outfit" value="{{ is_string($outfit) ? $outfit : json_encode($outfit) }}">

                
                <button type="submit">更新</button>
            </form>
            
            <a href="/list">戻る</a>
        </div>
    </x-app-layout>
    </body>
</html>











