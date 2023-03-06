<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class EnsureDatabaseConnection
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
        try {

        //       if (isset($_SERVER['HTTPS']) &&
        //       ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
        //      isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        //         $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {

        //   }
        //   else {
        //      $url = "https://";
        //     $url.= $_SERVER['HTTP_HOST'];
        //     $url.= $_SERVER['REQUEST_URI'];
        //      return  redirect()->away($url);
        //  }

            DB::connection()->getPdo();
            return $next($request);
        } catch (\Exception $e) {
        //   return redirect()->route('server.down');
        // dd("sdfdsf");
         return new response(view('server.busy'));
        }

    }
}
