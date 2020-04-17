<?php


namespace App\Domain\Shared\Policies;


use App\Domain\Shared\Models\Category;
use App\Domain\Support\BasePolicy;
use App\Domain\Support\Interfaces\AuthInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $user){
        $permission = 'view-category';
        return $this->author($user, $permission);
    }

    public function view(AuthInterface $user, Category $category){
        $permission = 'view-category';
        return $this->author($user, $permission);
    }

    public function create(AuthInterface $user){
        $permission = 'create-category';
        return $this->author($user, $permission);
    }

    public function update(AuthInterface $user, Category $category){
        $permission = 'update-category';
        return $this->author($user, $permission);
    }

    public function delete(AuthInterface $user, Category $category){
        $permission = 'delete-category';
        return $this->author($user, $permission);
    }
}
