<?php

namespace Rubel\Http\Middleware;

use Illuminate\Contracts\Auth\Factory;
use Closure;

class RedirectIfAuthenticated
{
    /**
     * Factory
     *
     * @var Factory
     */
    protected $auth;

    public function __construct(Factory $auth)
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
                    return redirect('admin/dashboard');
                    break;

                default:
                    return $next($request);
                    break;
            }
        }

        return $next($request);
    }
}
