<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoverageArea;
use Illuminate\Http\Request;

class CoverageAreaController extends Controller
{
    public function index()
    {
        $areas = CoverageArea::orderBy('order', 'asc')->get();
        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'is_primary' => 'nullable|boolean',
            'icon' => 'nullable|string|max:100',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_primary'] = $request->boolean('is_primary');
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['icon'] = $validated['icon'] ?? 'bi-geo-alt';

        CoverageArea::create($validated);

        return redirect()->route('admin.areas.index')->with('success', 'Coverage area added successfully.');
    }

    public function edit(CoverageArea $area)
    {
        return view('admin.areas.edit', compact('area'));
    }

    public function update(Request $request, CoverageArea $area)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'is_primary' => 'nullable|boolean',
            'icon' => 'nullable|string|max:100',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_primary'] = $request->boolean('is_primary');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['icon'] = $validated['icon'] ?? 'bi-geo-alt';

        $area->update($validated);

        return redirect()->route('admin.areas.index')->with('success', 'Coverage area updated successfully.');
    }

    public function destroy(CoverageArea $area)
    {
        $area->delete();
        return redirect()->route('admin.areas.index')->with('success', 'Coverage area deleted successfully.');
    }
}

