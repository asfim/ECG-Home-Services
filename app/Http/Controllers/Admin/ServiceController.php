<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Traits\HandlesImageUpload;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use HandlesImageUpload;

    public function index()
    {
        $services = Service::orderBy('order', 'asc')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tag_text' => 'nullable|string|max:255',
            'tag_class' => 'nullable|string|max:100',
            'tag_icon' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:100',
            'icon_class' => 'nullable|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'required|string',
            'booking_service_name' => 'nullable|string|max:255',
            'action_link' => 'nullable|string|max:255',
            'action_text' => 'nullable|string|max:100',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'));
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['icon'] = $validated['icon'] ?? 'bi-heart-pulse';
        $validated['action_link'] = $validated['action_link'] ?? '#booking';
        $validated['action_text'] = $validated['action_text'] ?? 'Book now';

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tag_text' => 'nullable|string|max:255',
            'tag_class' => 'nullable|string|max:100',
            'tag_icon' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:100',
            'icon_class' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'required|string',
            'booking_service_name' => 'nullable|string|max:255',
            'action_link' => 'nullable|string|max:255',
            'action_text' => 'nullable|string|max:100',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'), $service->image);
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['icon'] = $validated['icon'] ?? 'bi-heart-pulse';
        $validated['action_link'] = $validated['action_link'] ?? '#booking';
        $validated['action_text'] = $validated['action_text'] ?? 'Book now';

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->image && str_starts_with($service->image, 'uploads/')) {
            @unlink(public_path($service->image));
        }
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
