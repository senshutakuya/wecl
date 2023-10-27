<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>服一覧</title>
    <!-- Tailwind CSSを追加 -->
    <!--<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">-->
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
            
            
            <form action ="/cordinate_save">
                <!-- トップス -->
                <a href="/list/tops" class="block text-center hover:underline">
                    <h2 class="text-center">トップス</h2>
                    <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-t%E3%82%B7%E3%83%A3%E3%83%84-50.png" alt="トップス">
                </a>
                
                @if ($tops_data)
                    @foreach ($tops_data as $as_tops_data)
                        @if ($as_tops_data && isset($as_tops_data->front_image_path))
                            <img src="{{ $as_tops_data->front_image_path }}" alt="トップスの写真が不足している可能性があります。">
                        @endif
                    @endforeach
                @else
                    <p>トップスデータがありません。</p>
                @endif
                
                <!-- ボトムス -->
                <a href="/list/botms" class="block text-center hover:underline">
                    <h2 class="text-center">ボトムス</h2>
                    <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E3%82%B8%E3%83%BC%E3%83%B3%E3%82%BA-50.png" alt="トップス">
                </a>
                
                @if ($botms_data)
                    @foreach ($botms_data as $as_botms_data)
                        @if ($as_botms_data && isset($as_botms_data->front_image_path))
                            <img src="{{ $as_botms_data->front_image_path }}" alt="ボトムスの写真が不足している可能性があります.">
                        @endif
                    @endforeach
                @else
                    <p>ボトムスデータがありません。</p>
                @endif
                
                <!-- アウター -->
                <a href="/list/outer" class="block text-center hover:underline">
                    <h2 class="text-center">アウター</h2>
                    <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E3%82%B8%E3%83%A3%E3%82%B1%E3%83%83%E3%83%88-50.png" alt="トップス">
                </a>
                
                @if ($mintemperature <= 1599)
                    @foreach ($outerware_data as $as_outerware_data)
                        @if ($as_outerware_data && isset($as_outerware_data->front_image_path))
                            <img src="{{ $as_outerware_data->front_image_path }}" alt="アウターの写真が不足している可能性があります.">
                        @endif
                    @endforeach
                @else
                    <p>アウターデータがありません。</p>
                @endif
    
                <button type ="submit">お気に入り登録</button>
            
            </form>
        </div>
    </x-app-layout>
    <!--<script src="../js/coordinate.js"></script>-->
</body>
</html>
