<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = Role::where('name', 'doctor')->first();
        $role_manager  = Role::where('name', 'company')->first();
        $employee = new User();
        $employee->name = 'Employee Name';
        $employee->email = 'employee@example.com';
        $employee->password = bcrypt('secret');
        $employee->email_verified_at = '2019-08-05 23:00:00';
        $employee->save();
        $employee->roles()->attach($role_employee);
        $manager = new User();
        $manager->name = 'Manager Name';
        $manager->email = 'manager@example.com';
        $manager->password = bcrypt('secret');
        $manager->email_verified_at = '2019-08-05 23:00:00';
        $manager->save();
        $manager->roles()->attach($role_manager);
    }
}
