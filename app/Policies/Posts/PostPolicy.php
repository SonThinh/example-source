<?php


namespace App\Policies\Posts;

use App\Enums\Auth\PermissionType;
use App\Models\Post;
use App\Policies\BasePolicy;
use App\Interfaces\AuthInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $user){
        return $this->author($user, PermissionType::VIEW_POST);
    }

    public function view(AuthInterface $user, Post $post){
       return $this->author($user,PermissionType::VIEW_POST);
    }

    public function create(AuthInterface $user){
        return $this->author($user, PermissionType::CREATE_POST);
    }

    public function update(AuthInterface $user, Post $post){
        return $this->author($user, PermissionType::UPDATE_POST);
    }

    public function delete(AuthInterface $user, Post $post){
        return $this->author($user, PermissionType::DELETE_POST);
    }
}
