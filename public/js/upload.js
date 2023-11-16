document.addEventListener('DOMContentLoaded', function () {
    // 初期設定
    updateColorOptions();
    updatecategoryOptions();

    // 印象が変更されたときのイベントリスナー
    document.getElementById('impressionSelect').addEventListener('change', function () {
        updateColorOptions();
    });
    
    document.getElementById('partSelect').addEventListener('change', function () {
        updatecategoryOptions();
    });
    
});





// カラーオプションの変更
function updateColorOptions() {
    var selectedImpression = document.getElementById('impressionSelect').value;

    // すべての色の選択肢を非表示にする
    var colorOptions = document.getElementById('colorSelect').getElementsByTagName('option');
    for (var i = 0; i < colorOptions.length; i++) {
        colorOptions[i].style.display = 'none';
    }

    // デバッグ: 選択された印象をログに表示
    // console.log('Selected Impression:', selectedImpression);
    
    // JSON文字列をJavaScriptオブジェクトに変換
    var jsonObject = JSON.parse(selectedImpression);
    
    // idプロパティを取得
    var idValue = jsonObject.id;
    
    // 結果をコンソールに表示
    // console.log('idValue:', idValue);
    
    if (idValue == 1) {
        // idがco_oneのオプションだけ表示
        // idがco_twoのものは非表示
        var coOneOptions = document.querySelectorAll('#colorSelect option[id="co_one"]');
        for (var i = 0; i < coOneOptions.length; i++) {
            coOneOptions[i].style.display = 'block';
        }
        
        // idがco_twoのオプションは非表示に
        var coTwoOptions = document.querySelectorAll('#colorSelect option[id="co_two"]');
        for (var i = 0; i < coTwoOptions.length; i++) {
            coTwoOptions[i].style.display = 'none';
        }
        
        // 初期値をidがco_oneのvalue=1にする
        document.getElementById('colorSelect').value = 1;
    } else {
        // idがco_twoのオプションだけ表示
        // idがco_oneのものは非表示
        var coTwoOptions = document.querySelectorAll('#colorSelect option[id="co_two"]');
        for (var i = 0; i < coTwoOptions.length; i++) {
            coTwoOptions[i].style.display = 'block';
        }
        
        // idがco_oneのオプションは非表示に
        var coOneOptions = document.querySelectorAll('#colorSelect option[id="co_one"]');
        for (var i = 0; i < coOneOptions.length; i++) {
            coOneOptions[i].style.display = 'none';
        }
        
        // 初期値をidがco_twoのvalue=12にする
        document.getElementById('colorSelect').value = 12;
    }
    
    
    
// パートとスタイルの変更

    
    
    
    
    
    
    
}

// カテゴリーオプションの変更
function updatecategoryOptions() {
    var selectedpart = document.getElementById('partSelect').value;
    
    // JSON文字列をJavaScriptオブジェクトに変換
    var jsonObject = JSON.parse(selectedpart);
    
    // idプロパティを取得
    var idValue = jsonObject.id;
    
    // 結果をコンソールに表示
    console.log('idValue:', idValue);
    
    // カテゴリーオプションの変更
    var categoryOptions = document.querySelectorAll('#categorySelect option');
    for (var i = 0; i < categoryOptions.length; i++) {
        if (idValue == 1) {
            // idが1の場合、idがtopsのオプションだけ表示
            if (categoryOptions[i].id === 'tops') {
                categoryOptions[i].style.display = 'block';
            } else {
                categoryOptions[i].style.display = 'none';
            }
        } else if (idValue == 2) {
            // idが2の場合、idがbotmsのオプションだけ表示
            if (categoryOptions[i].id === 'botms') {
                categoryOptions[i].style.display = 'block';
            } else {
                categoryOptions[i].style.display = 'none';
            }
        } else if (idValue == 3) {
            // idが3の場合、idがdoresのオプションだけ表示
            if (categoryOptions[i].id === 'outerware') {
                categoryOptions[i].style.display = 'block';
            } else {
                categoryOptions[i].style.display = 'none';
            }
        } else if (idValue == 4) {
            // idが4の場合、idがouterwareのオプションだけ表示
            if (categoryOptions[i].id === 'dores') {
                categoryOptions[i].style.display = 'block';
            } else {
                categoryOptions[i].style.display = 'none';
            }
        } else if (idValue == 6) {
            // idが5の場合、idがaccessoryのオプションだけ表示
            if (categoryOptions[i].id === 'accessory') {
                categoryOptions[i].style.display = 'block';
            } else {
                categoryOptions[i].style.display = 'none';
            }
        } else if (idValue == 7) {
            // idが6の場合、idがshoesのオプションだけ表示
            if (categoryOptions[i].id === 'shoes') {
                categoryOptions[i].style.display = 'block';
            } else {
                categoryOptions[i].style.display = 'none';
            }
        } else if (idValue == 8) {
            // idが7の場合、idがoverlapのオプションだけ表示
            if (categoryOptions[i].id === 'overlap') {
                categoryOptions[i].style.display = 'block';
            } else {
                categoryOptions[i].style.display = 'none';
            }
        } else {
            // それ以外の場合、idがtopsのオプションだけ表示
            if (categoryOptions[i].id === 'tops') {
                categoryOptions[i].style.display = 'block';
            } else {
                categoryOptions[i].style.display = 'none';
            }
        }
    }
    
    // 初期値の設定
    if (idValue == 1) {
        // 初期値をidがtopsのvalue=1にする
        document.getElementById('categorySelect').selectedIndex = 0;
        console.log('Initial value set to tops:', document.getElementById('tops').value);
    } else if (idValue == 2) {
        // 初期値をidがbotmsのvalue=2にする
        document.getElementById('categorySelect').selectedIndex = 8;
        console.log('Initial value set to botms:', document.getElementById('botms').value);
    } else if (idValue == 3) {
        // 初期値をidがbotmsのvalue=2にする
        document.getElementById('categorySelect').selectedIndex = 24;
        console.log('Initial value set to botms:', document.getElementById('outerware').value);
    } else if (idValue == 4) {
        // 初期値をidがbotmsのvalue=2にする
        document.getElementById('categorySelect').selectedIndex = 16;
        console.log('Initial value set to botms:', document.getElementById('dores').value);
    } else if (idValue == 6) {
        // 初期値をidがbotmsのvalue=2にする
        document.getElementById('categorySelect').selectedIndex = 32;
        console.log('Initial value set to botms:', document.getElementById('accessory').value);
    } else if (idValue == 7) {
        // 初期値をidがbotmsのvalue=2にする
        document.getElementById('categorySelect').selectedIndex = 38;
        console.log('Initial value set to botms:', document.getElementById('shoes').value);
    } else if (idValue == 8) {
        // 初期値をidがbotmsのvalue=2にする
        document.getElementById('categorySelect').selectedIndex = 46;
        console.log('Initial value set to botms:', document.getElementById('overlap').value);
    } else{
         // 初期値をidがtopsのvalue=1にする
        document.getElementById('categorySelect').selectedIndex = 0;
        console.log('Initial value set to tops:', document.getElementById('tops').value);
    }
}
