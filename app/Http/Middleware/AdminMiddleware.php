<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role != "admin"){
            //ini harusnya untuk output

            return redirect()->to('/');
        }
        return $next($request);
    }
}
