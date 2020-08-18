<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class MerchantMiddleware
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
        if ($request->user() && $request->user()->user_type != 'merchant')
        {
            return new Response(view('unauthorized')->with('role', 'MERCHANT'));
        }
        return $next($request);
    }
}
