<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionVerify
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
        if($request->session()->has('type')){
            return $next($request);
        }else{
            $request->session()->flash('msg', 'Invalid Session');
            return redirect()->route('signin.index');
        }
    }
}
