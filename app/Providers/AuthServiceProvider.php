<?php

namespace App\Providers;

use App\Domain\Auth\Models\Admin;
use App\Domain\Auth\Models\Role;
use App\Domain\Auth\Models\User;
use App\Policies\Auth\AdminPolicy;
use App\Policies\Auth\RolePolicy;
use App\Policies\Auth\UserPolicy;
use App\Domain\Companies\Models\Company;
use App\Policies\Companies\CompanyPolicy;
use App\Domain\Posts\Models\Post;
use App\Policies\Posts\PostPolicy;
use App\Domain\Shared\Models\Category;
use App\Policies\Shared\CategoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model'  => 'App\Policies\ModelPolicy',
        Post::class     => PostPolicy::class,
        Category::class => CategoryPolicy::class,
        Company::class  => CompanyPolicy::class,
        User::class     => UserPolicy::class,
        Role::class     => RolePolicy::class,
        Admin::class    => AdminPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
