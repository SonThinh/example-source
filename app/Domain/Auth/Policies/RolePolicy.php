<?php


namespace App\Domain\Auth\Policies;


use App\Enums\Auth\PermissionType;
use App\Models\Role;
use App\Domain\Support\BasePolicy;
use App\Domain\Support\Interfaces\AuthInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $user){
        return $this->author($user, PermissionType::VIEW_ROLE);
    }

    public function view(AuthInterface $user, Role $role){
        return $this->author($user, PermissionType::VIEW_ROLE);
    }

    public function create(AuthInterface $user){
        return $this->author($user, PermissionType::CREATE_ROLE);
    }

    public function update(AuthInterface $user, Role $role){
        return $this->author($user, PermissionType::UPDATE_ROLE);
    }

    public function delete(AuthInterface $user, Role $role){
        return $this->author($user, PermissionType::DELETE_ROLE);
    }
}
