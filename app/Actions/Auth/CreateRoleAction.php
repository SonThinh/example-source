<?php


namespace App\Actions\Auth;


use App\Domain\Auth\Models\Role;
use Illuminate\Support\Arr;

class CreateRoleAction
{
    /**
     * @param array $data
     * @return Role|\Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function execute(array $data)
    {
        $role = new Role();
        $role->fill(Arr::except($data, 'permissions'));
        $role->save();

        if ($permissionData = Arr::get($data, 'permissions')) {
            $role->permissions()->attach(Arr::get($data, 'permissions'));
        }

        return $role;
    }
}
