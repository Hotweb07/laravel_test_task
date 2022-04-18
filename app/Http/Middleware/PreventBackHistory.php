<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventBackHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        //validate auth/user can not acccess his autheticated pages after logout using back button
        return $response->header('Cache-Control', 'nocache,no-store,max-age=0,must-revalidate')
                        ->header('Pragma','no-cache')
                        ->header('Expires', 'Sun, 02 Jan 1990 00:00:00 GTM');
    }
}
