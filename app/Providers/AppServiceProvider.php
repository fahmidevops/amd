<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //ini tambahan, dapat dari stackoverflow https://stackoverflow.com/questions/42244541/laravel-migration-error-syntax-error-or-access-violation-1071-specified-key-wa


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
        Schema::defaultStringLength(191);

        Paginator::useBootstrap(); // default paginator menggunakan Tailwind, utk penggunaan bootstrap, menambahkan fungsi ini

        Gate::define('admin', function (User $user) {
            // return $user->username === 'fahmibo';
            return $user->is_admin; // ini bernilai true atau bernilai 1 di databasenya. 
        });
    }
}
