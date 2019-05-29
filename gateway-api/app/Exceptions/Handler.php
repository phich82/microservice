<?php

namespace App\Exceptions;

use Exception;
use App\Traits\ApiResponse;
use Illuminate\Http\Response;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    use ApiResponse;

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
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
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof HttpException) {
            $code = $exception->getStatusCode();
            $message = Response::$statusTexts[$code];

            return $this->error_api($message, $code);
        }

        if ($exception instanceof ModelNotFoundException) {
            $model = strtolower(class_basename($exception->getModel()));
            $message = "Does not exist any instance of {$model} with the given id";

            return $this->error_api($message, Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof AuthorizationException) {
            return $this->error_api($exception->getMessage(), Response::HTTP_FORBIDDEN);
        }

        if ($exception instanceof AuthenticationException) {
            return $this->error_api($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }

        if ($exception instanceof ValidationException) {
            $errors = $exception->validator->errors()->getMessages();
            return $this->error_api($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($exception instanceof ClientException) {
            return $this->error_message($exception->getResponse()->getBody(), $exception->getCode());
        }

        if (env('APP_DEBUG', false)) {
            return parent::render($request, $exception);
        }

        return $this->error_api('Unexpected error. Try later.', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
