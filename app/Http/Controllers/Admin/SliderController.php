<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\HandlesImageUpload;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use HandlesImageUpload;

    public function index()
    {
        $sliders = Slider::orderBy('order', 'asc')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_highlight' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'badge_text' => 'nullable|string|max:255',
            'badge_icon' => 'nullable|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'btn1_text' => 'nullable|string|max:255',
            'btn1_link' => 'nullable|string|max:255',
            'btn1_icon' => 'nullable|string|max:100',
            'btn2_text' => 'nullable|string|max:255',
            'btn2_link' => 'nullable|string|max:255',
            'btn2_icon' => 'nullable|string|max:100',
            'float_card_1_title' => 'nullable|string|max:255',
            'float_card_1_subtitle' => 'nullable|string|max:255',
            'float_card_1_icon' => 'nullable|string|max:100',
            'float_card_2_title' => 'nullable|string|max:255',
            'float_card_2_subtitle' => 'nullable|string|max:255',
            'float_card_2_icon' => 'nullable|string|max:100',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'));
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        Slider::create($validated);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_highlight' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'badge_text' => 'nullable|string|max:255',
            'badge_icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'btn1_text' => 'nullable|string|max:255',
            'btn1_link' => 'nullable|string|max:255',
            'btn1_icon' => 'nullable|string|max:100',
            'btn2_text' => 'nullable|string|max:255',
            'btn2_link' => 'nullable|string|max:255',
            'btn2_icon' => 'nullable|string|max:100',
            'float_card_1_title' => 'nullable|string|max:255',
            'float_card_1_subtitle' => 'nullable|string|max:255',
            'float_card_1_icon' => 'nullable|string|max:100',
            'float_card_2_title' => 'nullable|string|max:255',
            'float_card_2_subtitle' => 'nullable|string|max:255',
            'float_card_2_icon' => 'nullable|string|max:100',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'), $slider->image);
        }

        $validated['is_active'] = $request->boolean('is_active');

        $slider->update($validated);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image && str_starts_with($slider->image, 'uploads/')) {
            @unlink(public_path($slider->image));
        }
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
