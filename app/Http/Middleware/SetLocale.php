<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // If user is not logged, get browser language
        $language = strtolower(substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2));
        if ($language == 'tr')
            App::setLocale('tr');

        // If user is logged, get user defined language
        if (Auth::check())
            App::setLocale(Auth::user()->language);

        return $next($request);
    }
}
