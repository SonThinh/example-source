<?php


namespace App\Policies\Shared;


use App\Enums\Auth\PermissionType;
use App\Models\Category;
use App\Policies\BasePolicy;
use App\Interfaces\AuthInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $user){
        return $this->author($user, PermissionType::VIEW_CATEGORY);
    }

    public function view(AuthInterface $user, Category $category){
        return $this->author($user, PermissionType::VIEW_CATEGORY);
    }

    public function create(AuthInterface $user){
        return $this->author($user, PermissionType::CREATE_CATEGORY);
    }

    public function update(AuthInterface $user, Category $category){
        return $this->author($user, PermissionType::UPDATE_CATEGORY);
    }

    public function delete(AuthInterface $user, Category $category){
        return $this->author($user, PermissionType::DELETE_CATEGORY);
    }
}
