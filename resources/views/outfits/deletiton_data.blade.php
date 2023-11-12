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
        
        <!-- 服 -->
        <a href="/deletion_list" class="block text-center hover:underline">
            <h2 class="text-center">削除した服</h2>
        </a>
            <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-t%E3%82%B7%E3%83%A3%E3%83%84-50.png" alt="トップス">
        
        <!--コーデ-->
        <a href="/deletion_code" class="block text-center hover:underline">
            <h2 class="text-center">削除したコーデ</h2>
        </a>
            <img class ="w-50 h-50" src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/%E3%82%B3%E3%83%BC%E3%83%87%E7%94%BB%E5%83%8F.png" alt="トップス">
        
        
        
        <!--<img src ="Outfit">-->
        
        </div>
    </x-app-layout>
    
</body>
</html>
