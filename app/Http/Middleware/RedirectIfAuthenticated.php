<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAuthenticated
{
    protected $auth;

    public function __construct(\Illuminate\Contracts\Auth\Factory $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->check()) {
            switch ($guard) {
                case 'admins':
                    return redirect('/admin/dashboard');
                    break;

                default:
                    return redirect('/admin/dashboard');
                    break;
            }
        }

        return $next($request);
    }
}
