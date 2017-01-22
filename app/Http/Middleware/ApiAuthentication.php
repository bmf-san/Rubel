<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuthentication
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
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
		if ($this->auth->guard($guard)->check()) {
			switch ($guard) {
				case 'admin':
					return $next($request);
					break;

				default:
					return $next($request);
					break;
			}
		}

		abort(401);
    }
}
