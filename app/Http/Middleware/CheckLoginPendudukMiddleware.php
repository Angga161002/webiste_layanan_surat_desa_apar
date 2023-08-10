<?php

namespace App\Http\Middleware;

use Closure;
use RealRashid\SweetAlert\Facades\Alert;

class CheckLoginPendudukMiddleware
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
        if (session()->has('nik')) {
            return $next($request);
        } else {
            return redirect('/')->with('warning', 'Silahkan Login Terlebih Dahulu!');
        }
    }
}
