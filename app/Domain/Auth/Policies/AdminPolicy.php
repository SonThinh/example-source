<?php


namespace App\Domain\Auth\Policies;


use App\Domain\Auth\Models\Admin;
use App\Domain\Support\BasePolicy;
use App\Domain\Support\Interfaces\AuthInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $user){
        $permission = 'view-admin';
        return $this->author($user, $permission);
    }

    public function view(AuthInterface $user, Admin $admin){
        $permission = 'view-admin';
        return $this->author($user, $permission);
    }

    public function create(AuthInterface $user){
        $permission = 'create-admin';
        return $this->author($user, $permission);
    }

    public function update(AuthInterface $user, Admin $admin){
        $permission = 'update-admin';
        return $this->author($user, $permission);
    }

    public function delete(AuthInterface $user, Admin $admin){
        $permission = 'delete-admin';
        return $this->author($user, $permission);
    }
}
