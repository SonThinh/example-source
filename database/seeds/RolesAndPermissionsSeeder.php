<?php

use App\Domain\Auth\Enums\PermissionType;
use App\Domain\Auth\Enums\UserType;
use App\Domain\Auth\Models\Permission;
use App\Domain\Auth\Models\Role;
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
            Permission::create(['name' => $name, 'display_name' => Str::singular($display_name)]);
        }

        // Create roles
        foreach (UserType::toArray() as $display_name => $name) {
            Role::create(['name' => $name, 'display_name' => Str::singular($display_name)]);
        }

        // Give all permission to role super admin
        $role = Role::findByName(UserType::SUPER_ADMIN);
        $role->givePermissionTo(Permission::all());
    }
}
