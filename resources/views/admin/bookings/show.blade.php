@extends('admin.layouts.app')

@section('title', 'Booking #' . $booking->id)
@section('page-title', 'Booking Details #' . $booking->id)

@section('admin-content')
<div class="row g-4">
  <div class="col-lg-7">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between align-items-center">
        <span class="fw-bold"><i class="bi bi-person-badge me-2 text-primary"></i>Patient & Appointment Information</span>
        <span class="text-muted small">Received on {{ $booking->created_at->format('M d, Y h:i A') }}</span>
      </div>
      <div class="card-body">
        <div class="row g-3 mb-3">
          <div class="col-sm-6">
            <label class="text-muted small fw-semibold">Patient Full Name</label>
            <div class="fs-5 fw-bold text-dark">{{ $booking->patient_name }}</div>
          </div>
          <div class="col-sm-6">
            <label class="text-muted small fw-semibold">Phone Number</label>
            <div class="fs-5 fw-bold">
              <a href="tel:{{ $booking->phone }}" class="text-primary text-decoration-none">
                <i class="bi bi-telephone-outbound me-1"></i>{{ $booking->phone }}
              </a>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="text-muted small fw-semibold">Service Selected</label>
            <div><span class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle fs-6">{{ $booking->service }}</span></div>
          </div>
          <div class="col-sm-6">
            <label class="text-muted small fw-semibold">Area</label>
            <div class="fw-semibold text-dark"><i class="bi bi-geo-alt me-1 text-danger"></i>{{ $booking->area }}</div>
          </div>
          <div class="col-12">
            <label class="text-muted small fw-semibold">Full Address</label>
            <div class="p-3 bg-light rounded border">{{ $booking->address }}</div>
          </div>
          <div class="col-sm-6">
            <label class="text-muted small fw-semibold">Preferred Date</label>
            <div class="fw-semibold text-dark"><i class="bi bi-calendar-event me-1"></i>{{ $booking->preferred_date->format('l, F d, Y') }}</div>
          </div>
          <div class="col-sm-6">
            <label class="text-muted small fw-semibold">Preferred Time</label>
            <div class="fw-semibold text-dark"><i class="bi bi-clock me-1"></i>{{ $booking->preferred_time }}</div>
          </div>
          <div class="col-12">
            <label class="text-muted small fw-semibold">Female Technician Preference</label>
            <div>
              @if($booking->female_technician)
                <span class="badge bg-danger text-white"><i class="bi bi-check2-circle me-1"></i>Requested Female Technician</span>
              @else
                <span class="badge bg-secondary">No Preference</span>
              @endif
            </div>
          </div>
        </div>

        <div class="d-flex gap-2 pt-3 border-top">
          <a href="tel:{{ $booking->phone }}" class="btn btn-success"><i class="bi bi-telephone-fill me-1"></i> Call Patient</a>
          <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->phone) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-whatsapp me-1"></i> WhatsApp</a>
          <a href="{{ route('admin.bookings.index') }}" class="btn btn-light border ms-auto">Back to list</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card h-100">
      <div class="card-header fw-bold">
        <i class="bi bi-gear-fill me-2 text-warning"></i>Update Status & Admin Notes
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.bookings.status', $booking) }}">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label class="form-label fw-semibold">Booking Status</label>
            <select name="status" class="form-select" required>
              <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>⏳ Pending (New)</option>
              <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>✅ Confirmed (Scheduled)</option>
              <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>🎉 Completed (Done)</option>
              <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>❌ Cancelled</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Staff Notes / Assigned Technician</label>
            <textarea name="notes" class="form-control" rows="5" placeholder="e.g. Technician Rahim assigned. Visited at 11:30 AM.">{{ old('notes', $booking->notes) }}</textarea>
            <small class="text-muted">Internal notes visible only to admins.</small>
          </div>

          <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-save me-1"></i> Update Booking Status
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

