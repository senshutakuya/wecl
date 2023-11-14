<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホーム</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    </head>
    <body>
        
        <x-app-layout>
        <div id="wrapper">
            
            
            <div id="openweathermap-widget-11"></div>
            <script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script>
            <script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 11,cityid: '1850144',appid: '54000d99cbc9d1a4d126abc2b3f7c5a7',lang: 'ja' ,units: 'metric',containerid: 'openweathermap-widget-11',  });  
            (function() {var script = document.createElement('script');
            script.async = true;script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(script, s);  })();</script>
            
            検索機能
            <form action ="/coordinate_gen">
                @csrf
                <h2>地名を入力</h2>
                <input type="text" id="city" name="city" required minlength="1" maxlength="15" size="10" />
                <button type="submit">位置情報を取得</button>
            </form>
            
            <div id = "weather_comment">
                <div id="comment">
                    <h2>こんにちはーーさん </h2>
                    <p>
                    今日はーー月－－日
                    </p>
                    <p>
                     ただいまの天気はーー ただいまの温度はーー
                    </p>
                    <p>
                    今日も一日張り切っていきましょう張り切っていきましょう
                    </p>
                </div>
            </div>
            
            <div  id="faq-container">
                <h1>よくある質問</h1>
                
                <h2>Q:服装の登録はどうするの</h2>
                <p>A,下の＋アイコンから登録してください</p>
                
                <h2>Q:選ぶ服が無いと言われた</h2>
                <p>A,トップスは半袖、七分丈、長袖を一つずつ、ボトムスとアウターウェアも一つずつ登録してください登録してください</p>
                
                <h2>Q:削除するにはどうすればいいでしょうか</h2>
                <p>A,リストから削除をお願いします</p>
                
                <h2>Q:編集したい</h2>
                <p>A,リストから編集をお願いします</p>
                
                <h2>Q:削除を取り消したい</h2>
                <p>A,下のゴミ箱ボタンから取り消せます</p>
                
                <h2>Q:削除したデータが無いが無い</h2>
                <p>A,削除後3日経つとデータは消えます<br>
                ご了承ください</p>
        
            </div>
        </div>

         </x-app-layout>
    
    
    
    </body>
</html>

