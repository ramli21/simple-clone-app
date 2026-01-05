<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     * Khusus untuk itinerary, kita perlu tahu service item terkait.
     */
    public function create(ServiceItem $serviceItem)
    {
        return view('admin.itineraries.create', compact('serviceItem'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ServiceItem $serviceItem)
    {
        $validated = $request->validate([
            'day_number' => 'required|integer|min:1',
            'activity_title' => 'required|string|max:255',
            'activity_description' => 'required|string',
        ]);

        $validated['service_item_id'] = $serviceItem->id;
        Itinerary::create($validated);

        return redirect()->route('admin.service-items.show', $serviceItem->id)->with('success', 'Itinerary berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Itinerary $itinerary)
    {
        return view('admin.itineraries.edit', compact('itinerary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Itinerary $itinerary)
    {
        $validated = $request->validate([
            'day_number' => 'required|integer|min:1',
            'activity_title' => 'required|string|max:255',
            'activity_description' => 'required|string',
        ]);

        $itinerary->update($validated);

        return redirect()->route('admin.service-items.show', $itinerary->service_item_id)->with('success', 'Itinerary berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Itinerary $itinerary)
    {
        $serviceItemId = $itinerary->service_item_id;
        $itinerary->delete();

        return redirect()->route('admin.service-items.show', $serviceItemId)->with('success', 'Itinerary berhasil dihapus.');
    }
}
