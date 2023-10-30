<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>服一覧</title>
    <!-- Tailwind CSSを追加 -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <header>
            <h1>服の一覧</h1>
            </header>
        </x-slot>
        
        <!-- グリッドコンテナを作成 -->
        <div class="grid grid-cols-2 gap-4 p-4">
        
        <!-- トップス -->
        <a href="/list/tops" class="block text-center hover:underline">
            <h2 class="text-center">トップス</h2>
        </a>
            <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-t%E3%82%B7%E3%83%A3%E3%83%84-50.png" alt="トップス">
        
        
        <!-- ボトムス -->
        <a href="/list/botms" class="block text-center hover:underline">
            <h2 class="text-center">ボトムス</h2>
        </a>
            <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E3%82%B8%E3%83%BC%E3%83%B3%E3%82%BA-50.png" alt="トップス">
        
        
        <!-- アウター -->
        <a href="/list/outer" class="block text-center hover:underline">
            <h2 class="text-center">アウター</h2>
        </a>
            <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E3%82%B8%E3%83%A3%E3%82%B1%E3%83%83%E3%83%88-50.png" alt="トップス">
        
        
        <!-- ドレス -->
        <a href="/list/dress" class="block text-center hover:underline">
            <h2 class="text-center">ドレス</h2>
        </a>
            <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E3%82%A6%E3%82%A7%E3%83%87%E3%82%A3%E3%83%B3%E3%82%B0%E3%83%89%E3%83%AC%E3%82%B9-50.png" alt="トップス">
        
        
        <!-- アクセサリー -->
        <a href="/list/accessory" class="block text-center hover:underline">
            <h2 class="text-center">アクセサリー</h2>
        </a>
            <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E3%83%80%E3%82%A4%E3%82%A2%E3%83%A2%E3%83%B3%E3%83%89%E3%81%AE%E6%8C%87%E8%BC%AA-50.png" alt="トップス">
        
        
        <!-- シューズ -->
        <a href="/list/shoes" class="block text-center hover:underline">
            <h2 class="text-center">シューズ</h2>
        </a>
            <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E9%9D%B4-50.png" alt="トップス">
        
        
        <!-- 被り物 -->
        <a href="/list/headgear" class="block text-center hover:underline">
            <h2 class="text-center">被り物</h2>
        </a>
            <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E3%83%95%E3%82%A7%E3%83%AB%E3%83%88%E5%B8%BD-50.png" alt="トップス">
        
        
        
        <!--コーデ-->
        <a href="/list/code" class="block text-center hover:underline">
            <h2 class="text-center">コーデ</h2>
        </a>
            <img class ="w-50 h-50" src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/%E3%82%B3%E3%83%BC%E3%83%87%E7%94%BB%E5%83%8F.png" alt="トップス">
        
        
        
        <!--<img src ="Outfit">-->
        
        </div>
    </x-app-layout>
</body>
</html>
