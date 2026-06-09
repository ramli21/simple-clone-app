<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WebTemplate;
use Illuminate\Http\Request;

class TemplatePublicController extends Controller
{
    public function index()
    {
        $templates = WebTemplate::query()
            ->where('is_active', true)
            ->orderByDesc('sales_count')
            ->orWhere(function ($query) {
                // fallback sorting by latest if sales_count ties are expected
            })
            ->get();

        $categories = WebTemplate::query()
            ->where('is_active', true)
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->filter()
            ->values();

        return view('templates.index_2', [
            'templates' => $templates,
            'categories' => $categories,
        ]);

    }

    public function show(string $slug)
    {
        $template = WebTemplate::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        // categories untuk mendukung UI detail (optional)
        $categories = WebTemplate::query()
            ->where('is_active', true)
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->filter()
            ->values();


        if (!$template) {
            abort(404);
        }

        return view('templates.show_2', compact('template', 'categories'));


    }
}

