function getWeatherImageURL(description) {
    switch (description) {
        case '晴れ':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark01_hare.png';
        case '雲':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark05_kumori.png';
        case '雨':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark02_ame.png';
        case '雷':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark07_kaminari.png';
        case '雪':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark08_yuki.png';
        case '曇りがち':
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/tenki_mark05_kumori.png';
        // 他のケースも同様に追加
        default:
            return 'https://wecl-bucket.s3.ap-northeast-1.amazonaws.com/sozai/%E3%83%9B%E3%83%BC%E3%83%A0%E7%94%BB%E9%9D%A2/mark_question.png';
    }
}

// $weatherInfo がセットされている場合に画像を表示
const weatherInfo = document.getElementById('weather_info').innerText.trim();
if (weatherInfo) {
    const imageUrl = getWeatherImageURL(weatherInfo);
    document.getElementById('weather_image').innerHTML = `<img src="${imageUrl}" alt="${weatherInfo}">`;
}
