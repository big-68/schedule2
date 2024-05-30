<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\CallingScheduleSeeder;
use Database\Seeders\ItemSeeder;
use Database\Seeders\UserGroupSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserGroupSeeder::class,
            UserSeeder::class,
            CallingScheduleSeeder::class,
            ItemSeeder::class
            // ClassroomSeeder::class,
            // SchoolClassSeeder::class
        ]);
    }
}
