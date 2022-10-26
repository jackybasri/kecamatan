<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
        Paginator::useBootstrap();

        // HAK AKSES SUPER ADMIN DAN ADMIN
        Gate::define('admin', function(User $user){
            return $user->user_role_id == '1' || $user->user_role_id =='3' ;
        });

        // HAK AKSES SUPER ADMIN DAN REPORTER
        Gate::define('reporter', function(User $user){
            return $user->user_role_id == '1' ||$user->user_role_id == '4' ;
        });

        // HAK AKSES SUPER ADMIN DAN VERIFIKATOR
        Gate::define('verifikator', function(User $user){
            return $user->user_role_id == '1' || $user->user_role_id =='2';
        });
    }
}
