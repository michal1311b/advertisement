<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Doctor;
use App\Preference;

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
        $role_admin  = Role::where('name', 'admin')->first();

        $employee = new User();
        $employee->name = 'Employee Name';
        $employee->email = 'employee@example.com';
        $employee->password = bcrypt('secret');
        $employee->email_verified_at = '2019-08-05 23:00:00';
        $employee->term1 = 1;
        $employee->term2 = 1;
        $employee->term3 = 1;
        $employee->save();
        $employee->roles()->attach($role_employee);

        $doctor = new Doctor();
        $doctor->pwz = 6555555;
        $doctor->birthday = '1965-05-18';
        $doctor->user_id = $employee->id;
        $doctor->save();

        $preference = new Preference();
        $preference->user_id = $employee->id;
        $preference->save();

        $manager = new User();
        $manager->name = 'Manager Name';
        $manager->email = 'manager@example.com';
        $manager->password = bcrypt('secret');
        $manager->email_verified_at = '2019-08-05 23:00:00';
        $manager->term1 = 1;
        $manager->term2 = 1;
        $manager->term3 = 1;
        $manager->save();
        $manager->roles()->attach($role_manager);

        $admin = new User();
        $admin->name = 'Admin Name';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->email_verified_at = '2019-08-05 23:00:00';
        $admin->term1 = 1;
        $admin->term2 = 1;
        $admin->term3 = 1;
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
