<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>outerware_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>outerware_list</h1>
                </header>
            </x-slot>
            
            <div class="pagination">
                {{ $outerware_list->links() }}
            </div>
            
            
        @foreach($outerware_list as $outerware)
            <h2>前画像</h2>
            <img src="{{ $outerware->front_image_path }}" alt="アウターウェアの写真が不足している可能性があります.">
            <br>
            <h2>後画像</h2>
            <img src="{{ $outerware->back_image_path }}" alt="アウターウェアの写真が不足している可能性があります.">
            <br>
            <h2>系統</h2>
            @switch($outerware->outerware_id)
                @case(1)
                    <p>ジャケット</p>
                    @break
                @case(2)
                    <p>コート</p>
                    @break
                @case(3)
                    <p>ブルゾン</p>
                    @break
                @case(4)
                    <p>ベスト</p>
                    @break
                @case(5)
                    <p>ビーコート</p>
                    @break
                @case(6)
                    <p>ダウンジャケット</p>
                    @break
                @case(7)
                    <p>ブレザー</p>
                    @break
                @case(8)
                    <p>カーディガン</p>
                    @break
                @default
                    <p>スタイルなし</p>
            @endswitch
            
            <br><br>
        @endforeach
        
        <div class="pagination">
            {{ $outerware_list->links() }}
        </div>
    
    </x-app-layout>
    </body>
</html>

