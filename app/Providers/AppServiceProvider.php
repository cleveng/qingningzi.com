<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Vite;
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
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        Carbon::setLocale('zh');

        Vite::macro('image', fn (string $asset) => $this->asset("resources/images/{$asset}"));

        // FIXME: the page flash hide???
        view()->share('hideSidebar', Arr::has(request()->cookie(), 'hideSidebar'));
    }
}
