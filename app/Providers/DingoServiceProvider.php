<?php

namespace App\Providers;

use App\Serializer\CustomSerializer;
use Illuminate\Support\ServiceProvider;

class DingoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app('Dingo\Api\Transformer\Factory')->setAdapter(function ($app) {
            $fractal = new \League\Fractal\Manager;
            $fractal->setSerializer(new CustomSerializer());
            return new \Dingo\Api\Transformer\Adapter\Fractal($fractal);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
