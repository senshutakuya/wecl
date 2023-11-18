// weather.js
document.addEventListener("DOMContentLoaded", function () {
    // OpenWeatherMap APIキー
    const apiKey = "54000d99cbc9d1a4d126abc2b3f7c5a7";

    // 現在の位置を取得
    navigator.geolocation.getCurrentPosition(function (position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        // 天気情報を取得するためのURL
        const apiUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}&units=metric`;

        // APIから天気情報を取得
        fetch(apiUrl)
            .then(response => {
                console.log("API Response:", response);
                // console.log(response.json());
                return response.json();
                
                
            })
            
            .then(data => {
                console.log("緯度:", latitude);
                console.log("経度:", longitude);
                console.log("地名:", data.name);
                console.log("天気データ:", data);

                // 天気情報を表示
                // console.log(latitude,longitude,data.name,data);
                // 現地の日付を取得
                const localDate = new Date();
                // 日付をフォーマット
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                const formattedDate = localDate.toLocaleDateString('ja-JP', options);
                // 天気説明を日本語に翻訳して表示
                const weatherDescriptionJapanese = translateWeatherDescription(data.weather[0].description);
                console.log(weatherDescriptionJapanese);
                const weatherLocation = `${data.sys.country}, ${data.name}`;
                document.getElementById("weather_location").textContent = 'ただいまの天気';
                document.getElementById("weather_temperature").textContent = `${Math.round(data.main.temp)}°C`;
                document.getElementById("weather_description").textContent = weatherDescriptionJapanese;
                
                // 画像を表示する要素に画像を設定
                const weatherImageElement = document.getElementById('weather_image');
    
                if (weatherImageElement) {
                    const imgElement = document.createElement('img');
                    imgElement.src = translateWeatherImage(data.weather[0].description);
                    console.log(data.weather[0].description);
                    weatherImageElement.appendChild(imgElement);
                } else {
                    console.error('Element with id "weather_image" not found.');
                }
                
                // メッセージを構築
                const message = `
                    
                    <p>
                        ただいまの天気は${weatherDescriptionJapanese} 
                        ただいまの温度は${Math.round(data.main.temp)}°C
                    </p>
                    <p>
                        今日も一日張り切っていきましょう
                    </p>
                `;

                // メッセージを表示するための要素に挿入
                document.getElementById("comment").innerHTML = message;
                
                
                
                
                
            })
            .catch(error => console.error("Error fetching weather data:", error));
    });
});


// 天気説明を日本語に翻訳する関数
function translateWeatherDescription(description) {
    // 翻訳パターンの追加
    switch (description) {
        case 'Clear':
            return '晴れ';
        case 'Clouds':
            return '曇り';
        case 'Rain':
            return '雨';
        case 'Snow':
            return '雪';
        case 'broken clouds':
            return '散会した雲';
        case 'few clouds':
            return '雲が少ない';
        case 'light rain':
            return '小雨'
        
        // 他にも必要なパターンを追加
        // case '追加したい状態':
        //     return '状態に対する日本語表現';
        default:
            return 'その他'; // デフォルトはそのままの値を返す
    }
}

// 天気によってひょうじする画像を変える
function translateWeatherImage(description) {
    // 翻訳パターンの追加
    switch (description) {
        case 'Clear':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark01_hare.png';
        case 'Clouds':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark05_kumori.png';
        case 'Rain':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark02_ame.png';
        case 'Snow':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark08_yuki.png';
        case 'broken clouds':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark05_kumori.png';
        case 'few clouds':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark05_kumori.png';
        case 'Thunder':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark07_kaminari.png';
        case 'light rain':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark02_ame.png';
        
        // 他にも必要なパターンを追加
        // case '追加したい状態':
        //     return 'その状態に対応する画像のパス';
        default:
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/mark_question.png'; // デフォルトはクエスッションマークを返す
    }
}


