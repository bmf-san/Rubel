<?php

namespace Rubel\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest('/');
    }

    /**
     * Override default method - render the given HttpException.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpException  $e
     * @return \Illuminate\Http\Response
     */
    protected function renderHttpException(\Symfony\Component\HttpKernel\Exception\HttpException $e)
    {
        $status = $e->getStatusCode();
        $errorMessages = $this->handleErrorMessages($status);

        view()->replaceNamespace('errors', [
            resource_path('views/errors'),
            __DIR__.'/views',
        ]);
        if (view()->exists("errors.index")) {
            return response()->view("errors.index", ['errorMessages' => $errorMessages], $status);
        } else {
            return $this->convertExceptionToResponse($e);
        }
    }

    /**
     * Handle error messages.
     *
     * @param  int $status
     * @return [type]         [description]
     */
    private function handleErrorMessages($status)
    {
        $errorMessages['status'] = $status;

        switch ($status) {
            case '401':
                return $errorMessages['message'] = 'Unauthorized';
                break;

            case '403':
                return $errorMessages['message'] = 'forbidden';
                break;

            case '404':
                $errorMessages['message'] = 'Not Found';
                break;

            case '500':
                $errorMessages['message'] = 'Internal Server Error';
                break;

            case '503':
                $errorMessages['message'] = 'Service Unavailable';
                break;
        }

        return $errorMessages;
    }
}
