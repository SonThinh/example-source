<?php


namespace App\Domain\Auth\Policies;


use App\Domain\Auth\Enums\PermissionType;
use App\Domain\Auth\Models\Admin;
use App\Domain\Support\BasePolicy;
use App\Domain\Support\Interfaces\AuthInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $user){
        return $this->author($user, PermissionType::VIEW_ADMIN);
    }

    public function view(AuthInterface $user, Admin $admin){
        return $this->author($user, PermissionType::VIEW_ADMIN);
    }

    public function create(AuthInterface $user){
        return $this->author($user, PermissionType::CREATE_ADMIN);
    }

    public function update(AuthInterface $user, Admin $admin){
        return $this->author($user, PermissionType::UPDATE_ADMIN);
    }

    public function delete(AuthInterface $user, Admin $admin){
        return $this->author($user, PermissionType::DELETE_ADMIN);
    }
}
