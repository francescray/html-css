<?php

namespace App\Http\Middleware;

use App\Http\Responses\API;
use App\Model\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UserMiddleware
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
        if (User::check() == false) {
            if ($request->ajax() || $request->wantsJson()) {
                return API::error(['code' => 101, '' => '']);
            } else {
                return redirect()->guest('user/login');
            }
        }

        return $next($request);
    }
}
