<?php

namespace App\Http\Middleware;

use App\Providers\AuthServiceProvider;
use Closure;
use Illuminate\Support\Facades\Gate;

class CheckModule
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
//        dd($request->path());
        if (Gate::allows(AuthServiceProvider::ACCESS_MODULE, $request->path())) {
            return $next($request);
        }
        return redirect('/')->withMessage('Anda tidak memiliki akses pada halaman tersebut');
    }
}
