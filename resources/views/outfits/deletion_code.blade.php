<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>削除したコーデのリスト</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>削除した服のリスト</h1>
                </header>
            </x-slot>
            
            <div class="pagination">
                {{ $deletion_code->links() }}
            </div>
            
       
        @foreach($deletion_code as $data)
            @if($data->o_id == null)
                <h2>トップス</h2>
                <img src="{{ $data->t_frontimage }}" alt="コーデの写真が不足している可能性があります.">
                <img src="{{ $data->t_backimage }}" alt="コーデの写真が不足している可能性があります.">
                
                <br>
                <h2>ボトムス</h2>
                <img src="{{ $data->b_frontimage }}" alt="コーデの写真が不足している可能性があります.">
                <img src="{{ $data->b_backimage }}" alt="コーデの写真が不足している可能性があります.">
                <br>
                
                <br><br>
            @else
                <h2>アウター</h2>
                <img src="{{ $data->o_frontimage }}" alt="コーデの写真が不足している可能性があります.">
                <img src="{{ $data->o_backimage }}" alt="コーデの写真が不足している可能性があります.">
                <br>
                
                <h2>トップス</h2>
                <img src="{{ $data->t_frontimage }}" alt="コーデの写真が不足している可能性があります.">
                <img src="{{ $data->t_backimage }}" alt="コーデの写真が不足している可能性があります.">
                
                <br>
                <h2>ボトムス</h2>
                <img src="{{ $data->b_frontimage }}" alt="コーデの写真が不足している可能性があります.">
                <img src="{{ $data->b_backimage }}" alt="コーデの写真が不足している可能性があります.">
                <br>
                
                <br><br>
            
            @endif
            
            <button>
            <a href="{{ route('restore_code_Record', ['post' => $data->id]) }}">復元</a>
            </button>
            <br><br>
            <form action="/deletion_data/code/{{ $data->id }}" id="form_{{ $data->id }}" method="post">
                <!--deletion_datas/idに送信、idはform_idとするメソッドはdeletion_data-->
                @csrf
                <!--csrf対策-->
                @method('DELETE')
                <!--HTMLでDELETEはサポートされていないから-->
                <button type="button" onclick="deletion_data({{ $data->id }})">完全削除</button> 
                <!--JavaScriptで処理を書くからsubmitじゃなくてbuttonにする-->
                <!--onclickにはこのボタンがクリックされた場合の処理を書く今回だとidを格納している-->
                <!--この格納したidはJavaScriptのdeletedeletion_dataの引数に使われる。-->
            </form>
            
            <br><br>
        @endforeach
        
        <div class="pagination">
            {{ $deletion_code->links() }}
        </div>
    
    </x-app-layout>
     <!--先にHTMLを読み込ませて表示速度を上げる為scriptはbodyの一番後ろ-->
        <!-- 外部のJavaScriptファイルを読み込む -->
        <!--public/js/deletion_data.jsを読み込む-->
        <script src="{{ asset('js/deletion_data.js') }}"></script>
    </body>
</html>

