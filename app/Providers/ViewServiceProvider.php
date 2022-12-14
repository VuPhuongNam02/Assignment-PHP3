<?php

namespace App\Providers;

use App\Http\Controllers\CartController;
use App\Http\View\Composers\CartComposer;
use App\Http\View\Composers\MenuComposer;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(['include.nav', 'product.list', 'livewire.product'], MenuComposer::class);
        View::composer(['cart', 'include.nav'], CartComposer::class);
    }
}
