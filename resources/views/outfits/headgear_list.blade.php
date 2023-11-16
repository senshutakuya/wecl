<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>headgear_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/base/list_base.css') }}">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>被り物一覧</h1>
                </header>
            </x-slot>
            <div id="wrapper">
                <div class="pagination">
                    {{ $headgear_list->links() }}
                </div>
                
                
            @foreach($headgear_list as $headgear)
            <div class="list">
                <h2>前画像</h2>
                <img src="{{ $headgear->front_image_path }}" alt="被り物の写真が不足している可能性があります.">
                <br>
                <h2>後画像</h2>
                <img src="{{ $headgear->back_image_path }}" alt="被り物の写真が不足している可能性があります.">
                <br>
                <h2>系統</h2>
                @switch($headgear->overlap_id)
                    @case(1)
                        <p>キャップ</p>
                        @break
                    @case(2)
                        <p>ベレー帽</p>
                        @break
                    @case(3)
                        <p>ニット帽</p>
                        @break
                    @case(4)
                        <p>ハンチング</p>
                        @break
                    @case(5)
                        <p>ハット</p>
                        @break
                    @case(6)
                        <p>クロッシェ</p>
                        @break
                    @case(7)
                        <p>バケットハット</p>
                        @break
                    @case(8)
                        <p>パイロットキャップ</p>
                        @break
                    @default
                        <p>スタイルなし</p>
                @endswitch
                <button id="edit_button">
                <a href="{{ route('edit', ['post' => $headgear->id]) }}">編集</a>
                </button>
                <br><br>
                
                <form action="/list/{{ $headgear->id }}" id="form_{{ $headgear->id }}" method="post">
                    <!--posts/idに送信、idはform_idとするメソッドはpost-->
                    @csrf
                    <!--csrf対策-->
                    @method('DELETE')
                    <!--HTMLでDELETEはサポートされていないから-->
                    <button id="delete_button" type="button" onclick="deletePost({{ $headgear->id }})">削除</button> 
                    <!--JavaScriptで処理を書くからsubmitじゃなくてbuttonにする-->
                    <!--onclickにはこのボタンがクリックされた場合の処理を書く今回だとidを格納している-->
                    <!--この格納したidはJavaScriptのdeletePostの引数に使われる。-->
                </form>
                
                
                <br><br>
            </div>
            @endforeach
            
            <div class="pagination">
                {{ $headgear_list->links() }}
            </div>
            </div>
    
    </x-app-layout>
    <script src="{{ asset('js/deletePost.js') }}"></script>
    </body>
</html>

