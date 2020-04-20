<?php


namespace App\Domain\Support;


use App\Domain\Posts\Models\Post;
use App\Domain\Support\Interfaces\AuthInterface;

class BasePolicy
{
    public function before(AuthInterface $user) {
        return $user->hasRole('super-admin');
    }

    public function author(AuthInterface $user, String $permission){
        return $user->roles->first()->hasPermissionTo($permission);
    }
}
