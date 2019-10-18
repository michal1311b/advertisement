<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Advertisement;
use App\Location;
use App\State;
use App\Work;
use App\Gallery;
use App\Tag;
use Carbon\Carbon;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<5; $i++) {
            $faker = Faker\Factory::create();

            $user1 = User::find(rand(1,2));
            $location = Location::find(rand(1,10));
            $state = State::find(rand(1,10));
            $work = Work::find(rand(1,10));

            $title = $faker->name;
            $advertisement = new Advertisement();
            $advertisement->user_id = $user1->id;
            $advertisement->location_id = $location->id;
            $advertisement->state_id = $state->id;
            $advertisement->work_id = $work->id;
            $advertisement->title = $title;
            $advertisement->description = $faker->name;
            $advertisement->postCode = $faker->postcode;
            $advertisement->street = $faker->streetAddress;
            $advertisement->email = $faker->email;
            $advertisement->phone = $faker->phoneNumber;
            $advertisement->term1 = 1;
            $advertisement->term2 = 1;
            $advertisement->term3 = 1;
            $advertisement->slug = str_slug($title, '-');

            $advertisement->save();

            for($i=1; $i<5; $i++) {
                $now = Carbon::now();
                $path = $faker->image('public/uploads', 640, 480, null);

                $fileData = new Gallery();
                $fileData->oldName = $faker->name;
                $fileData->newName = $now->getTimestamp() . $this->generateRandomString();
                $fileData->size = rand(1000, 100000);
                $fileData->mimeType = 'jpg';
                $fileData->path = str_replace("public/", "", env('APP_URL') . '/' . $path);
                
                $fileData->advertisement_id = $advertisement->id;
                $advertisement->galleries()->save($fileData);

                $tag = new Tag();
                $name = $faker->name; 
                $tag->advertisement_id = $advertisement->id;
                $tag->name = $name;
                $tag->slug = str_slug($name, '-');
                $tag->save();
            }
        }
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
