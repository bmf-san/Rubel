<?php

namespace Rubel\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
use Rubel\Http\Controllers\Controller;
use Rubel\Http\Requests\Api\v1\Authenticate\AuthenticateRequest;

class AuthenticateController extends Controller
{
    /**
     * INVALID_CREDENTIAL_ERROR_MESSAGE
     *
     * @var string
     */
    const INVALID_CREDENTIAL_ERROR_MESSAGE = 'These credentials do not match our records.';

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
     * @return JsonResponse
     */
    public function authenticate(AuthenticateRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = $this->jwtAuth->attempt($credentials)) {
                return response()->json([
                    'errors' => [
                        'email' => self::INVALID_CREDENTIAL_ERROR_MESSAGE,
                        'password' => self::INVALID_CREDENTIAL_ERROR_MESSAGE,
                    ]
                ], Response::HTTP_UNAUTHORIZED);
            }
        } catch (JWTException $e) {
            return response()->json(['errors' => 'could_not_create_token'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(compact('token'));
    }
}
