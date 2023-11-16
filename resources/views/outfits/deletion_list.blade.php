<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>削除した服のリスト</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/base/list_base.css') }}">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>削除した服のリスト</h1>
                </header>
            </x-slot>
            <div id="wrapper">
                <div class="pagination">
                    {{ $deletion_list->links() }}
                </div>
                
    
            @foreach($deletion_list as $data)
            <div class="list">
                <h2>前画像</h2>
                <img src="{{ $data->front_image_path }}" alt="服の写真が不足している可能性があります.">
                <br>
                <h2>後画像</h2>
                <img src="{{ $data->back_image_path }}" alt="服の写真が不足している可能性があります.">
                <br>
                
                
                <button id="edit_button">
                <a href="{{ route('restoreRecord', ['post' => $data->id]) }}">復元</a>
                </button>
                <br><br>
                <form action="/deletion_data/{{ $data->id }}" id="form_{{ $data->id }}" method="post">
                    <!--deletion_datas/idに送信、idはform_idとするメソッドはdeletion_data-->
                    @csrf
                    <!--csrf対策-->
                    @method('DELETE')
                    <!--HTMLでDELETEはサポートされていないから-->
                    <button id="delete_button" type="button" onclick="deletion_data({{ $data->id }})">完全削除</button> 
                    <!--JavaScriptで処理を書くからsubmitじゃなくてbuttonにする-->
                    <!--onclickにはこのボタンがクリックされた場合の処理を書く今回だとidを格納している-->
                    <!--この格納したidはJavaScriptのdeletedeletion_dataの引数に使われる。-->
                </form>
                
                <br><br>
            </div>
            @endforeach
            
            <div class="pagination">
                {{ $deletion_list->links() }}
            </div>
        </div>
    
    </x-app-layout>
     <!--先にHTMLを読み込ませて表示速度を上げる為scriptはbodyの一番後ろ-->
        <!-- 外部のJavaScriptファイルを読み込む -->
        <!--public/js/deletion_data.jsを読み込む-->
        <script src="{{ asset('js/deletion_data.js') }}"></script>
    </body>
</html>

