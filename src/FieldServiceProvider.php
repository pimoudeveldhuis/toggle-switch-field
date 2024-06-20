<?php

namespace PimOudeVeldhuis\ToggleSwitchField;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Http\Middleware\Authenticate;
use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Route;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Nova::serving(function (ServingNova $event) {
            Nova::script('toggle-switch-field', __DIR__.'/../dist/js/field.js');
            Nova::style('toggle-switch-field', __DIR__.'/../dist/css/field.css');
        });

        $this->routes();

    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova'])
            ->namespace('PimOudeVeldhuis\toggle-switch-field\Http\Controllers')
            ->prefix('pimoudeveldhuis/toggle-switch-field')
            ->group(__DIR__.'/../routes/api.php');
    }
}
