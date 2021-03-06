<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::find(1);
        $profile = new Profile();
        $profile->user_id = $user1->id;
        $profile->last_name = 'Łódź';
        $profile->street = 'Zgierska 12/22';
        $profile->post_code = '90-500';
        $profile->city = 'Łódź';
        $profile->company_name = 'Łódź';
        $profile->company_street = 'Łódź';
        $profile->company_post_code = '90-555';
        $profile->company_city = 'Łódź';
        $profile->company_nip = '955555454';
        $profile->company_phone1 = '608325632';
        $profile->company_phone2 = '608325632';
        $profile->save();

        $user2 = User::find(2);
        $profile = new Profile();
        $profile->user_id = $user2->id;
        $profile->last_name = 'Łódź';
        $profile->street = 'Łódź 12/22';
        $profile->post_code = '90-500';
        $profile->city = 'Łódź';
        $profile->company_name = 'Łódź';
        $profile->company_street = 'Łódź';
        $profile->company_post_code = '90-555';
        $profile->company_city = 'Łódź';
        $profile->company_nip = '955555454';
        $profile->company_phone1 = '608325632';
        $profile->company_phone2 = '608325632';
        $profile->save();

        $user3 = User::find(3);
        $profile = new Profile();
        $profile->user_id = $user3->id;
        $profile->last_name = 'Łódź';
        $profile->street = 'Łódź 12/22';
        $profile->post_code = '90-500';
        $profile->city = 'Łódź';
        $profile->company_name = 'Łódź';
        $profile->company_street = 'Łódź';
        $profile->company_post_code = '90-555';
        $profile->company_city = 'Łódź';
        $profile->company_nip = '955555454';
        $profile->company_phone1 = '608325632';
        $profile->company_phone2 = '608325632';
        $profile->save();
    }
}
