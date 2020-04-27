<?php


namespace App\Domain\Support;


use App\Enums\Auth\UserType;
use App\Domain\Support\Interfaces\AuthInterface;

class BasePolicy
{
    public function before(AuthInterface $user)
    {
        return $user->hasRole(UserType::SUPER_ADMIN);
    }

    public function author(AuthInterface $user, string $permission)
    {
        return $user->hasPermissionTo($permission);
    }
}
