<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>dress_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/base/list_base.css') }}">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>ドレス一覧</h1>
                </header>
            </x-slot>
            <div id="wrapper">
                <div class="pagination">
                    {{ $dress_list->links() }}
                </div>
                
               
            @foreach($dress_list as $dress)
            <div class="list">
                <h2>前画像</h2>
                <img src="{{ $dress->front_image_path }}" alt="ドレスの写真が不足している可能性があります.">
                <br>
                <h2>後画像</h2>
                <img src="{{ $dress->back_image_path }}" alt="ドレスの写真が不足している可能性があります.">
                <br>
                <h2>系統</h2>
                @switch($dress->dores_id)
                    @case(1)
                        <p>カジュアルドレス</p>
                        @break
                    @case(2)
                        <p>カクテルドレス</p>
                        @break
                    @case(3)
                        <p>イブニングドレス</p>
                        @break
                    @case(4)
                        <p>結婚式のドレス</p>
                        @break
                    @case(5)
                        <p>マキシドレス</p>
                        @break
                    @case(6)
                        <p>ミディドレス</p>
                        @break
                    @case(7)
                        <p>ミニドレス</p>
                        @break
                    @case(8)
                        <p>サマードレス</p>
                        @break
                    @default
                        <p>スタイルなし</p>
                @endswitch
                <button id="edit_button">
                <a href="{{ route('edit', ['post' => $dress->id]) }}">編集</a>
                </button>
                <br><br>
                
                <form action="/list/{{ $dress->id }}" id="form_{{ $dress->id }}" method="post">
                    <!--posts/idに送信、idはform_idとするメソッドはpost-->
                    @csrf
                    <!--csrf対策-->
                    @method('DELETE')
                    <!--HTMLでDELETEはサポートされていないから-->
                    <button id="delete_button" type="button" onclick="deletePost({{ $dress->id }})">削除</button> 
                    <!--JavaScriptで処理を書くからsubmitじゃなくてbuttonにする-->
                    <!--onclickにはこのボタンがクリックされた場合の処理を書く今回だとidを格納している-->
                    <!--この格納したidはJavaScriptのdeletePostの引数に使われる。-->
                </form>
            </div>
            @endforeach
            
            <div class="pagination">
                {{ $dress_list->links() }}
            </div>
        </div>
    </x-app-layout>
    <script src="{{ asset('js/deletePost.js') }}"></script>
    </body>
</html>

