<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartComposerServiceProvider extends ServiceProvider
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
        view()->composer('*', function ($view) {
            if(Auth::user()){

                $view->with('cartNumber', Cart::where('username',Auth::user()->id)->count());
            }
            else {
                $view->with('cartNumber', Cart::where('username',0)->count());
            }
        });
    }
}
