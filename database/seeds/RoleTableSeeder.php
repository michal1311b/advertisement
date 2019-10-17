<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'doctor';
        $role_employee->description = 'A Doctor User';
        $role_employee->save();
        $role_manager = new Role();
        $role_manager->name = 'company';
        $role_manager->description = 'A company User';
        $role_manager->save();
        $role_manager = new Role();
        $role_manager->name = 'admin';
        $role_manager->description = 'A admin User';
        $role_manager->save();
    }
}
