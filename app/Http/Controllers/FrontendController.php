<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\Booking;
use App\Models\CoverageArea;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\PricingPlan;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $sliders = Slider::where('is_active', true)->orderBy('order', 'asc')->get();
        $services = Service::where('is_active', true)->orderBy('order', 'asc')->get();
        $galleries = Gallery::where('is_active', true)->orderBy('order', 'asc')->get();
        $about = AboutSection::first();
        $pricingPlans = PricingPlan::where('is_active', true)->orderBy('order', 'asc')->get();
        $coverageAreas = CoverageArea::where('is_active', true)->orderBy('order', 'asc')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('order', 'asc')->get();
        $faqs = Faq::where('is_active', true)->orderBy('order', 'asc')->get();

        return view('frontend.home', compact(
            'settings',
            'sliders',
            'services',
            'galleries',
            'about',
            'pricingPlans',
            'coverageAreas',
            'testimonials',
            'faqs'
        ));
    }

    public function book(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'phone' => ['required', 'string', 'regex:/^(\+?88)?01[3-9]\d{8}$/'],
            'service' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'address' => 'required|string|max:1000',
            'preferred_date' => 'required|date',
            'preferred_time' => 'required|string|max:255',
            'female_technician' => 'nullable|boolean',
        ]);

        $booking = Booking::create([
            'patient_name' => $validated['patient_name'],
            'phone' => $validated['phone'],
            'service' => $validated['service'],
            'area' => $validated['area'],
            'address' => $validated['address'],
            'preferred_date' => $validated['preferred_date'],
            'preferred_time' => $validated['preferred_time'],
            'female_technician' => $request->boolean('female_technician'),
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => "Thank you, {$booking->patient_name}! Our team will call {$booking->phone} within 5 minutes to confirm your {$booking->service} appointment.",
            'booking_id' => $booking->id,
        ]);
    }
}
