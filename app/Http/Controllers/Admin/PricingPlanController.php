<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    public function index()
    {
        $plans = PricingPlan::orderBy('order', 'asc')->get();
        return view('admin.pricing.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pricing.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'required|integer|min:0',
            'currency' => 'required|string|max:10',
            'is_featured' => 'nullable|boolean',
            'ribbon_text' => 'nullable|string|max:100',
            'features_text' => 'required|string',
            'btn_text' => 'nullable|string|max:100',
            'btn_service_name' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $features = [];
        $lines = array_filter(array_map('trim', explode("\n", $request->features_text)));
        foreach ($lines as $line) {
            $isExcluded = str_starts_with($line, '-') || str_starts_with($line, '!') || str_starts_with($line, 'x ');
            $cleanText = ltrim($line, "-!x ");
            $features[] = [
                'text' => trim($cleanText),
                'included' => !$isExcluded,
            ];
        }

        $validated['features'] = $features;
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['btn_text'] = $validated['btn_text'] ?? 'Choose Plan';

        PricingPlan::create($validated);

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing plan created successfully.');
    }

    public function edit(PricingPlan $pricing)
    {
        return view('admin.pricing.edit', compact('pricing'));
    }

    public function update(Request $request, PricingPlan $pricing)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'required|integer|min:0',
            'currency' => 'required|string|max:10',
            'is_featured' => 'nullable|boolean',
            'ribbon_text' => 'nullable|string|max:100',
            'features_text' => 'required|string',
            'btn_text' => 'nullable|string|max:100',
            'btn_service_name' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $features = [];
        $lines = array_filter(array_map('trim', explode("\n", $request->features_text)));
        foreach ($lines as $line) {
            $isExcluded = str_starts_with($line, '-') || str_starts_with($line, '!') || str_starts_with($line, 'x ');
            $cleanText = ltrim($line, "-!x ");
            $features[] = [
                'text' => trim($cleanText),
                'included' => !$isExcluded,
            ];
        }

        $validated['features'] = $features;
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['btn_text'] = $validated['btn_text'] ?? 'Choose Plan';

        $pricing->update($validated);

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing plan updated successfully.');
    }

    public function destroy(PricingPlan $pricing)
    {
        $pricing->delete();
        return redirect()->route('admin.pricing.index')->with('success', 'Pricing plan deleted successfully.');
    }
}
