<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>code_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/base/list_base.css') }}">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>コーデ一覧</h1>
                </header>
            </x-slot>
            <div id="wrapper">
                <div class="pagination">
                    {{ $code_list->links() }}
                </div>
                
                
                
            @foreach($code_list as $code)
            <div class="list">
                
                @if($code->o_id == null)
                    <h2>トップス</h2>
                    <img src="{{ $code->t_frontimage }}" alt="コーデの写真が不足している可能性があります.">
                    <img src="{{ $code->t_backimage }}" alt="コーデの写真が不足している可能性があります.">
                    
                    <br>
                    <h2>ボトムス</h2>
                    <img src="{{ $code->b_frontimage }}" alt="コーデの写真が不足している可能性があります.">
                    <img src="{{ $code->b_backimage }}" alt="コーデの写真が不足している可能性があります.">
                    <br>
                    
                    <br><br>
                @else
                    <h2>アウター</h2>
                    <img src="{{ $code->o_frontimage }}" alt="コーデの写真が不足している可能性があります.">
                    <img src="{{ $code->o_backimage }}" alt="コーデの写真が不足している可能性があります.">
                    <br>
                    
                    <h2>トップス</h2>
                    <img src="{{ $code->t_frontimage }}" alt="コーデの写真が不足している可能性があります.">
                    <img src="{{ $code->t_backimage }}" alt="コーデの写真が不足している可能性があります.">
                    
                    <br>
                    <h2>ボトムス</h2>
                    <img src="{{ $code->b_frontimage }}" alt="コーデの写真が不足している可能性があります.">
                    <img src="{{ $code->b_backimage }}" alt="コーデの写真が不足している可能性があります.">
                    <br>
                    
                    <br><br>
                @endif
                <form action="/list/code/{{ $code->id }}" id="form_{{ $code->id }}" method="post">
                    <!--posts/idに送信、idはform_idとするメソッドはpost-->
                    @csrf
                    <!--csrf対策-->
                    @method('DELETE')
                    <!--HTMLでDELETEはサポートされていないから-->
                    <button id="delete_button" type="button" onclick="deletePost({{ $code->id }})">削除</button> 
                    <!--JavaScriptで処理を書くからsubmitじゃなくてbuttonにする-->
                    <!--onclickにはこのボタンがクリックされた場合の処理を書く今回だとidを格納している-->
                    <!--この格納したidはJavaScriptのdeletePostの引数に使われる。-->
                </form>
                
                    <br><br>
                    
                
            </div>  
            @endforeach
            
            <div class="pagination">
                {{ $code_list->links() }}
            </div>
        </div>
    
    </x-app-layout>
    <script src="{{ asset('js/deletePost.js') }}"></script>
    </body>
</html>

