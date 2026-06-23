<?php

namespace App\Exceptions;

use App\Messages\ErrorMessage;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\HttpFoundation\JsonResponse as SymfonyResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use URL;

class Handler extends ExceptionHandler
{
    const ERROR_MESSAGES = 'errors';
    const WARNING_MESSAGES = 'warnings';
    const INFO_MESSAGES = 'info';

    protected $dontReport = [
        AuthenticationException::class,
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        TokenMismatchException::class,
        ValidationException::class
    ];

    public function report(Throwable $exception): void
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        if (ob_get_status()) {
            ob_end_clean();
        }

        if ($this->hasMiddleware('api', $request)) {
            if ($exception instanceof HttpResponseException) {
                return $exception->getResponse();
            } elseif ($exception instanceof ModelNotFoundException) {
                $exception = new NotFoundHttpException($exception->getMessage(), $exception);
            } elseif ($exception instanceof AuthenticationException) {
                return $this->unauthenticated($request, $exception);
            } elseif ($exception instanceof AuthorizationException) {
                $exception = new HttpException(403, $exception->getMessage());
            } elseif ($exception instanceof ValidationException && $exception->getResponse()) {
                return $exception->getResponse();
            }

            return $this->toIlluminateResponse($this->convertExceptionToJsonResponse($exception), $exception);
        }

        if ($exception instanceof AuthorizationException) {
            return $this->convertAuthorizationExceptionToResponse($exception);
        } elseif ($exception instanceof MessageException) {
            return $this->convertMessageExceptionToResponse($exception);
        }

        return parent::render($request, $exception);
    }

    protected function hasMiddleware($middleware, $request)
    {
        if ($request->route() !== null) {
            return in_array($middleware, $request->route()->middleware());
        } else {
            return false;
        }
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }

    protected function convertExceptionToJsonResponse(Throwable $e)
    {
        $flattened = FlattenException::createFromThrowable($e);

        $json = ['error' => [
            'status' => (string)$flattened->getStatusCode(),
            'message' => $flattened->getMessage()
        ]];

        if (config('app.debug')) {
            $json['error']['meta'] = ['trace' => $flattened->getTrace()];
        }

        return new SymfonyResponse($json, $flattened->getStatusCode(), $flattened->getHeaders());
    }

    protected function convertAuthorizationExceptionToResponse(AuthorizationException $e)
    {
        return $this->redirectWithMessage($e->getMessage());
    }

    protected function redirectWithMessage($message, $messageType = ErrorMessage::TYPE, $redirectTo = null)
    {
        if (isset($redirectTo)) {
            return redirect()->to($redirectTo)->with([$messageType => [$message]]);
        } elseif (0 === strpos(URL::previous(), request()->root()) && URL::previous() != URL::full()) {
            return redirect()->to(URL::previous())->with([$messageType => [$message]]);
        } else {
            return redirect()->to('/')->with([$messageType => [$message]]);
        }
    }

    protected function convertMessageExceptionToResponse(MessageException $e)
    {
        return $this->redirectWithMessage($e->getMessage(), $e->getMessageObject()->getType(), $e->getRedirectTo());
    }
}
