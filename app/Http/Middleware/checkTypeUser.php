<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkTypeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next , ...$type)
    {
       $user = $request->user();
       
        if (! in_array($user->type, $type)) {
            abort(403,'عفوًا ،أنت لا تملك الصلاحيات للدخول لهذه الصفحة');
        }
        
        return $next($request);
    }
}
