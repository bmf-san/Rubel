<?php

namespace Rubel\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Auth\AuthException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  Exception  $exception
     * @return Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  Request  $request
     * @param  AuthenticationException  $exception
     * @return Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], Response::HTTP_UNAUTHORIZED);
        }

        return redirect()->guest('/');
    }

    /**
     * Override default method - render the given HttpException.
     *
     * @param  HttpException  $e
     * @return Response
     */
    protected function renderHttpException($e)
    {
        $status = $e->getStatusCode();
        $errorMessages = $this->handleErrorMessages($status);

        return response()->view(get_the_view_path('errors.index'), ['errorMessages' => $errorMessages], $status);
    }

    /**
     * Handle error messages.
     *
     * @param  int $status
     * @return string
     */
    private function handleErrorMessages($status)
    {
        $errorMessages['status'] = $status;

        switch ($status) {
            case Response::HTTP_UNAUTHORIZED:
                return $errorMessages['message'] = 'Unauthorized';
                break;

            case Response::HTTP_FORBIDDEN:
                return $errorMessages['message'] = 'forbidden';
                break;

            case Response::HTTP_NOT_FOUND:
                $errorMessages['message'] = 'Not Found';
                break;

            case Response::HTTP_INTERNAL_SERVER_ERROR:
                $errorMessages['message'] = 'Internal Server Error';
                break;

            case Response::HTTP_SERVICE_UNAVAILABLE:
                $errorMessages['message'] = 'Service Unavailable';
                break;
        }

        return $errorMessages;
    }
}
