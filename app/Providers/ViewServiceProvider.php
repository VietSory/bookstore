<?php
 
namespace App\Providers;

use App\Http\View\Composers\ProductComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\CategoryComposer;
use App\Http\View\Composers\CartComposer;
// use Illuminate\View\View;
 
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // ...
    }
 
    public function boot()
    {
        View::composer('user.sidebar', CategoryComposer::class);
    }
}