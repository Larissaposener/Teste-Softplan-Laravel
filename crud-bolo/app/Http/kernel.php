<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            //\App\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
           // \App\Http\Middleware\VerifyCsrfToken::class,
        ],
    ];
}
