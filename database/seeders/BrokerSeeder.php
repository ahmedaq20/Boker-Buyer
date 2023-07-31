<?php

namespace Database\Seeders;

use App\Models\broker;
use App\Models\brokerinof;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BrokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create fake brokers
        $numberOfBrokers = 10;
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < $numberOfBrokers; $i++) {
            $broker = broker::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // You can set the default password here
                'phone_number' => $faker->phoneNumber,
            ]);
            $imageUrl = 'storage/images/shlJBlpJnT652YgoluVd2tS3lIJwneNMR4zRfYm8.png';
            // Create fake broker info
            brokerinof::create([
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'bio' => $faker->paragraph,
                'image_url' => $imageUrl, // You can set a default image URL here
                'stars' => $faker->numberBetween(1, 5),
                'country' => $faker->country,
                'city' => $faker->city,
                'birthday' => $faker->date,
                'interests' => $faker->sentence,
                'user_id' => $broker->id,
            ]);

            DB::table('categories')->insert([
                'category' => $faker->jobTitle,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    }

