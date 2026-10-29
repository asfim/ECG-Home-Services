<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Traits\HandlesImageUpload;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use HandlesImageUpload;

    public function edit()
    {
        $about = AboutSection::firstOrCreate([], [
            'eyebrow' => 'Why CardioHome',
            'title' => 'The most trusted',
            'title_highlight' => 'ECG Home Service in Mohammadpur',
            'lead_text' => 'We bring the accuracy of a hospital to your living room — with the care and patience your loved ones deserve.',
            'image' => 'images/doctor.jpg',
            'experience_years' => '10+',
            'experience_text' => "Years of cardiac\ncare experience",
            'features' => [
                'Female technicians available on request',
                'BMDC-registered cardiologists review every report',
                'Calibrated, hospital-grade portable machines',
                'Pay after service — Cash, bKash or Nagad',
            ],
            'stat1_count' => 25,
            'stat1_suffix' => '+',
            'stat1_label' => 'Technicians',
            'stat2_count' => 12,
            'stat2_suffix' => null,
            'stat2_label' => 'Cardiologists',
            'stat3_count' => 24,
            'stat3_suffix' => '/7',
            'stat3_label' => 'Support',
        ]);

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutSection::first();

        $validated = $request->validate([
            'eyebrow' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'title_highlight' => 'nullable|string|max:255',
            'lead_text' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'experience_years' => 'required|string|max:50',
            'experience_text' => 'required|string|max:255',
            'features_text' => 'nullable|string',
            'stat1_count' => 'required|integer',
            'stat1_suffix' => 'nullable|string|max:20',
            'stat1_label' => 'required|string|max:100',
            'stat2_count' => 'required|integer',
            'stat2_suffix' => 'nullable|string|max:20',
            'stat2_label' => 'required|string|max:100',
            'stat3_count' => 'required|integer',
            'stat3_suffix' => 'nullable|string|max:20',
            'stat3_label' => 'required|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'), $about ? $about->image : null);
        }

        if (!empty($request->features_text)) {
            $lines = array_filter(array_map('trim', explode("\n", $request->features_text)));
            $validated['features'] = array_values($lines);
        } else {
            $validated['features'] = [];
        }

        if ($about) {
            $about->update($validated);
        } else {
            AboutSection::create($validated);
        }

        return redirect()->route('admin.about.edit')->with('success', 'About section updated successfully.');
    }
}
