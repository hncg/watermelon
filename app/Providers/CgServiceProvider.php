<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class CgServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Http\Controllers';

    public function boot(Router $router)
    {
        parent::boot($router);
        $router->bind('user_id', 'App\models\Test');
    }

    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}