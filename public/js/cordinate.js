function validateForm() {
    var inputPlace = document.getElementById("input_place").value;
    // 正規表現でパターンマッチング
    var pattern = /(区|都|県)$/; // 修正: 行の末尾でのマッチング
    if (!pattern.test(inputPlace)) {
        alert("地名は「区」か「都」か「県」で終わる必要があります。");
        return false; // フォームの送信を中止
    }
    return true; // フォームの送信を継続
}
