<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class LanguageSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        App::setLocale(Session::has('locale') ? Session::get('locale') : 'ar');
        return $next($request);
    }
}
