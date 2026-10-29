@extends('admin.layouts.app')

@section('title', 'Manage Bookings')
@section('page-title', 'Patient Bookings & Appointments')

@section('admin-content')
<div class="card mb-4">
  <div class="card-body">
    <form method="GET" action="{{ route('admin.bookings.index') }}" class="row g-2 align-items-center">
      <div class="col-md-5">
        <div class="input-group">
          <span class="input-group-text bg-light text-muted"><i class="bi bi-search"></i></span>
          <input type="text" name="search" class="form-control" placeholder="Search by name, phone, area or service..." value="{{ request('search') }}">
        </div>
      </div>
      <div class="col-md-3">
        <select name="status" class="form-select">
          <option value="">All Statuses</option>
          <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
          <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
          <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
          <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
      </div>
      <div class="col-md-4 d-flex gap-2">
        <button type="submit" class="btn btn-primary"><i class="bi bi-funnel me-1"></i> Filter</button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-light border"><i class="bi bi-arrow-counterclockwise me-1"></i> Reset</a>
      </div>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <span class="fw-bold"><i class="bi bi-list-check me-2 text-primary"></i>All Bookings ({{ $bookings->total() }})</span>
  </div>
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Patient Details</th>
          <th>Service Requested</th>
          <th>Area & Address</th>
          <th>Date & Time</th>
          <th>Female Tech?</th>
          <th>Status</th>
          <th class="actions-col" style="width: 130px; min-width: 130px; text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($bookings as $booking)
          <tr>
            <td>#{{ $booking->id }}</td>
            <td>
              <div class="fw-bold text-dark">{{ $booking->patient_name }}</div>
              <div><a href="tel:{{ $booking->phone }}" class="text-decoration-none text-primary"><i class="bi bi-telephone-fill me-1"></i>{{ $booking->phone }}</a></div>
            </td>
            <td>
              <span class="badge bg-light text-dark border">{{ $booking->service }}</span>
            </td>
            <td>
              <div class="fw-semibold">{{ $booking->area }}</div>
              <small class="text-muted text-truncate d-inline-block" style="max-width: 180px;" title="{{ $booking->address }}">{{ $booking->address }}</small>
            </td>
            <td>
              <div>{{ $booking->preferred_date->format('d M, Y') }}</div>
              <small class="text-muted">{{ $booking->preferred_time }}</small>
            </td>
            <td>
              @if($booking->female_technician)
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle"><i class="bi bi-gender-female me-1"></i>Yes</span>
              @else
                <span class="text-muted small">No</span>
              @endif
            </td>
            <td>
              @if($booking->status === 'pending')
                <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Pending</span>
              @elseif($booking->status === 'confirmed')
                <span class="badge bg-primary"><i class="bi bi-check-circle me-1"></i>Confirmed</span>
              @elseif($booking->status === 'completed')
                <span class="badge bg-success"><i class="bi bi-check-all me-1"></i>Completed</span>
              @else
                <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Cancelled</span>
              @endif
            </td>
            <td class="actions-col" style="white-space: nowrap; width: 130px; min-width: 130px; text-align: right;">
              <div class="table-actions" style="display: inline-flex; flex-direction: row; flex-wrap: nowrap; align-items: center; justify-content: flex-end; gap: 8px;">
                <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-outline-primary" title="View details & change status" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <form method="POST" action="{{ route('admin.bookings.destroy', $booking) }}" onsubmit="return confirm('Delete this booking request?');" style="display: inline-flex; margin: 0; padding: 0;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-outline-danger" title="Delete" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center py-5 text-muted">
              <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
              No bookings found matching criteria.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($bookings->hasPages())
    <div class="card-footer bg-white">
      {{ $bookings->links() }}
    </div>
  @endif
</div>
@endsection

