<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()->latest()->paginate(10);

        return view('blogs.index', compact('blogs'));
    }

    public function show($slug)
    {
        // Try to find by slug first. If not found, allow legacy URLs using the ID (uuid)
        $blog = Blog::published()->where('slug', $slug)->first();

        if (! $blog) {
            // If $slug looks like an ID, try to find by id and redirect to canonical slug URL
            $byId = Blog::published()->find($slug);
            if ($byId) {
                return redirect(route('blogs.show', $byId->slug), 301);
            }

            abort(404);
        }

        $blog->incrementView();

        return view('blogs.show', compact('blog'));
    }
}
