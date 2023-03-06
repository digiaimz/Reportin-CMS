<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class APIAuthentication
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
        $data= [];
        if(!$request->has('api_token'))
        {
            $set['error'] = true;
            $set['authenticaion'] = false;
            $set['message'] = "API token is required";
           return $this->set_json_response($set ,  $data);
        }
        if($request->api_token == NULL || TRIM($request->api_token) == '' )
        {
            $set['error'] = true;
            $set['authenticaion'] = false;
            $set['message'] = "API token is required";
           return $this->set_json_response($set ,  $data);
        }
        if(!User::where('api_token', $request->api_token)->count())
        {
            $set['error'] = true;
            $set['authenticaion'] = false;
            $set['message'] = "API Token Not Valid - Logout This User";
           return $this->set_json_response($set ,  $data);
        }

        return $next($request);
    }
    function set_json_response($response , $data)
    {
        $response['data'] = $data;
        return response(str_replace('&amp;', '&', json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)) , 200)
        ->header('Content-Type', 'application/json; charset=utf-8');
    }
}
