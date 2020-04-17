<?php


namespace App\Domain\Companies\Policies;


use App\Domain\Companies\Models\Company;
use App\Domain\Support\BasePolicy;
use App\Domain\Support\Interfaces\AuthInterface;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthInterface $user){
        $permission = 'view-company';
        return $this->author($user, $permission);
    }

    public function view(AuthInterface $user, Company $company){
        $permission = 'view-company';
        return $this->author($user, $permission);
    }

    public function create(AuthInterface $user){
        $permission = 'create-company';
        return $this->author($user, $permission);
    }

    public function update(AuthInterface $user, Company $company){
        $permission = 'update-company';
        return $this->author($user, $permission);
    }

    public function delete(AuthInterface $user, Company $company){
        $permission = 'delete-company';
        return $this->author($user, $permission);
    }

}
