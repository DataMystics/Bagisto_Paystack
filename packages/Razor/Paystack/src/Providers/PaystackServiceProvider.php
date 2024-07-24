<?php

namespace Razor\Paystack\Providers;

use Illuminate\Support\ServiceProvider;

class PaystackServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'paystack');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/paymentmethods.php', 'paymentmethods'
        );
    }

    public function register()
    {
        //
    }
}
