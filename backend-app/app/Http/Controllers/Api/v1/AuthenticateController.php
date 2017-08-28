<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Authenticate\AuthenticateRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthenticateController extends Controller
{
    /**
     * Status code unauthorized
     *
     * @var int
     */
    const STATUS_CODE_UNAUTHORIZED = 400;

    /**
     * Status code internal server error
     *
     * @var int
     */
    const STATUS_CODE_INTERNAL_SERVER_ERROR = 400;

    /**
     * AuthenticateController constructor
     *
     * @param JWTAuth $jwtAuth
     */
    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }

    /**
     * Authenticate
     *
     * @param  AuthenticateRequest $request
     * @return \Illuminate\Http\JsonResponse;
     */
    public function authenticate(AuthenticateRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = $this->jwtAuth->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], (int) self::STATUS_CODE_UNAUTHORIZED);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], (int) self::STATUS_CODE_INTERNAL_SERVER_ERROR);
        }

        return response()->json(compact('token'));
    }
}
