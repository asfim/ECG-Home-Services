@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')
@section('page-title', 'Edit Review: ' . $testimonial->name)

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-pencil-square me-1 text-primary"></i>Update Review
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Patient Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Location / Address</label>
          <input type="text" name="location" class="form-control" value="{{ old('location', $testimonial->location) }}">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Rating (1 to 5 Stars) <span class="text-danger">*</span></label>
          <input type="number" step="0.1" name="rating" class="form-control" value="{{ old('rating', $testimonial->rating) }}" min="1" max="5" required>
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Avatar Initials</label>
          <input type="text" name="avatar_text" class="form-control" value="{{ old('avatar_text', $testimonial->avatar_text) }}">
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Avatar Style</label>
          <select name="avatar_class" class="form-select">
            <option value="avatar-teal" {{ $testimonial->avatar_class === 'avatar-teal' ? 'selected' : '' }}>Teal</option>
            <option value="avatar-rose" {{ $testimonial->avatar_class === 'avatar-rose' ? 'selected' : '' }}>Rose</option>
            <option value="avatar-amber" {{ $testimonial->avatar_class === 'avatar-amber' ? 'selected' : '' }}>Amber</option>
          </select>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Review / Comment <span class="text-danger">*</span></label>
          <textarea name="comment" class="form-control" rows="3" required>{{ old('comment', $testimonial->comment) }}</textarea>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', $testimonial->order) }}" required>
        </div>
        <div class="col-md-4 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_verified" value="1" id="isVerified" {{ $testimonial->is_verified ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isVerified">Show "Verified" Badge</label>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ $testimonial->is_active ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isActive">Active / Visible</label>
          </div>
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update Testimonial</button>
          <a href="{{ route('admin.testimonials.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
