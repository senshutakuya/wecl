// deletePost.js

// 'use strict'; は、JavaScript内での厳格モード（strict mode）を有効にするための宣言

function deletePost(id) {
    'use strict';

    // confirmでポップアップ画面に選択肢を出す
    if (confirm('削除してから3日経つと復元できません。\n本当に削除しますか？')) {
        // getelmentByIdでid="form_ $post->id "の部分を入手
        // ﾊﾞｯｸｸｫｰﾃｰｼｮﾝを使う事で$変数を使える
        document.getElementById(`form_${id}`).submit();
        // submitで送信
    }
}
