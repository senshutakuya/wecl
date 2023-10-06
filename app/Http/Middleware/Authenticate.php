<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth; // Auth クラスをインポート

class Authenticate extends Middleware
{
    public function handle($request, Closure $next,...$guards)
    {
        if (!Auth::check()) {
            // ログインしていない場合、ログインページにリダイレクト
            return redirect('/register');
        }

        return $next($request);
    }
}