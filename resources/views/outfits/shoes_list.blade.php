<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>shoes_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/base/list_base.css') }}">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>靴一覧</h1>
                </header>
            </x-slot>
            <div id="wrapper">
                <div class="pagination">
                    {{ $shoes_list->links() }}
                </div>
                
                
            @foreach($shoes_list as $shoes)
            <div class="list">
                <h2>前画像</h2>
                <img src="{{ $shoes->front_image_path }}" alt="靴の写真が不足している可能性があります.">
                <br>
                <h2>後画像</h2>
                <img src="{{ $shoes->back_image_path }}" alt="靴の写真が不足している可能性があります.">
                <br>
                <h2>系統</h2>
                @switch($shoes->shoes_id)
                    @case(1)
                        <p>スニーカー</p>
                        @break
                    @case(2)
                        <p>ブーツ</p>
                        @break
                    @case(3)
                        <p>ヒールシューズ</p>
                        @break
                    @case(4)
                        <p>フラットシューズ</p>
                        @break
                    @case(5)
                        <p>サンダル</p>
                        @break
                    @case(6)
                        <p>ローファー</p>
                        @break
                    @case(7)
                        <p>エスバドリーユ</p>
                        @break
                    @case(8)
                        <p>レインブーツ</p>
                        @break
                    @default
                        <p>スタイルなし</p>
                @endswitch
                <button id="edit_button">
                <a href="{{ route('edit', ['post' => $shoes->id]) }}">編集</a>
                </button>
                <br><br>
                
                <form action="/list/{{ $shoes->id }}" id="form_{{ $shoes->id }}" method="post">
                    <!--posts/idに送信、idはform_idとするメソッドはpost-->
                    @csrf
                    <!--csrf対策-->
                    @method('DELETE')
                    <!--HTMLでDELETEはサポートされていないから-->
                    <button id="delete_button" type="button" onclick="deletePost({{ $shoes->id }})">削除</button> 
                    <!--JavaScriptで処理を書くからsubmitじゃなくてbuttonにする-->
                    <!--onclickにはこのボタンがクリックされた場合の処理を書く今回だとidを格納している-->
                    <!--この格納したidはJavaScriptのdeletePostの引数に使われる。-->
                </form>
                
                <br><br>
            </div>
            @endforeach
            
            <div class="pagination">
                {{ $shoes_list->links() }}
            </div>
        </div>
    </x-app-layout>
    <script src="{{ asset('js/deletePost.js') }}"></script>
    </body>
</html>

