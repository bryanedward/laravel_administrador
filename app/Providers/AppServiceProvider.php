<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositorios\InterfaceClass;
use App\Repositorios\CacheDecorador;
use App\Repositorios\MensajeRepositorios;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Asignar inrface a la clase cacheDecorador para utilizar en diferentes controladores
        app()->bind(InterfaceClass::class, CacheDecorador::class);
    }
}
