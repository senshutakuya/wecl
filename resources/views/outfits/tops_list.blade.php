<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>tops_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>tops_list</h1>
                </header>
            </x-slot>
            
            <div class="pagination">
                {{ $tops_list->links() }}
            </div>
            

        @foreach($tops_list as $tops)
            <h2>前画像</h2>
            <img src="{{ $tops->front_image_path }}" alt="トップスの写真が不足している可能性があります.">
            <br>
            <h2>後画像</h2>
            <img src="{{ $tops->back_image_path }}" alt="トップスの写真が不足している可能性があります.">
            <br>
            <h2>系統</h2>
            
            @switch($tops->tops_id)
                @case(1)
                    <p>Tシャツ</p>
                    @break
                @case(2)
                    <p>シャツ</p>
                    @break
                @case(3)
                    <p>ブラウズ</p>
                    @break
                @case(4)
                    <p>ポロシャツ</p>
                    @break
                @case(5)
                    <p>タンクトップ</p>
                    @break
                @case(6)
                    <p>スウェットシャツ</p>
                    @break
                @case(7)
                    <p>カーディガン</p>
                    @break
                @case(8)
                    <p>パーカ</p>
                    @break
                @default
                    <p>スタイルなし</p>
            @endswitch
            <button>
            <a href="{{ route('edit', ['post' => $tops->id]) }}">編集</a>
            </button>
            <br><br>
            <form action="/list/{{ $tops->id }}" id="form_{{ $tops->id }}" method="post">
                <!--posts/idに送信、idはform_idとするメソッドはpost-->
                @csrf
                <!--csrf対策-->
                @method('DELETE')
                <!--HTMLでDELETEはサポートされていないから-->
                <button type="button" onclick="deletePost({{ $tops->id }})">削除</button> 
                <!--JavaScriptで処理を書くからsubmitじゃなくてbuttonにする-->
                <!--onclickにはこのボタンがクリックされた場合の処理を書く今回だとidを格納している-->
                <!--この格納したidはJavaScriptのdeletePostの引数に使われる。-->
            </form>
            
            <br><br>
        @endforeach
        
        <div class="pagination">
            {{ $tops_list->links() }}
        </div>
    
    </x-app-layout>
     <!--先にHTMLを読み込ませて表示速度を上げる為scriptはbodyの一番後ろ-->
        <!-- 外部のJavaScriptファイルを読み込む -->
        <!--public/js/deletePost.jsを読み込む-->
        <script src="{{ asset('js/deletePost.js') }}"></script>
    </body>
</html>

