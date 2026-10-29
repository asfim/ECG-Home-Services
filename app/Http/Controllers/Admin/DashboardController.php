<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'completed_bookings' => Booking::where('status', 'completed')->count(),
            'sliders_count' => Slider::count(),
            'services_count' => Service::count(),
            'galleries_count' => Gallery::count(),
            'testimonials_count' => Testimonial::count(),
        ];

        $recentBookings = Booking::latest()->take(8)->get();

        return view('admin.dashboard', compact('stats', 'recentBookings'));
    }
}
