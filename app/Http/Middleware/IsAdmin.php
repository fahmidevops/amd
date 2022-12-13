<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        // if (!auth()->check() || auth()->user()->username != 'fahmibo') { //check menghasilkan nilai true ketika user sudah login. Kalau ditambah not ! berarti melakukan pengecekan ketika belum login
        //     abort(403); // 403 forbidden
        // }

        if (!auth()->check() || !auth()->user()->is_admin) { //check menghasilkan nilai true ketika user sudah login. Kalau ditambah not ! berarti melakukan pengecekan ketika belum login
            abort(403); // 403 forbidden
        }

        return $next($request);
    }
}
