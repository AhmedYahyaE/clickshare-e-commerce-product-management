<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Edited to create a specific user (Ahmed Yahya)
        User::factory()->create([
            'name' => 'Ahmed Yahya',
            'email' => 'ahmed.yahya@example-email.com',
        ]);

        User::factory()->count(90)->create(); // Create 90 random users



        $this->call([
            ProductSeeder::class
        ]);

    }
}
