<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>headgear_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>headgear_list</h1>
                </header>
            </x-slot>
            
            <div class="pagination">
                {{ $headgear_list->links() }}
            </div>
            
            
        @foreach($headgear_list as $headgear)
            <h2>前画像</h2>
            <img src="{{ $headgear->front_image_path }}" alt="被り物の写真が不足している可能性があります.">
            <br>
            <h2>後画像</h2>
            <img src="{{ $headgear->back_image_path }}" alt="被り物の写真が不足している可能性があります.">
            <br>
            <h2>系統</h2>
            @switch($headgear->style_id)
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
            
            <br><br>
        @endforeach
        
        <div class="pagination">
            {{ $headgear_list->links() }}
        </div>
    
    </x-app-layout>
    </body>
</html>

