<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>服一覧</title>
    <!-- Tailwind CSSを追加 -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/cordinate/cordinate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base/base.css') }}">
    

</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <header>
            <h1>服の一覧</h1>
            </header>
        </x-slot>
        
        <div id="wrapper">
            <!-- グリッドコンテナを作成 -->
            <div class="grid grid-cols-2 gap-4 p-4">
                
                
            
                <!-- トップス -->
                <a href="/list/tops" class="block text-center hover:underline">
                    <h2 class="text-center">トップス</h2>
                    <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-t%E3%82%B7%E3%83%A3%E3%83%84-50.png" alt="トップス">
                </a>
                
    
                
                <!-- ボトムス -->
                <a href="/list/botms" class="block text-center hover:underline">
                    <h2 class="text-center">ボトムス</h2>
                    <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E3%82%B8%E3%83%BC%E3%83%B3%E3%82%BA-50.png" alt="トップス">
                </a>
                
                <!-- アウター -->
                <a href="/list/outer" class="block text-center hover:underline">
                    <h2 class="text-center">アウター</h2>
                    <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E3%82%B8%E3%83%A3%E3%82%B1%E3%83%83%E3%83%88-50.png" alt="トップス">
                </a>
                
                <form action="/coordinate_gen" >
                    <!-- 他のフォーム要素 -->
                    <h2>地名を入力</h2>
                    @if(isset($errorMessage))
                        <div class="alert-danger">
                            <alert>{{ $errorMessage }}</alert>
                        </div>
                    @endif
                    <input id="input_place" type="text" id="city" name="city" required minlength="1" maxlength="15" size="10" placeholder="区か都か県を入力"  title="区か都か県で終わる必要があります">
                    
                    <button id="cordinate_button" type="submit">位置情報を取得</button>
                </form>


            
            </div>
        </div>
    </x-app-layout>

</body>
</html>
