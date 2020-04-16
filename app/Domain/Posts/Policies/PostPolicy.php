<?php


namespace App\Domain\Posts\Policies;

use App\Domain\Support\BasePolicy;
use App\Domain\Support\Interfaces\AuthInterface;
use App\Domain\Posts\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $user){
        $permission = 'view-post';
        return $this->author($user, $permission);
    }

    public function view(AuthInterface $user, Post $post){
       $permission = 'view-post';
       return $this->author($user, $permission);
    }

    public function create(AuthInterface $user){
        $permission = 'create-post';
        return $this->author($user, $permission);
    }

    public function update(AuthInterface $user, Post $post){
        $permission = 'update-post';
        return $this->author($user, $permission);
    }

    public function delete(AuthInterface $user, Post $post){
        $permission = 'delete-post';
        return $this->author($user, $permission);
    }
}
