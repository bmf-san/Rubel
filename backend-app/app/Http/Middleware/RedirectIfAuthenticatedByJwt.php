<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class RedirectIfAuthenticatedByJwt
{
    public function __construct(JWTAuth $jwt_auth)
    {
        $this->jwt_auth = $jwt_auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = $this->jwt_auth->toUser($request->header('Authorization'));
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['error'=>'Token is Invalid']);
            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['error'=>'Token is Expired']);
            } else {
                return response()->json(['error'=>'Something is wrong']);
            }
        }

        return $next($request);
    }
}
