<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホーム</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
    </head>
    <body>
        
        <x-app-layout>
        <div id="wrapper">
            
            <div id="scroll_widget">
                
                <div id="weather_widget">
                    <div id="weather_location">
                        <p>ただいまの天気</p>
                    </div>
                    <div id="weather_temperature">
                        <div id="weather_temperature">{{ isset($mainTemperature) ? $mainTemperature . '℃' : '' }}</div>
                    </div>
                    <div id="weather_description">
                        <div id="weather_description">{{ isset($weatherInfo) ? $weatherInfo : '' }}</div>
                    </div>
                </div>
                
                <!--<div class="Arrow left"><</div>-->
                <!--<div class="Arrow right">></div>-->
            </div>
            <p>
            もし結果に違いがあれば位置情報のアクセスを拒否して都市名を検索してください
            </p>
            <p>
            検索機能
            </p>
            <form action ="/home" method="post">
                @csrf
                <h2>地名を入力</h2>
                @if(isset($errorMessage))

                    <div class="alert-danger">
                        <p>{{ $errorMessage }}</p>
                    </div>
                @endif
                <input id="input_place" type="text" id="city" name="city" required minlength="1" maxlength="15" size="10" placeholder="区か都か県を入力"  title="区か都か県で終わる必要があります">
                <button class="save_button" type="submit">位置情報を取得</button>
            </form>
            
            <div id=weather_comment>
                <div id = "weather_image">
                    <div id="weather_info" style="display: none;">{{ isset($weatherInfo) ? $weatherInfo : '' }}</div>
                </div>
                <div class="content">    
                    <h2>こんにちは{{ Auth::user()->name }}さん </h2>
                    <div id="today"></div>
                    <div id="comment">
                        <!--今日は2023年11月17日金曜日-->
                    <p>ただいまの天気は</p>
                    <div id="weather_description">{{ isset($weatherInfo) ? $weatherInfo : '' }}</div>
                    <p>ただいまの温度は</p>
                    
                    <div id="weather_temperature">{{ isset($mainTemperature) ? $mainTemperature . '℃' : '' }}</div>
                    <p>今日も一日張り切っていきましょう</p>
                        
                    </div>
                    

                </div>
                
            </div>
            
            <div  id="faq-container">
                <h1>よくある質問</h1>
                
                <h2>Q:服装の登録はどうするの</h2>
                <p>A,上のuploadから登録してください</p>
                
                <h2>Q:選ぶ服が無いと言われた</h2>
                <p>A,トップスは半袖、七分丈、長袖を一つずつ、ボトムスとアウターウェアも一つずつ登録してください登録してください</p>
                
                <h2>Q:削除するにはどうすればいいでしょうか</h2>
                <p>A,リストから削除をお願いします</p>
                
                <h2>Q:編集したい</h2>
                <p>A,リストから編集をお願いします</p>
                
                <h2>Q:削除を取り消したい</h2>
                <p>A,上のdelition_dataから取り消せます</p>
                
                <h2>Q:削除したデータが無いが無い</h2>
                <p>A,削除後3日経つとデータは消えます<br>
                ご了承ください</p>
        
            </div>
        </div>
        
        


         </x-app-layout>
    <script src="{{ asset('js/today.js') }}"></script>
    <script src="{{ asset('js/weatherImage.js') }}"></script>
    <script src="{{ asset('js/cordinate.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    </body>
</html>

