<?php

use App\Http\CustomExceptions;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            Route::middleware('api')
                ->prefix('api/v1')
                ->group(__DIR__ . '/../routes/api/api_v1.php');
            Route::middleware('api')
                ->prefix('api/')
                ->group(__DIR__ . '/../routes/api/api.php');
        },
        web: __DIR__ . '/../routes/web.php',
//        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (\Throwable $exception) {
            return (new CustomExceptions)->render($exception);
        });
    })->create();
