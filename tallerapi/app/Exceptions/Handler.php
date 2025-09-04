<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    private $url = [
        'article',
        'category',
        'entry',
        'issue',
        'person',
        'presentation',
        'role',
        'supplier',
        'unit',
        'user'
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            //AÑADIR EL PREFIJO A LA LISTA DE URLS
            $urlFinal = preg_filter('/^/', 'api/', $this->url);
            //AÑADIR EL SUFIJO / A LA LISTA DE URLS
            $urlFinal = preg_filter('/$/', '/*', $urlFinal);

            if ($request->is($urlFinal)) {
                return response()->json([
                    'message' => 'Registro no encontrado'
                ], Response::HTTP_NOT_FOUND);
            }
        });

        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            return response()->json([
                'message' => 'Metodo no encontrado o soportado'
            ], Response::HTTP_METHOD_NOT_ALLOWED);
        });
    }

    public function render($request, Throwable $e) {
        if ($e instanceof AuthorizationException) {
            return response()->json([
                'message' => 'Acceso denegado'
            ],Response::HTTP_FORBIDDEN);
        }
        if ($e instanceof RouteNotFoundException) {
            return response()->json([
                'message' => 'Debe iniciar sesion'
            ],Response::HTTP_UNAUTHORIZED);
        }

        return parent::render($request,$e);
    }
}
