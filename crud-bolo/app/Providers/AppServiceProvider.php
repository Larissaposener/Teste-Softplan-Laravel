<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * O caminho para a definição das rotas.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Defina as rotas para a aplicação.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();  
        $this->mapWebRoutes();
    }

    /**
     * Defina as rotas da API para a aplicação.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api') // Todas as rotas da API começam com "api"
             ->middleware('api') // Middleware para a API
             ->namespace($this->namespace) // Namespace para o controlador
             ->group(base_path('routes/api.php')); // Arquivo de rotas da API
    }

    /**
     * Defina as rotas web para a aplicação.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
}
