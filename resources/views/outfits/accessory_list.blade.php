<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>accessory_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/base/list_base.css') }}">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>アクセサリー一覧</h1>
                </header>
            </x-slot>
            <div id="wrapper">
                <div class="pagination">
                    {{ $accessory_list->links() }}
                </div>
                
                
            @foreach($accessory_list as $accessory)
            <div class="list">
                <h2>前画像</h2>
                <img src="{{ $accessory->front_image_path }}" alt="アクセサリーの写真が不足している可能性があります.">
                <br>
                <h2>後画像</h2>
                <img src="{{ $accessory->back_image_path }}" alt="アクセサリーの写真が不足している可能性があります.">
                <br>
                <h2>系統</h2>
                @switch($accessory->accessory_id)
                    @case(1)
                        <p>ネックレス</p>
                        @break
                    @case(2)
                        <p>ブレスレット</p>
                        @break
                    @case(3)
                        <p>イヤリング</p>
                        @break
                    @case(4)
                        <p>リング</p>
                        @break
                    @case(5)
                        <p>サングラス</p>
                        @break
                    @case(6)
                        <p>スカーフ</p>
                        @break
                    @default
                        <p>スタイルなし</p>
                @endswitch
                <button id="edit_button">
                <a href="{{ route('edit', ['post' => $accessory->id]) }}">編集</a>
                </button>
                <br><br>
                
                <form action="/list/{{ $accessory->id }}" id="form_{{ $accessory->id }}" method="post">
                    <!--posts/idに送信、idはform_idとするメソッドはpost-->
                    @csrf
                    <!--csrf対策-->
                    @method('DELETE')
                    <!--HTMLでDELETEはサポートされていないから-->
                    <button id="delete_button" type="button" onclick="deletePost({{ $accessory->id }})">削除</button> 
                    <!--JavaScriptで処理を書くからsubmitじゃなくてbuttonにする-->
                    <!--onclickにはこのボタンがクリックされた場合の処理を書く今回だとidを格納している-->
                    <!--この格納したidはJavaScriptのdeletePostの引数に使われる。-->
                </form>
                <br><br>
            </div>
            @endforeach
            
            <div class="pagination">
                {{ $accessory_list->links() }}
            </div>
        </div>
    </x-app-layout>
        <!--先にHTMLを読み込ませて表示速度を上げる為scriptはbodyの一番後ろ-->
        <!-- 外部のJavaScriptファイルを読み込む -->
        <!--public/js/deletePost.jsを読み込む-->
        <script src="{{ asset('js/deletePost.js') }}"></script>
    </body>
</html>

