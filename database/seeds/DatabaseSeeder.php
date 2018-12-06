<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create();

        $limit = 20;

        for ($i=0; $i<$limit; $i++ ){
            DB::table('kontak')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'no' => $faker->phoneNumber,
                'address'=> $faker->address,
            ]);
            
        }
    }
}
