<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////////////////////////////////////////////Lista de permisos///////////////////////////////////
        //  permisos user
        Permission::create(['name' => 'users_index']);
        Permission::create(['name' => 'users_create']);
        Permission::create(['name' => 'users_edit']);
        Permission::create(['name' => 'users_destroy']);

        //  permisos suppliers
        Permission::create(['name' => 'suppliers_index']);
        Permission::create(['name' => 'suppliers_create']);
        Permission::create(['name' => 'suppliers_edit']);
        Permission::create(['name' => 'suppliers_destroy']);

        //  permisos products
        Permission::create(['name' => 'products_index']);
        Permission::create(['name' => 'products_create']);
        Permission::create(['name' => 'products_edit']);
        Permission::create(['name' => 'products_destroy']);

        //  permisos categories
        Permission::create(['name' => 'categories_index']);
        Permission::create(['name' => 'categories_create']);
        Permission::create(['name' => 'categories_edit']);
        Permission::create(['name' => 'categories_destroy']);

        //  permisos clicks
        Permission::create(['name' => 'clicks_index']);

         //  permisos dashboard
        Permission::create(['name' => 'dashboard_index']);


        /////////////////////////////////////////////////Lista de roles////////////////////////////////
        $admin = Role::create(['name' => 'Admin']);
        $supplier = Role::create(['name' => 'Supplier']);

        ////Asignar permisos a roles

        $admin->givePermissionTo([

            'dashboard_index',

            'users_index',
            'users_create',
            'users_edit',
            'users_destroy',

            'suppliers_index',
            'suppliers_create',
            'suppliers_edit',
            'suppliers_destroy',

            'categories_index',
            'categories_create',
            'categories_edit',
            'categories_destroy'

        ]);

        $supplier->givePermissionTo([

            'dashboard_index',
            'products_index',
            'products_create',
            'products_edit',
            'products_destroy',
            'clicks_index'

        ]);

        $user = User::find('1');
        $user->assignRole('Admin');

        $user = User::find('2');
        $user->assignRole('Supplier');



    }
}
