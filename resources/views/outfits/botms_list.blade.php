<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>botms_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>botms_list</h1>
                </header>
            </x-slot>
            
            <div class="pagination">
                {{ $botms_list->links() }}
            </div>
            
            
        @foreach($botms_list as $botms)
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
            
            <a href="{{ route('edit', ['post' => $botms->id]) }}">編集</a>
            
            <br><br>
        @endforeach
        
        <div class="pagination">
            {{ $botms_list->links() }}
        </div>
    
    </x-app-layout>
    </body>
</html>

