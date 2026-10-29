@extends('admin.layouts.app')

@section('title', 'Add Testimonial')
@section('page-title', 'Create Patient Review')

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-plus-circle me-1 text-primary"></i>Review Details
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.testimonials.store') }}">
      @csrf
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Patient Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Rafiq Hasan" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Location / Address</label>
          <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="e.g. Tajmahal Road, Mohammadpur">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Rating (1 to 5 Stars) <span class="text-danger">*</span></label>
          <input type="number" step="0.5" name="rating" class="form-control" value="{{ old('rating', '5.0') }}" min="1" max="5" required>
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Avatar Initials (Optional)</label>
          <input type="text" name="avatar_text" class="form-control" value="{{ old('avatar_text') }}" placeholder="e.g. RH (auto if empty)">
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Avatar Style</label>
          <select name="avatar_class" class="form-select">
            <option value="avatar-teal">Teal</option>
            <option value="avatar-rose">Rose</option>
            <option value="avatar-amber">Amber</option>
          </select>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Review / Comment <span class="text-danger">*</span></label>
          <textarea name="comment" class="form-control" rows="3" required placeholder="My father is 78 and can't travel easily...">{{ old('comment') }}</textarea>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', 1) }}" required>
        </div>
        <div class="col-md-4 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_verified" value="1" id="isVerified" checked>
            <label class="form-check-label fw-semibold" for="isVerified">Show "Verified" Badge</label>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" checked>
            <label class="form-check-label fw-semibold" for="isActive">Active / Visible</label>
          </div>
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Save Testimonial</button>
          <a href="{{ route('admin.testimonials.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

