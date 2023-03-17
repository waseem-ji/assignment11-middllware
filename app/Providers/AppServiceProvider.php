<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrapFive();
    
        Gate::define('admin',function(User $user){
            return $user->email === 'waseemji4217@gmail.com';
         });

        // Blade::if('admin' , function() {
        //     return request()->user()?->can('admin');
        //     // now in blade we can use @admin instead of @can('admin')
        // });
    }
}
