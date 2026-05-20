<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyProfile;
use Ramsey\Uuid\Uuid;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyProfile::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Akhritech',
            'category' => 'tech',
            'about_us' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'vision_mission' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'address' => 'Kab. Bandung Barat, Jawa Barat, Indonesia',
            'phone' => '6285117279821',
            'email' => 'hello@akhritech.com',
            'social_media' => [
                'instagram' => 'https://instagram.com/akhritech',
            ],
            'logo' => 'images/logo-side-white.png',
        ]);
    }
}

