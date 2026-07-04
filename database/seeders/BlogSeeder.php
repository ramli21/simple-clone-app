<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class BlogSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $author = User::first();

        if (! $author || $categories->isEmpty()) {
            return;
        }

        $blogs = [
            [
                'title' => 'Getting Started with Laravel',
                'content' => 'Laravel is a powerful PHP framework for building web applications. In this post, we\'ll explore the basics of getting started with Laravel and creating your first application.',
                'excerpt' => 'Learn the fundamentals of Laravel framework and how to set up your first project.',
                'is_featured' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Best Practices for API Development',
                'content' => 'Building a robust API requires careful planning and best practices. This article covers REST principles, authentication, rate limiting, and error handling.',
                'excerpt' => 'Master the art of API development with proven best practices and design patterns.',
                'is_featured' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Database Optimization Tips',
                'content' => 'Database performance is crucial for application speed. Learn about indexing, query optimization, and caching strategies to improve your database performance.',
                'excerpt' => 'Discover techniques to optimize your database queries and improve application performance.',
                'is_featured' => false,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Frontend Framework Comparison',
                'content' => 'Choosing the right frontend framework is important. This post compares popular frameworks like React, Vue, and Angular to help you make an informed decision.',
                'excerpt' => 'Compare leading frontend frameworks and find the best fit for your project needs.',
                'is_featured' => false,
                'published_at' => now()->subDay(),
            ],
            [
                'title' => 'Security Best Practices for Web Applications',
                'content' => 'Security should be a top priority when building web applications. Learn about common vulnerabilities, authentication methods, and how to protect your users\' data.',
                'excerpt' => 'Essential security practices every web developer should implement in their applications.',
                'is_featured' => true,
                'published_at' => now(),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create([
                'id' => (string) Uuid::uuid4(),
                'title' => $blog['title'],
                'slug' => Str::slug($blog['title']),
                'content' => $blog['content'],
                'excerpt' => $blog['excerpt'],
                'category_id' => $categories->random()->id,
                'author_id' => $author->id,
                'is_featured' => $blog['is_featured'],
                'published_at' => $blog['published_at'],
            ]);
        }
    }
}
