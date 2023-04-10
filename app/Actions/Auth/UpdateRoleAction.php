<?php


namespace App\Actions\Auth;


use App\Models\Role;
use Illuminate\Support\Arr;

class UpdateRoleAction
{
    /**
     * @param  Role  $role
     * @param  array  $data
     * @return Role|bool|\Illuminate\Database\Eloquent\Model
     */
    public function execute(Role $role, array $data)
    {
        $role->fill(Arr::except($data, 'permissions'));
        $role->save();

        if ($permissionData = Arr::get($data, 'permissions')) {
            $role->permissions()->sync(Arr::get($data, 'permissions'));
        }

        return $role;
    }
}
