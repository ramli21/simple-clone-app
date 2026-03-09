<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with(['category', 'author'])
            ->latest('created_at')
            ->paginate(15);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'category_id' => 'nullable|uuid|exists:categories,id',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['author_id'] = auth()->id();

        if (!isset($validated['published_at']) || $validated['published_at'] === null) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            Storage::disk('public')->putFileAs('blogs', $image, $image->hashName(), 'public');
            $imagePath = Storage::disk('public')->url('blogs/' . $image->hashName());
            $validated['image'] = $imagePath;
        }

        $blog = Blog::create($validated);

        return redirect()->route('admin.blogs.show', $blog)->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->load(['category', 'author']);
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'category_id' => 'nullable|uuid|exists:categories,id',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Remove image before update if a new image is uploaded
        if ($request->hasFile('image')) {
            if ($blog->image_path) {
                $imagePath = public_path($blog->image_path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            Storage::disk('public')->putFileAs('blogs', $image, $image->hashName(), 'public');
            $imagePath = Storage::disk('public')->url('blogs/' . $image->hashName());
            $validated['image'] = $imagePath;
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.show', $blog)->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}

