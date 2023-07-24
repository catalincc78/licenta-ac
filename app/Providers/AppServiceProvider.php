<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Player;
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
        view()->composer(['dashboard.user.home', 'dashboard.admin.home','dashboard.admin.dashboard'], function ($view) {

            $players = Player::all();

            $view->with('players', $players);
        });
    }
}