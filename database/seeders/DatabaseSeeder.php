<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        $faker = Faker::create();
		$faker = Faker::create('bg_BG');

        foreach (range(1,100) as $index) {

            \DB::table('students')->insert([

                'fn' => rand(100000, 900000),

                'name' => $faker->name,

                'score' => rand(0, 100),
				'file_name' => null,
                'user_id' => rand(1, 5),
            ]);

        }		
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
