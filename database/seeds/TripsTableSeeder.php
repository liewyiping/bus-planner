<?php

use Illuminate\Database\Seeder;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $faker = Faker::create();
        $route_ids = DB::table('routes')->pluck('route_id');
        $bus_ids= DB::table('buses')->pluck('bus_id');
       
DB::table('trips')->insert([
            'trip_id' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        foreach (range(1,10) as $index) {
            DB::table('trips')->insert([

            'trip_id' => str_random(10),
            'route_id' => $faker->randomElement($route_ids),
            'bus_id' => $faker->randomElement($route_ids),

            ]);

    }
}
}
