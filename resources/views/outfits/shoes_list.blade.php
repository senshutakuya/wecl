<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>shoes_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>shoes_list</h1>
                </header>
            </x-slot>
            
            <div class="pagination">
                {{ $shoes_list->links() }}
            </div>
            
            
        @foreach($shoes_list as $shoes)
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
            
            <br><br>
        @endforeach
        
        <div class="pagination">
            {{ $shoes_list->links() }}
        </div>
    
    </x-app-layout>
    </body>
</html>

