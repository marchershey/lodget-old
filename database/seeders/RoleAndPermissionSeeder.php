<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
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



        /**
         * Pages
         */

        // Admin Dashboard
        Permission::create(['name' => 'view-admin-dashboard']);

        // Host Dashboard
        Permission::create(['name' => 'view-host-dashboard']);

        // Guest Dashboard
        Permission::create(['name' => 'view-guest-dashboard']);

        /**
         * Users
         */

        // Admin users
        Permission::create(['name' => 'create-admin-users']);
        Permission::create(['name' => 'edit-admin-users']);
        Permission::create(['name' => 'delete-admin-users']);

        // Host users
        Permission::create(['name' => 'create-host-users']);
        Permission::create(['name' => 'edit-host-users']);
        Permission::create(['name' => 'delete-host-users']);

        // Guest users
        Permission::create(['name' => 'create-guest-users']);
        Permission::create(['name' => 'edit-guest-users']);
        Permission::create(['name' => 'delete-guest-users']);

        /**
         * Actions
         */

        // Properties
        Permission::create(['name' => 'create-properties']);
        Permission::create(['name' => 'edit-properties']);
        Permission::create(['name' => 'delete-properties']);

        // Reservations
        Permission::create(['name' => 'create-reservations']);
        Permission::create(['name' => 'edit-reservations']);
        Permission::create(['name' => 'delete-reservations']);

        /*******************************************************/

        $adminRole = Role::create(['name' => 'admin']);
        $hostRole = Role::create(['name' => 'host']);
        $guestRole = Role::create(['name' => 'guest']);

        /**
         * Admin Role Permissions
         */
        $adminRole->givePermissionTo([
            /**
             * Pages
             */
            'view-admin-dashboard',

            /**
             * Users
             */
            // Admin Users
            'create-admin-users',
            'edit-admin-users',
            'delete-admin-users',

            // Host Users
            'create-host-users',
            'edit-host-users',
            'delete-host-users',

            // Guest Users
            'create-guest-users',
            'edit-guest-users',
            'delete-guest-users',

            /**
             * Actions
             */
            // Properties
            'create-properties',
            'edit-properties',
            'delete-properties',

            // Reservations
            'create-reservations',
            'edit-reservations',
            'delete-reservations',
        ]);

        /**
         * Host Role Permissions
         */
        $hostRole->givePermissionTo([
            // Pages
            'view-host-dashboard',

            // Properties
            'create-properties',
            'edit-properties',
            'delete-properties',

            // Reservations
            'create-reservations',
            'edit-reservations',
            'delete-reservations',
        ]);

        /**
         * Guest Role Permissions
         */
        $guestRole->givePermissionTo([
            // Pages
            'view-guest-dashboard',

            // Properties
            'create-properties',
            'edit-properties',
            'delete-properties',

            // Reservations
            'create-reservations',
            'edit-reservations',
            'delete-reservations',
        ]);
    }
}
