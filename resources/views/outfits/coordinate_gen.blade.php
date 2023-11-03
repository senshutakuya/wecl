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
            

            
            <form action ="/cordinate_save" method="post">
                @csrf
                <!-- トップス -->

                <h2 class="text-center">トップス</h2>
                <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-t%E3%82%B7%E3%83%A3%E3%83%84-50.png" alt="トップス">

                
                @if ($tops_data[0] != null)
                    @foreach ($tops_data as $as_tops_data)
                        @if ($as_tops_data && isset($as_tops_data->front_image_path))
                            
                            <img src="{{ $as_tops_data->front_image_path }}" alt="トップスの写真が不足している可能性があります。">
                            <input type="hidden" name="tops_id" value="{{ $as_tops_data->id }}">
                            <input type="hidden" name="tops_front" value="{{ $as_tops_data->front_image_path }}">
                            <input type="hidden" name="tops_back" value="{{ $as_tops_data->back_image_path }}">
                            
                        @endif
                    @endforeach
                @else
                    <h2>選ぶだけの服がないです</h2>
                @endif
                
                <!-- ボトムス -->
                <h2 class="text-center">ボトムス</h2>
                <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E3%82%B8%E3%83%BC%E3%83%B3%E3%82%BA-50.png" alt="トップス">

                
                
                
                @if ($botms_data)
                    @foreach ($botms_data as $as_botms_data)
                        @if ($as_botms_data && isset($as_botms_data->front_image_path))
                            <img src="{{ $as_botms_data->front_image_path }}" alt="ボトムスの写真が不足している可能性があります.">
                        @endif
                    @endforeach
                @else
                    <p>ボトムスデータがありません。</p>
                @endif
                
                
                @if($botms_data != null) 
                    @if(count($botms_data) == 4)
                        <h2>どちらかお選びください</h2>
                        <select name="select_botoms">
                            <option value="one_botms">1</option>
                            <option value="two_botms">2</option>
                        </select>
                        <input type="hidden" name="one_botms_id" value="{{ $botms_data[0]->id }}">
                        <input type="hidden" name="one_botms_front" value="{{ $botms_data[0]->front_image_path }}">
                        <input type="hidden" name="one_botms_back" value="{{ $botms_data[0]->back_image_path }}">
                        <input type="hidden" name="two_botms_id" value="{{ $botms_data[2]->id }}">
                        <input type="hidden" name="two_botms_front" value="{{ $botms_data[2]->front_image_path }}">
                        <input type="hidden" name="two_botms_back" value="{{ $botms_data[2]->back_image_path }}">
                        <br>
                    @else
                        <h2>１つなので選ばなくて大丈夫です<h2>
                        <input type="hidden" name="select_botms" value="one_botms">
                        <input type="hidden" name="one_botms_id" value="{{ $botms_data[0]->id }}">
                        <input type="hidden" name="one_botms_front" value="{{ $botms_data[0]->front_image_path }}">
                        <input type="hidden" name="one_botms_back" value="{{ $botms_data[0]->back_image_path }}">
                        <br>
                    @endif
                @else
                    
                @endif
                
                <!-- アウター -->
                <h2 class="text-center">アウター</h2>
                <img src="https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E6%9C%8D%E4%B8%80%E8%A6%A7%E7%94%BB%E9%9D%A2/icons8-%E3%82%B8%E3%83%A3%E3%82%B1%E3%83%83%E3%83%88-50.png" alt="トップス">

                
                @if ($mintemperature <= 1599 && $outerware_data != null)
                    @foreach ($outerware_data as $as_outerware_data)
                        @if ($as_outerware_data && isset($as_outerware_data->front_image_path))
                            <img src="{{ $as_outerware_data->front_image_path }}" alt="アウターの写真が不足している可能性があります.">
                        @endif
                    @endforeach
                @else
                    <p>アウターデータがありません。</p>
                @endif
                
                @if($outerware_data == null)
                    <h2>今回はアウター要りません</h2>
                @else
                    @if(count($outerware_data) == 4)
                        <h2>どちらかお選びください</h2>
                        <select name="select_outerware">
                            <option value="one_outerware">1</option>
                            <option value="two_outerware">2</option>
                        </select>
                        <input type="hidden" name="one_outerware_id" value="{{ $outerware_data[0]->id }}">
                        <input type="hidden" name="one_outerware_front" value="{{ $outerware_data[0]->front_image_path }}">
                        <input type="hidden" name="one_outerware_back" value="{{ $outerware_data[0]->back_image_path }}">
                        <input type="hidden" name="two_outerware_id" value="{{ $outerware_data[2]->id }}">
                        <input type="hidden" name="two_outerware_front" value="{{ $outerware_data[2]->front_image_path }}">
                        <input type="hidden" name="two_outerware_back" value="{{ $outerware_data[2]->back_image_path }}">
                        <br>
                    @else
                        <h2>１つなので選ばなくて大丈夫です<h2>
                            <input type="hidden" name="select_outerware" value="one_outerware">
                            <input type="hidden" name="one_outerware_id" value="{{ $outerware_data[0]->id }}">
                            <input type="hidden" name="one_outerware_front" value="{{ $outerware_data[0]->front_image_path }}">
                            <input type="hidden" name="one_outerware_back" value="{{ $outerware_data[0]->back_image_path }}">
                        <br>
                    @endif
                @endif
                
                @if($tops_data != null && $botms_data != null)
                
                    <button type ="submit">お気に入り登録</button>
                @else
                    <h2>お気に入り登録できません</h2>
                @endif
            
            </form>
        </div>
    </x-app-layout>
    <!--<script src="../js/coordinate.js"></script>-->
</body>
</html>
