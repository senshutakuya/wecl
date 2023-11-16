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
            .then(response => response.json())
            .then(data => {
                // 天気情報を表示
                console.log(latitude,longitude,data.name,data);
                // 現地の日付を取得
                const localDate = new Date();
                // 日付をフォーマット
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                const formattedDate = localDate.toLocaleDateString('ja-JP', options);
                // 天気説明を日本語に翻訳して表示
                const weatherDescriptionJapanese = translateWeatherDescription(data.weather[0].description);
                const weatherLocation = `${data.sys.country}, ${data.name}`;
                document.getElementById("weather_location").textContent = 'ただいまの天気';
                document.getElementById("weather_temperature").textContent = `${Math.round(data.main.temp)}°C`;
                document.getElementById("weather_description").textContent = weatherDescriptionJapanese;
                // メッセージを構築
                const message = `
                    <p>
                        今日は${formattedDate}
                    </p>
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
        
        // 他にも必要なパターンを追加
        // case '追加したい状態':
        //     return '状態に対する日本語表現';
        default:
            return '雲り'; // デフォルトはそのままの値を返す
    }
}


