<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrfToken extends Middleware
{
    /**
     * Rotas excluídas da verificação CSRF.
     *
     * @var array<int, string>
     */
    // app/Http/Middleware/VerifyCsrfToken.php

protected $except = [
    'api/*', // Exclui todas as rotas da API da verificação CSRF
];

}