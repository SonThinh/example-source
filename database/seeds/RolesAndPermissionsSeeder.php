<?php

use App\Enums\Auth\PermissionType;
use App\Enums\Auth\UserType;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        foreach (PermissionType::toArray() as $display_name => $name) {
            Permission::updateOrCreate(['name' => $name, 'display_name' => Str::singular($display_name)]);
        }

        // Create roles
        foreach (UserType::toArray() as $display_name => $name) {
            Role::updateOrCreate(['name' => $name, 'display_name' => Str::singular($display_name)]);
        }

        // Give all permission to role super admin
        $role = Role::findByName(UserType::SUPER_ADMIN);
        $role->givePermissionTo(Permission::all());

        // Created super admin
        $superadmin = factory(Admin::class)->create(['username' => 'superadmin']);
        $superadmin->assignRole($role);
    }
}
