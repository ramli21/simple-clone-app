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

        return view('templates.index', compact('templates'));
    }

    public function show(string $slug)
    {
        $template = WebTemplate::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$template) {
            abort(404);
        }

        return view('templates.show', compact('template'));
    }
}

