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
            
            <a href="{{ route('edit', ['post' => $tops->id]) }}">編集</a>
            
            <br><br>
        @endforeach
        
        <div class="pagination">
            {{ $tops_list->links() }}
        </div>
    
    </x-app-layout>
    </body>
</html>

