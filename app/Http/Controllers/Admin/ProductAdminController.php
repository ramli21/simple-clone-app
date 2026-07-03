<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::query()->latest()->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $validated['sku'] = $request->input('sku');
        $validated['slug'] = Str::slug($request->name);
        $validated['stack'] = $request->input('stack');
        $validated['discount_percentage'] = $request->input('discount_percentage');
        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;
        $validated['preview_url'] = $request->input('preview_url');
        $validated['delivery_type'] = $request->input('delivery_type', 'file');
        $validated['sales_count'] = $request->input('sales_count', 0);

        // Validasi tambahan (field yang belum tercakup di FormRequest)
        $request->validate([
            'sku' => ['nullable', 'string', 'max:255', 'unique:products,sku'],
            'images' => ['nullable', 'array', 'min:1'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png', 'max:4096'],
            'delivery_type' => ['nullable', 'in:file,github_repo,external_link'],
            'thumbnail_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'produk_file' => ['nullable', 'file', 'mimes:zip', 'max:102400'], // 100MB max
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['delivery_type'] = $validated['delivery_type'] ?? 'file';
        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;

        // Handle file upload for 'file' delivery type
        if ($validated['delivery_type'] === 'file') {
            if ($request->hasFile('produk_file')) {
                $path = $request->file('produk_file')->store('products/files', 'private');
                $validated['download_path'] = $path;
            } else {
                $validated['download_path'] = null;
            }
        } else {
            // For other delivery types, use the download_path input
            $validated['download_path'] = $request->input('download_path');
        }

        if ($request->hasFile('thumbnail_image')) {
            $path = $request->file('thumbnail_image')->store('products/thumbnails', 'public');
            $validated['thumbnail_image'] = $path;
        }

        if ($request->hasFile('images')) {
            $paths = [];
            foreach ((array) $request->file('images') as $image) {
                if ($image) {
                    $paths[] = $image->store('products/images', 'public');
                }
            }
            $validated['images'] = $paths;
        }

        if (! isset($validated['sales_count'])) {
            $validated['sales_count'] = 0;
        }

        $product = Product::create($validated);

        return redirect()->route('admin.products.edit', $product)->with('success', 'Template created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($request->name);
        $validated['delivery_type'] = $request->input('delivery_type', 'file');
        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;
        $validated['preview_url'] = $request->input('preview_url');
        $validated['stack'] = $request->input('stack');
        $validated['discount_percentage'] = $request->input('discount_percentage');
        $validated['sales_count'] = $request->input('sales_count', $product->sales_count ?? 0);

        // Validasi tambahan (field yang belum tercakup di FormRequest)
        $request->validate([
            'sku' => ['nullable', 'string', 'max:255', 'unique:products,sku,'.$product->id.',id'],
            'images' => ['nullable', 'array', 'min:1'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png', 'max:4096'],
            'delivery_type' => ['nullable', 'in:file,github_repo,external_link'],
            'thumbnail_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'template_file' => ['nullable', 'file', 'mimes:zip', 'max:102400'], // 100MB max
        ]);

        // Handle file upload for 'file' delivery type
        if ($validated['delivery_type'] === 'file') {
            if ($request->hasFile('template_file')) {
                // Delete old file if exists
                if (! empty($product->download_path) && Storage::disk('private')->exists($product->download_path)) {
                    Storage::disk('private')->delete($product->download_path);
                }
                $path = $request->file('template_file')->store('products/files', 'private');
                $validated['download_path'] = $path;
            } else {
                // Keep existing path if no new file is uploaded
                $validated['download_path'] = $product->download_path;
            }
        } else {
            // For other delivery types, use the download_path input
            $validated['download_path'] = $request->input('download_path');
        }

        if ($request->hasFile('thumbnail_image')) {
            if (! empty($product->thumbnail_image) && Storage::disk('public')->exists($product->thumbnail_image)) {
                Storage::disk('public')->delete($product->thumbnail_image);
            }

            $path = $request->file('thumbnail_image')->store('products/thumbnails', 'public');
            $validated['thumbnail_image'] = $path;
        }

        if ($request->hasFile('images')) {
            if (is_array($product->images)) {
                foreach ($product->images as $oldPath) {
                    if (! empty($oldPath) && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                }
            }

            $paths = [];
            foreach ((array) $request->file('images') as $image) {
                if ($image) {
                    $paths[] = $image->store('products/images', 'public');
                }
            }
            $validated['images'] = $paths;
        }

        if (! isset($validated['sales_count'])) {
            $validated['sales_count'] = $product->sales_count ?? 0;
        }

        $product->update($validated);

        return redirect()->route('admin.products.edit', $product)->with('success', 'Template updated successfully.');
    }

    public function destroy(Product $product)
    {
        if (! empty($product->thumbnail_image) && Storage::disk('public')->exists($product->thumbnail_image)) {
            Storage::disk('public')->delete($product->thumbnail_image);
        }

        if (is_array($product->images)) {
            foreach ($product->images as $path) {
                if (! empty($path) && Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Template deleted successfully.');
    }
}
