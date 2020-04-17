<?php


namespace App\Domain\Auth\Policies;


use App\Domain\Auth\Models\User;
use App\Domain\Support\BasePolicy;
use App\Domain\Support\Interfaces\AuthInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $auth){
        $permission = 'view-user';
        return $this->author($auth, $permission);
    }

    public function view(AuthInterface $auth, User $user){
        $permission = 'view-user';
        return $this->author($auth, $permission);
    }

    public function create(AuthInterface $auth){
        $permission = 'create-user';
        return $this->author($auth, $permission);
    }

    public function update(AuthInterface $auth, User $user){
        $permission = 'update-user';
        return $this->author($auth, $permission);
    }

    public function delete(AuthInterface $auth, User $user){
        $permission = 'delete-user';
        return $this->author($auth, $permission);
    }
}
