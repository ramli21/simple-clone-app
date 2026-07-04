<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Ramsey\Uuid\Uuid;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = [
            [
                'name' => 'Branding',
                'slug' => 'branding',
                'description' => 'Brand identity and marketing solutions',
            ],
            [
                'name' => 'Ramadhan',
                'slug' => 'ramadhan',
                'description' => 'Ramadan campaigns and special events',
            ],
            [
                'name' => 'Product',
                'slug' => 'product',
                'description' => 'Product development and launches',
            ],
            [
                'name' => 'Tips',
                'slug' => 'tips',
                'description' => 'Practical tips, guides and best practices',
            ],
            [
                'name' => 'Showcase',
                'slug' => 'showcase',
                'description' => 'Project portfolio and case studies',
            ],
            [
                'name' => 'Edukasi',
                'slug' => 'edukasi',
                'description' => 'Educational content and training materials',
            ],
            [
                'name' => 'Teknologi',
                'slug' => 'teknologi',
                'description' => 'Technology insights and innovations',
            ],
        ];

        foreach ($categories as $category) {
            $category['id'] = (string) Uuid::uuid4();
            Category::create($category);
        }
    }
}
