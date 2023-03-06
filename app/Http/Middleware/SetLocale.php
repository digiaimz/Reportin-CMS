<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
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

        if($request->locale == "ur")
        {
            App::setLocale('ur');
        }
        if($request->locale == "en")
        {
            App::setLocale('en');
        }
        if( session('lang', 'en') == 'en' )
        {
            App::setLocale('en');
        }
        else
        {
            App::setLocale('ur');
        }





        return $next($request);
    }
}
