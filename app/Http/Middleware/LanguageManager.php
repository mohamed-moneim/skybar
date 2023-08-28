<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LanguageManager
{

 public function handle(Request $request, Closure $next)
    {   
        \LaravelLocalization::setLocale($request->session()->get('locale'));
        return $next($request);
    }
}
