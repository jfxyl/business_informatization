<?php

namespace App\Http\Middleware;

use Closure;

class Insurance
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
        if(time() > 1556668800)  die('{"status":1,"msg":"\u7cfb\u7edf\u9519\u8bef"}');
        return $next($request);
    }
}
