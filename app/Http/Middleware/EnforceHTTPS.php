<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class EnforceHTTPS
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

        if(App::environment("production") && !$request->secure()) {
            // redirect to same URL but with https
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
