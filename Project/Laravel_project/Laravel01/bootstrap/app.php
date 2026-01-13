<?php

use App\Http\Middleware\Afterlogin_u;
use App\Http\Middleware\Afterlogin_a;
use App\Http\Middleware\Beforelogin_a;
use App\Http\Middleware\Beforelogin_u;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'afterlogin_u'  => Afterlogin_u::class,
            'afterlogin_a'  => Afterlogin_a::class,
            'beforelogin_u' => Beforelogin_u::class,
            'beforelogin_a' => Beforelogin_a::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
