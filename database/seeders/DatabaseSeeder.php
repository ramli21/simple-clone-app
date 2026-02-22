<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'id' => (string) Uuid::uuid4(),
            'name' => 'Admin User',
            'email' => 'admin@akhritech.com',
            'password' => bcrypt('5t4r3e2w!Q'),
            'email_verified_at' => now(),
        ]);

        $this->call([CompanyProfileSeeder::class, CategorySeeder::class, BlogSeeder::class]);
    }
}

