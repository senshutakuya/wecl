document.addEventListener("DOMContentLoaded", function () {
    // 現地の日付を取得
    const localDate = new Date();
    // 日付をフォーマット
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = localDate.toLocaleDateString('ja-JP', options);
    
    const today =`
                    <p>
                        今日は${formattedDate}
                    </p>
                `;
    document.getElementById("today").innerHTML = today;
});