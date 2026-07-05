<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::query()->latest()->paginate(5);
        
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'link' => ['nullable', 'url', 'max:2048'],
            'story' => ['required', 'string'],
            'highlights' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:4096'],
            'published' => ['nullable', 'in:1,0,true,false'],
        ]);

        $highlights = $this->parseHighlights($validated['highlights']);
        $imagePath = $this->handleImageUpload($request);

        $portfolio = Portfolio::create([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'link' => $validated['link'] ?? null,
            'story' => $validated['story'],
            'highlights' => $highlights,
            'image' => $imagePath,
            'published' => $request->boolean('published'),
        ]);

        return redirect()->route('admin.portfolios.show', $portfolio->id)
            ->with('success', 'Portfolio berhasil dibuat.');
    }

    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'link' => ['nullable', 'url', 'max:2048'],
            'story' => ['required', 'string'],
            'highlights' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:4096'],
            'published' => ['nullable', 'in:1,0,true,false'],
        ]);

        $highlights = $this->parseHighlights($validated['highlights']);
        $imagePath = $this->handleImageUpload($request);

        $data = [
            'name' => $validated['name'],
            'category' => $validated['category'],
            'link' => $validated['link'] ?? null,
            'story' => $validated['story'],
            'highlights' => $highlights,
            'published' => $request->boolean('published'),
        ];

        if ($imagePath) {
            if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $data['image'] = $imagePath;
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.show', $portfolio->id)
            ->with('success', 'Portfolio berhasil diperbarui.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
            Storage::disk('public')->delete($portfolio->image);
        }
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil dihapus.');
    }

    private function parseHighlights(string $value): array
    {
        $value = trim($value);
        if ($value === '') return [];

        $parts = preg_split('/\r\n|\r|\n|\s*,\s*/', $value);
        $parts = array_map(fn($p) => trim($p), $parts);
        $parts = array_filter($parts, fn($p) => $p !== '');

        return array_values(array_unique($parts));
    }

    private function handleImageUpload(Request $request): ?string
    {
        if (!$request->hasFile('image')) return null;

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();

        return $file->storeAs('portfolios', $filename, 'public');
    }
}

