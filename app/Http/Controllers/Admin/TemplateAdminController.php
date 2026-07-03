<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebTemplate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;


class TemplateAdminController extends Controller
{
    public function index()
    {
        $templates = WebTemplate::query()->latest()->paginate(15);
        return view('admin.templates.index', compact('templates'));
    }

    public function create()
    {
        return view('admin.templates.create');
    }

    public function store(StoreTemplateRequest $request)
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
            'sku' => ['nullable', 'string', 'max:255', 'unique:web_templates,sku'],
            'images' => ['nullable', 'array', 'min:1'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png', 'max:4096'],
            'delivery_type' => ['nullable', 'in:file,github_repo,external_link'],
            'thumbnail_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'template_file' => ['nullable', 'file', 'mimes:zip', 'max:102400'], // 100MB max
        ]);


        $validated['slug'] = Str::slug($validated['name']);
        $validated['delivery_type'] = $validated['delivery_type'] ?? 'file';
        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;

        // Handle file upload for 'file' delivery type
        if ($validated['delivery_type'] === 'file') {
            if ($request->hasFile('template_file')) {
                $path = $request->file('template_file')->store('web-templates/files', 'private');
                $validated['download_path'] = $path;
            } else {
                $validated['download_path'] = null;
            }
        } else {
            // For other delivery types, use the download_path input
            $validated['download_path'] = $request->input('download_path');
        }

        if ($request->hasFile('thumbnail_image')) {
            $path = $request->file('thumbnail_image')->store('web-templates/thumbnails', 'public');
            $validated['thumbnail_image'] = $path;
        }

        if ($request->hasFile('images')) {
            $paths = [];
            foreach ((array) $request->file('images') as $image) {
                if ($image) {
                    $paths[] = $image->store('web-templates/images', 'public');
                }
            }
            $validated['images'] = $paths;
        }

        if (!isset($validated['sales_count'])) {
            $validated['sales_count'] = 0;
        }

        $template = WebTemplate::create($validated);

        return redirect()->route('admin.templates.edit', $template)->with('success', 'Template created successfully.');
    }

    public function edit(WebTemplate $template)
    {
        return view('admin.templates.edit', compact('template'));
    }

    public function update(UpdateTemplateRequest $request, WebTemplate $template)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($request->name);
        $validated['delivery_type'] = $request->input('delivery_type', 'file');
        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;
        $validated['preview_url'] = $request->input('preview_url');
        $validated['stack'] = $request->input('stack');
        $validated['discount_percentage'] = $request->input('discount_percentage');
        $validated['sales_count'] = $request->input('sales_count', $template->sales_count ?? 0);

        // Validasi tambahan (field yang belum tercakup di FormRequest)
        $request->validate([
            'sku' => ['nullable', 'string', 'max:255', 'unique:web_templates,sku,' . $template->id . ',id'],
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
                if (!empty($template->download_path) && Storage::disk('private')->exists($template->download_path)) {
                    Storage::disk('private')->delete($template->download_path);
                }
                $path = $request->file('template_file')->store('web-templates/files', 'private');
                $validated['download_path'] = $path;
            } else {
                // Keep existing path if no new file is uploaded
                $validated['download_path'] = $template->download_path;
            }
        } else {
            // For other delivery types, use the download_path input
            $validated['download_path'] = $request->input('download_path');
        }

        if ($request->hasFile('thumbnail_image')) {
            if (!empty($template->thumbnail_image) && Storage::disk('public')->exists($template->thumbnail_image)) {
                Storage::disk('public')->delete($template->thumbnail_image);
            }

            $path = $request->file('thumbnail_image')->store('web-templates/thumbnails', 'public');
            $validated['thumbnail_image'] = $path;
        }

        if ($request->hasFile('images')) {
            if (is_array($template->images)) {
                foreach ($template->images as $oldPath) {
                    if (!empty($oldPath) && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                }
            }

            $paths = [];
            foreach ((array) $request->file('images') as $image) {
                if ($image) {
                    $paths[] = $image->store('web-templates/images', 'public');
                }
            }
            $validated['images'] = $paths;
        }

        if (!isset($validated['sales_count'])) {
            $validated['sales_count'] = $template->sales_count ?? 0;
        }

        $template->update($validated);

        return redirect()->route('admin.templates.edit', $template)->with('success', 'Template updated successfully.');
    }

    public function destroy(WebTemplate $template)
    {
        if (!empty($template->thumbnail_image) && Storage::disk('public')->exists($template->thumbnail_image)) {
            Storage::disk('public')->delete($template->thumbnail_image);
        }

        if (is_array($template->images)) {
            foreach ($template->images as $path) {
                if (!empty($path) && Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        $template->delete();

        return redirect()->route('admin.templates.index')->with('success', 'Template deleted successfully.');
    }
}

