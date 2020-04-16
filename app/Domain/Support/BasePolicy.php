<?php


namespace App\Domain\Support;


use App\Domain\Posts\Models\Post;
use App\Domain\Support\Interfaces\AuthInterface;

class BasePolicy
{
    public function before() {

    }

    public function author(AuthInterface $user, String $permission){
        return $user->roles->first()->hasPermissionTo($permission);
    }
}
