<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Exceptions\RoleDoesNotExist;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        static::CreateRole('master');
        static::CreateRole('admin');
        static::CreateRole('user');

        static::CreatePermission('create user');
        static::CreatePermission('read user');
        static::CreatePermission('update user');
        static::CreatePermission('delete user');


        $role = Role::findByName('master');
        $role->givePermissionTo('create user');
        $role->givePermissionTo('read user');
        $role->givePermissionTo('update user');
        $role->givePermissionTo('delete user');

    }

    protected static function CreatePermission(string $name)
    {
        try {
            $permission = Permission::findByName($name);
        } catch (PermissionDoesNotExist $ex) {
            Permission::create(['name' => $name]);
        }
        return;
    }

    protected static function CreateRole(string $name)
    {
        try {
            $role = Role::findByName($name);
        } catch (RoleDoesNotExist $ex) {
            Role::create(['name' => $name]);
        }
        return;
    }
}
