<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>code_list</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <header>
                <h1>code_list</h1>
                </header>
            </x-slot>
            
            <div class="pagination">
                {{ $code_list->links() }}
            </div>
            
            
            
        @foreach($code_list as $code)
        
            
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
        @endforeach
        
        <div class="pagination">
            {{ $code_list->links() }}
        </div>
    
    </x-app-layout>
    </body>
</html>

