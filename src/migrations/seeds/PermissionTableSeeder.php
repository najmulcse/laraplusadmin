<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 4/1/2019
 * Time: 9:10 PM
 */

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev_role = Role::where('name','Merchant')->first();
        $manager_role = Role::where('name', 'Employee')->first();

        $createMerchant = new Permission();
        $createMerchant->name = '#';
        $createMerchant->guard_name = 'User role management';
        $createMerchant->save();
        $createMerchant->roles()->attach($dev_role);

        $createMerchant = new Permission();
        $createMerchant->name = 'create-merchant';
        $createMerchant->guard_name = 'Create Merchant';
        $createMerchant->save();
        $createMerchant->roles()->attach($dev_role);

        $createEmployee = new Permission();
        $createEmployee->name = 'create-employee';
        $createEmployee->guard_name = 'Create Employee';
        $createEmployee->save();
        $createEmployee->roles()->attach($manager_role);

        $editEmployee = new Permission();
        $editEmployee->name = 'edit-Employee';
        $editEmployee->guard_name = 'Edit Employee';
        $editEmployee->save();
        $editEmployee->roles()->attach($manager_role);

        $editEmployee = new Permission();
        $editEmployee->name = 'edit-Employee';
        $editEmployee->guard_name = 'Edit Employee';
        $editEmployee->save();
        $editEmployee->roles()->attach($manager_role);

    }
}
