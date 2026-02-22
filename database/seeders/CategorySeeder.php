<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Ramsey\Uuid\Uuid;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Manufacturing Products',
                'slug' => 'manufacturing-products',
                'description' => 'Products for manufacturing companies',
            ],
            [
                'name' => 'Travel Packages',
                'slug' => 'travel-packages',
                'description' => 'Travel packages for agencies',
            ],
            [
                'name' => 'Hajj & Umrah',
                'slug' => 'hajj-umrah',
                'description' => 'Hajj and Umrah packages',
            ],
            [
                'name' => 'Domestic Tours',
                'slug' => 'domestic-tours',
                'description' => 'Domestic tour packages',
            ],
            [
                'name' => 'International Tours',
                'slug' => 'international-tours',
                'description' => 'International tour packages',
            ],
        ];

        foreach ($categories as $category) {
            $category['id'] = (string) Uuid::uuid4();
            Category::create($category);
        }
    }
}
