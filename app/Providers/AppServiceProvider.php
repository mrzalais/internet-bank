<?php

namespace App\Providers;

use App\Repositories\CurrenciesRepository;
use App\Repositories\LatvijasBankaRepository;
use Illuminate\Support\ServiceProvider;

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

    public function boot(): void
    {
        $this->app->bind(CurrenciesRepository::class, LatvijasBankaRepository::class);
    }
}
