<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\FoodType;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $type = FoodType::all();
        View::share(['type'=>$type]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
