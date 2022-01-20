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

        Permission::create(['name' => 'write post']);
        Permission::create(['name' => 'edit own posts']);
        Permission::create(['name' => 'edit all posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);

        $role1 = Role::create(['name' => 'Writer']);
        $role1->givePermissionTo('write post');
        $role1->givePermissionTo('edit own posts');

        $role2 = Role::create(['name' => 'Editor']);
        $role2->givePermissionTo('write post');
        $role2->givePermissionTo('edit all posts');
        $role2->givePermissionTo('publish posts');

        $role3 = Role::create(['name' => 'Admin']);
        $role3->givePermissionTo('write post');
        $role3->givePermissionTo('edit all posts');
        $role3->givePermissionTo('publish posts');
        $role3->givePermissionTo('delete posts');
    }
}
