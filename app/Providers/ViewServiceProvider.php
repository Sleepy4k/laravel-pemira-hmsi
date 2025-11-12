<?php

namespace App\Providers;

use App\View\Composers\SettingComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (app()->runningInConsole()) {
            return;
        }

        View::composer([
            'components.layout.landing',
            'components.layout.error',
        ], SettingComposer::class);
    }
}
