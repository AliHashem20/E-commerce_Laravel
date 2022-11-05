<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserLoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        // eza 3emel login w meshe lhal reje3 bdo yrouh 3ala login page, by5do 3ala lhome page, ela eza 3mel logout by2dar se3eta yerja3 y3ml login
        if($request->path() == "login" && $request->session()->has('user')) {
            return redirect('/');
        }
        return $next($request);
    }
}
