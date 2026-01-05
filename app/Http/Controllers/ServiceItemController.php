<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ServiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ServiceItem::with('category')->latest()->paginate(10);
        return view('admin.service-items.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.service-items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'category_id' => 'required|uuid|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'metadata' => 'nullable|array', // Validasi untuk metadata
        ]);

        // Buat slug dari title
        $validated['slug'] = Str::slug($request->title);

        // Handle upload thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('services/thumbnails', 'public');
            $validated['thumbnail'] = $thumbnailPath;
        }

        // Simpan metadata sebagai JSON
        // Kita membiarkan input dinamis, jadi langsung simpan apa yang ada
        $metadataKeys = $request->input('metadata', []);
        $metadataValues = $request->input('metadata_value', []);
        $metadata = [];

        if (count($metadataKeys) === count($metadataValues)) {
            foreach ($metadataKeys as $index => $key) {
                if (!empty($key) && !empty($metadataValues[$index])) {
                    $metadata[$key] = $metadataValues[$index];
                }
            }
        }
        $validated['metadata'] = $metadata;

        ServiceItem::create($validated);

        return redirect()->route('admin.service-items.index')->with('success', 'Service/Paket berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceItem $serviceItem)
    {
        // Pastikan relasi ikut dimuat
        $serviceItem->load('category', 'itineraries');
        return view('admin.service-items.show', compact('serviceItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceItem $serviceItem)
    {
        $categories = Category::all();
        return view('admin.service-items.edit', compact('serviceItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceItem $serviceItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'category_id' => 'required|uuid|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'metadata' => 'nullable|array',
        ]);

        // Update slug jika title berubah
        if ($request->title !== $serviceItem->title) {
            $validated['slug'] = Str::slug($request->title);
        }

        // Handle upload thumbnail baru
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($serviceItem->thumbnail) {
                Storage::disk('public')->delete($serviceItem->thumbnail);
            }
            $thumbnailPath = $request->file('thumbnail')->store('services/thumbnails', 'public');
            $validated['thumbnail'] = $thumbnailPath;
        }

        $metadataKeys = $request->input('metadata', []);
        $metadataValues = $request->input('metadata_value', []);
        $metadata = [];

        if (count($metadataKeys) === count($metadataValues)) {
            foreach ($metadataKeys as $index => $key) {
                if (!empty($key) && !empty($metadataValues[$index])) {
                    $metadata[$key] = $metadataValues[$index];
                }
            }
        }
        $validated['metadata'] = $metadata;

        $serviceItem->update($validated);

        return redirect()->route('admin.service-items.index')->with('success', 'Service/Paket berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceItem $serviceItem)
    {
        // Hapus thumbnail dari storage sebelum menghapus data
        if ($serviceItem->thumbnail) {
            Storage::disk('public')->delete($serviceItem->thumbnail);
        }

        $serviceItem->delete();

        return redirect()->route('admin.service-items.index')->with('success', 'Service/Paket berhasil dihapus.');
    }
}

