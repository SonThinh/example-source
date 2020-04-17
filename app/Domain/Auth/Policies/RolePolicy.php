<?php


namespace App\Domain\Auth\Policies;


use App\Domain\Auth\Models\Role;
use App\Domain\Support\BasePolicy;
use App\Domain\Support\Interfaces\AuthInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $user){
        $permission = 'view-role';
        return $this->author($user, $permission);
    }

    public function view(AuthInterface $user, Role $role){
        $permission = 'view-role';
        return $this->author($user, $permission);
    }

    public function create(AuthInterface $user){
        $permission = 'create-role';
        return $this->author($user, $permission);
    }

    public function update(AuthInterface $user, Role $role){
        $permission = 'update-role';
        return $this->author($user, $permission);
    }

    public function delete(AuthInterface $user, Role $role){
        $permission = 'delete-role';
        return $this->author($user, $permission);
    }
}
