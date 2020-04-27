<?php


namespace App\Domain\Companies\Policies;


use App\Enums\Auth\PermissionType;
use App\Models\Company;
use App\Domain\Support\BasePolicy;
use App\Domain\Support\Interfaces\AuthInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $user){
        return $this->author($user, PermissionType::VIEW_COMPANY);
    }

    public function view(AuthInterface $user, Company $company){
        return $this->author($user, PermissionType::VIEW_COMPANY);
    }

    public function create(AuthInterface $user){
        return $this->author($user, PermissionType::CREATE_COMPANY);
    }

    public function update(AuthInterface $user, Company $company){
        return $this->author($user, PermissionType::UPDATE_COMPANY);
    }

    public function delete(AuthInterface $user, Company $company){
        return $this->author($user, PermissionType::DELETE_COMPANY);
    }

}
