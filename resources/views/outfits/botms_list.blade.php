<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>botms_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/base/list_base.css') }}">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>ボトムス一覧</h1>
                </header>
            </x-slot>
            <div id="wrapper">
                <div class="pagination">
                    {{ $botms_list->links() }}
                </div>
                
                
            @foreach($botms_list as $botms)
            <div class="list">
                <h2>前画像</h2>
                <img src="{{ $botms->front_image_path }}" alt="ボトムスの写真が不足している可能性があります.">
                <br>
                <h2>後画像</h2>
                <img src="{{ $botms->back_image_path }}" alt="ボトムスの写真が不足している可能性があります.">
                <br>
                <h2>系統</h2>
                @switch($botms->botms_id)
                    @case(1)
                        <p>ジーンズ</p>
                        @break
                    @case(2)
                        <p>スラックス</p>
                        @break
                    @case(3)
                        <p>ショートパンツ</p>
                        @break
                    @case(4)
                        <p>スカート</p>
                        @break
                    @case(5)
                        <p>レギンス</p>
                        @break
                    @case(6)
                        <p>パンツ</p>
                        @break
                    @case(7)
                        <p>ショーツ</p>
                        @break
                    @case(8)
                        <p>キュロット</p>
                        @break
                    @default
                        <p>スタイルなし</p>
                @endswitch
                <button id="edit_button">
                <a href="{{ route('edit', ['post' => $botms->id]) }}">編集</a>
                </button>
                <br><br>
                
                <form action="/list/{{ $botms->id }}" id="form_{{ $botms->id }}" method="post">
                    <!--posts/idに送信、idはform_idとするメソッドはpost-->
                    @csrf
                    <!--csrf対策-->
                    @method('DELETE')
                    <!--HTMLでDELETEはサポートされていないから-->
                    <button id="delete_button" type="button" onclick="deletePost({{ $botms->id }})">削除</button> 
                    <!--JavaScriptで処理を書くからsubmitじゃなくてbuttonにする-->
                    <!--onclickにはこのボタンがクリックされた場合の処理を書く今回だとidを格納している-->
                    <!--この格納したidはJavaScriptのdeletePostの引数に使われる。-->
                </form>
                <br><br>
            </div>
            @endforeach
            
            <div class="pagination">
                {{ $botms_list->links() }}
            </div>
        
        </div>
    
    </x-app-layout>
        <!--先にHTMLを読み込ませて表示速度を上げる為scriptはbodyの一番後ろ-->
        <!-- 外部のJavaScriptファイルを読み込む -->
        <!--public/js/deletePost.jsを読み込む-->
        <script src="{{ asset('js/deletePost.js') }}"></script>
    </body>
</html>

