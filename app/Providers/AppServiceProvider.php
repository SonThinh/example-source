<?php

namespace App\Providers;

use App\Domain\Auth\Models\User;
use App\Domain\Companies\Models\Company;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::morphMap([
            'user' => User::class,
            'company' => Company::class
        ]);
    }
}
