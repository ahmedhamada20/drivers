<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Users
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-status',
            'user-wallet',

            // Vehicles
            'Vehicles-list',

            // SpecialCity
            'SpecialCity-list',
            'SpecialCity-create',
            'SpecialCity-edit',
            'SpecialCity-delete',

            // PromoCode
            'PromoCode-list',
            'PromoCode-create',
            'PromoCode-edit',

            // package
            'package-list',
            'package-packageDetails',
            'package-getDrivers',
            'package-assignDriver',

            // Notifications
            'Notifications-list',
            'Notifications-sendToUserApp',

            // Drivers
            'Drivers-list',
            'Drivers-create',
            'Drivers-edit',
            'Drivers-delete',
            'Drivers-statusUpdate',
            'Drivers-upload',

            // Company
            'Company-list',
            'Company-create',
            'Company-statusUpdate',

            // Roles
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            // Reports
            'Drivers-report',
            'Orders-report',

            // Setting Permission
            'Map-driver',
            'Settings',
            'currency',


        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
