<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if($request->is('admin/*')){
            if(Auth::guard('admin')->check()){
                return redirect()->route('admin.home');
            }  
        }elseif(Auth::guard($guards)->check()){
            return redirect(RouteServiceProvider::HOME);
        } 

        return $next($request);
    }
}
