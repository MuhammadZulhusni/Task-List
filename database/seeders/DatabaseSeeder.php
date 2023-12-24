<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// The DatabaseSeeder class is responsible for seeding the application's database with sample data.
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Use the User factory to create 10 users with default attributes
        \App\Models\User::factory(10)->create();
        
        // Use the User factory to create 2 unverified users with custom attributes
        \App\Models\User::factory(2)->unverified()->create();
        
        // Use the Task factory to create 20 tasks with default attributes
        \App\Models\Task::factory(20)->create();

        // Uncomment the following lines if you want to create a specific user manually
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
