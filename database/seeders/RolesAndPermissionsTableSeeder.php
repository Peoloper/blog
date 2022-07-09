<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'pisanie postów']);
        Permission::create(['name' => 'edycja własnych postów']);
        Permission::create(['name' => 'edycja wszystkich postów']);
        Permission::create(['name' => 'usuwanie postów']);
        Permission::create(['name' => 'publikacja postów']);

        $role1 = Role::create(['name' => 'Pisarz']);
        $role1->givePermissionTo('pisanie postów');
        $role1->givePermissionTo('edycja własnych postów');

        $role2 = Role::create(['name' => 'Edytor']);
        $role2->givePermissionTo('pisanie postów');
        $role2->givePermissionTo('edycja wszystkich postów');
        $role2->givePermissionTo('publikacja postów');

        $role3 = Role::create(['name' => 'Admin']);
        $role3->givePermissionTo('pisanie postów');
        $role3->givePermissionTo('edycja wszystkich postów');
        $role3->givePermissionTo('publikacja postów');
        $role3->givePermissionTo('usuwanie postów');

    }
}
