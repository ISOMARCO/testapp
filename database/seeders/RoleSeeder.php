<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'Super_Admin']);
        $customer = Role::create(['name' => 'Customer']);
        $department = Role::create(['name' => 'Department']);

        $superAdmin->givePermissionTo('read_customers');
        $superAdmin->givePermissionTo('create_customer');
        $superAdmin->givePermissionTo('update_customer');
        $superAdmin->givePermissionTo('delete_customer');

        $superAdmin->givePermissionTo('read_departments');
        $superAdmin->givePermissionTo('create_department');
        $superAdmin->givePermissionTo('update_department');
        $superAdmin->givePermissionTo('delete_department');

        $superAdmin->givePermissionTo('read_categories');
        $superAdmin->givePermissionTo('create_category');
        $superAdmin->givePermissionTo('update_category');
        $superAdmin->givePermissionTo('delete_category');

        $customer->givePermissionTo('read_departments');
        $customer->givePermissionTo('create_department');
        $customer->givePermissionTo('update_department');
        $customer->givePermissionTo('delete_department');

    }
}
