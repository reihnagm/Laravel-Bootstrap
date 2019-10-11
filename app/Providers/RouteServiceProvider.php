<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        // DEFAULT
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        // ADMINISTRATIVE
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Administrative/administrative.php'));

        // USER
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/User/user.php'));

        // ADMIN
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Admin/admin.php'));

        // DATATABLES
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/datatables.php'));

        // TEST
        Route::middleware('guest')
            ->namespace($this->namespace)
            ->group(base_path('routes/test.php'));
    }


    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/Api/api.php'));
    }
}
