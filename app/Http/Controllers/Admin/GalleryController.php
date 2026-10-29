<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Traits\HandlesImageUpload;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    use HandlesImageUpload;

    public function index()
    {
        $galleries = Gallery::orderBy('order', 'asc')->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'badge_text' => 'nullable|string|max:255',
            'badge_class' => 'nullable|string|max:100',
            'badge_icon' => 'nullable|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string',
            'tags_text' => 'nullable|string',
            'features_text' => 'nullable|string',
            'btn1_text' => 'nullable|string|max:255',
            'btn1_link' => 'nullable|string|max:255',
            'btn1_icon' => 'nullable|string|max:100',
            'btn1_class' => 'nullable|string|max:100',
            'btn2_text' => 'nullable|string|max:255',
            'btn2_link' => 'nullable|string|max:255',
            'btn2_icon' => 'nullable|string|max:100',
            'btn2_class' => 'nullable|string|max:100',
            'booking_service' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'));
        }

        // Process features
        if (!empty($request->features_text)) {
            $lines = array_filter(array_map('trim', explode("\n", $request->features_text)));
            $validated['features'] = array_values($lines);
        } else {
            $validated['features'] = null;
        }

        // Process tags
        if (!empty($request->tags_text)) {
            $tags = [];
            $tagLines = array_filter(array_map('trim', explode("\n", $request->tags_text)));
            foreach ($tagLines as $line) {
                $parts = array_map('trim', explode('|', $line));
                $tags[] = [
                    'text' => $parts[0] ?? $line,
                    'icon' => $parts[1] ?? 'bi-shield-check',
                    'class' => $parts[2] ?? 'tech-tag',
                ];
            }
            $validated['tags'] = $tags;
        } else {
            $validated['tags'] = null;
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        Gallery::create($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item created successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'badge_text' => 'nullable|string|max:255',
            'badge_class' => 'nullable|string|max:100',
            'badge_icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string',
            'tags_text' => 'nullable|string',
            'features_text' => 'nullable|string',
            'btn1_text' => 'nullable|string|max:255',
            'btn1_link' => 'nullable|string|max:255',
            'btn1_icon' => 'nullable|string|max:100',
            'btn1_class' => 'nullable|string|max:100',
            'btn2_text' => 'nullable|string|max:255',
            'btn2_link' => 'nullable|string|max:255',
            'btn2_icon' => 'nullable|string|max:100',
            'btn2_class' => 'nullable|string|max:100',
            'booking_service' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'), $gallery->image);
        }

        // Process features
        if (!empty($request->features_text)) {
            $lines = array_filter(array_map('trim', explode("\n", $request->features_text)));
            $validated['features'] = array_values($lines);
        } else {
            $validated['features'] = null;
        }

        // Process tags
        if (!empty($request->tags_text)) {
            $tags = [];
            $tagLines = array_filter(array_map('trim', explode("\n", $request->tags_text)));
            foreach ($tagLines as $line) {
                $parts = array_map('trim', explode('|', $line));
                $tags[] = [
                    'text' => $parts[0] ?? $line,
                    'icon' => $parts[1] ?? 'bi-shield-check',
                    'class' => $parts[2] ?? 'tech-tag',
                ];
            }
            $validated['tags'] = $tags;
        } else {
            $validated['tags'] = null;
        }

        $validated['is_active'] = $request->boolean('is_active');

        $gallery->update($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && str_starts_with($gallery->image, 'uploads/')) {
            @unlink(public_path($gallery->image));
        }
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item deleted successfully.');
    }
}

