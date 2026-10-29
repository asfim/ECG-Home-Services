@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Overview & Analytics')

@section('admin-content')
<!-- Metric Cards -->
<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="stat-icon bg-primary bg-opacity-10 text-primary">
        <i class="bi bi-calendar-check-fill"></i>
      </div>
      <div>
        <div class="text-muted small fw-semibold">Total Bookings</div>
        <div class="fs-3 fw-bold text-dark">{{ $stats['total_bookings'] }}</div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="stat-icon bg-warning bg-opacity-10 text-warning">
        <i class="bi bi-clock-history"></i>
      </div>
      <div>
        <div class="text-muted small fw-semibold">Pending Bookings</div>
        <div class="fs-3 fw-bold text-dark">{{ $stats['pending_bookings'] }}</div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="stat-icon bg-success bg-opacity-10 text-success">
        <i class="bi bi-check2-circle"></i>
      </div>
      <div>
        <div class="text-muted small fw-semibold">Confirmed / Done</div>
        <div class="fs-3 fw-bold text-dark">{{ $stats['confirmed_bookings'] + $stats['completed_bookings'] }}</div>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-3">
    <div class="stat-card">
      <div class="stat-icon bg-info bg-opacity-10 text-info">
        <i class="bi bi-heart-pulse-fill"></i>
      </div>
      <div>
        <div class="text-muted small fw-semibold">Active Services</div>
        <div class="fs-3 fw-bold text-dark">{{ $stats['services_count'] }}</div>
      </div>
    </div>
  </div>
</div>

<!-- Quick Action Shortcuts -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <!-- Recent Bookings Table -->
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between align-items-center">
        <span class="fs-6 fw-bold text-dark"><i class="bi bi-calendar-event me-2 text-primary"></i>Recent Appointment Requests</span>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th>Patient</th>
              <th>Service</th>
              <th>Area</th>
              <th>Preferred Date</th>
              <th>Status</th>
              <th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($recentBookings as $b)
              <tr>
                <td>
                  <div class="fw-semibold text-dark">{{ $b->patient_name }}</div>
                  <small class="text-muted"><i class="bi bi-telephone me-1"></i>{{ $b->phone }}</small>
                </td>
                <td>
                  <span class="badge bg-light text-dark border">{{ $b->service }}</span>
                </td>
                <td>{{ $b->area }}</td>
                <td>
                  <div>{{ $b->preferred_date->format('M d, Y') }}</div>
                  <small class="text-muted">{{ $b->preferred_time }}</small>
                </td>
                <td>
                  @if($b->status === 'pending')
                    <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Pending</span>
                  @elseif($b->status === 'confirmed')
                    <span class="badge bg-primary"><i class="bi bi-check-circle me-1"></i>Confirmed</span>
                  @elseif($b->status === 'completed')
                    <span class="badge bg-success"><i class="bi bi-check-all me-1"></i>Completed</span>
                  @else
                    <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Cancelled</span>
                  @endif
                </td>
                <td class="text-end">
                  <a href="{{ route('admin.bookings.show', $b) }}" class="btn btn-sm btn-light border" title="Details">
                    <i class="bi bi-eye"></i>
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center py-4 text-muted">
                  <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                  No bookings received yet. Test by submitting the booking form on the homepage!
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <!-- Quick Management links -->
    <div class="card h-100">
      <div class="card-header fw-bold text-dark">
        <i class="bi bi-lightning-charge-fill me-2 text-warning"></i>Quick Management
      </div>
      <div class="card-body">
        <div class="list-group list-group-flush">
          <a href="{{ route('admin.sliders.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
            <div>
              <i class="bi bi-images text-primary me-2 fs-5"></i>
              <span class="fw-semibold">Hero Sliders & Banners</span>
            </div>
            <span class="badge bg-light text-secondary border">{{ $stats['sliders_count'] }}</span>
          </a>
          <a href="{{ route('admin.services.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
            <div>
              <i class="bi bi-heart-pulse text-danger me-2 fs-5"></i>
              <span class="fw-semibold">Manage Services</span>
            </div>
            <span class="badge bg-light text-secondary border">{{ $stats['services_count'] }}</span>
          </a>
          <a href="{{ route('admin.galleries.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
            <div>
              <i class="bi bi-camera-reels-fill text-success me-2 fs-5"></i>
              <span class="fw-semibold">Work & Real Gallery</span>
            </div>
            <span class="badge bg-light text-secondary border">{{ $stats['galleries_count'] }}</span>
          </a>
          <a href="{{ route('admin.about.edit') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
            <div>
              <i class="bi bi-person-lines-fill text-info me-2 fs-5"></i>
              <span class="fw-semibold">About / Doctor Section</span>
            </div>
            <i class="bi bi-chevron-right text-muted"></i>
          </a>
          <a href="{{ route('admin.pricing.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
            <div>
              <i class="bi bi-tag-fill text-warning me-2 fs-5"></i>
              <span class="fw-semibold">Pricing Packages</span>
            </div>
            <i class="bi bi-chevron-right text-muted"></i>
          </a>
          <a href="{{ route('admin.settings.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
            <div>
              <i class="bi bi-sliders text-dark me-2 fs-5"></i>
              <span class="fw-semibold">Site Settings & SEO</span>
            </div>
            <i class="bi bi-chevron-right text-muted"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
