@extends('admin.layouts.app')

@section('title', 'Manage Testimonials')
@section('page-title', 'Patient Reviews & Testimonials')

@section('admin-content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <p class="text-muted mb-0">Control patient reviews, star ratings, quotes, avatar styles, and verification status.</p>
  <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> Add Testimonial
  </a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead>
        <tr>
          <th style="width: 70px;">Order</th>
          <th>Patient Name & Location</th>
          <th>Rating</th>
          <th>Review Comment</th>
          <th>Verified</th>
          <th>Status</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($testimonials as $testi)
          <tr>
            <td>
              <span class="badge bg-light text-dark border">#{{ $testi->order }}</span>
            </td>
            <td>
              <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary rounded-circle p-2">{{ $testi->avatar_text }}</span>
                <div>
                  <div class="fw-bold text-dark">{{ $testi->name }}</div>
                  <small class="text-muted">{{ $testi->location }}</small>
                </div>
              </div>
            </td>
            <td>
              <span class="text-warning fw-bold"><i class="bi bi-star-fill me-1"></i>{{ $testi->rating }}</span>
            </td>
            <td>
              <small class="text-muted text-truncate d-inline-block" style="max-width: 320px;">{{ $testi->comment }}</small>
            </td>
            <td>
              @if($testi->is_verified)
                <span class="badge bg-success-subtle text-success border border-success-subtle"><i class="bi bi-patch-check-fill me-1"></i>Verified</span>
              @else
                <span class="text-muted small">Standard</span>
              @endif
            </td>
            <td>
              @if($testi->is_active)
                <span class="badge bg-success">Active</span>
              @else
                <span class="badge bg-secondary">Inactive</span>
              @endif
            </td>
            <td class="text-end">
              <a href="{{ route('admin.testimonials.edit', $testi) }}" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                <i class="bi bi-pencil"></i>
              </a>
              <form method="POST" action="{{ route('admin.testimonials.destroy', $testi) }}" class="d-inline" onsubmit="return confirm('Delete this testimonial?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center py-5 text-muted">
              No testimonials found. Click "Add Testimonial" to create one.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
