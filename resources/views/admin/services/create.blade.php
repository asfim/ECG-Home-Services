@extends('admin.layouts.app')

@section('title', 'Add New Service')
@section('page-title', 'Create Service Package')

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-plus-circle me-1 text-primary"></i>Service Details
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Service Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. 12-Lead ECG at Home" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Service Image <span class="text-danger">*</span></label>
          <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Badge Tag Text</label>
          <input type="text" name="tag_text" class="form-control" value="{{ old('tag_text') }}" placeholder="e.g. Standard / Most Popular">
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Badge Tag Class</label>
          <select name="tag_class" class="form-select">
            <option value="tag-standard">tag-standard (Teal)</option>
            <option value="tag-featured">tag-featured (Indigo)</option>
            <option value="tag-wearable">tag-wearable (Amber)</option>
            <option value="tag-urgent">tag-urgent (Rose / Urgent)</option>
            <option value="tag-care">tag-care (Emerald / Care)</option>
            <option value="tag-group">tag-group (Sky / Corporate)</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Badge Tag Icon</label>
          <input type="text" name="tag_icon" class="form-control" value="{{ old('tag_icon', 'bi-shield-check') }}" placeholder="e.g. bi-shield-check">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Icon (Bootstrap Icon Class)</label>
          <input type="text" name="icon" class="form-control" value="{{ old('icon', 'bi-heart-pulse') }}" placeholder="e.g. bi-heart-pulse">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Icon Color Style</label>
          <select name="icon_class" class="form-select">
            <option value="">Default Teal</option>
            <option value="icon-indigo">Indigo</option>
            <option value="icon-amber">Amber</option>
            <option value="icon-rose">Rose</option>
            <option value="icon-emerald">Emerald</option>
            <option value="icon-sky">Sky</option>
          </select>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Short Description <span class="text-danger">*</span></label>
          <textarea name="description" class="form-control" rows="3" required placeholder="Standard resting ECG to check heart rhythm...">{{ old('description') }}</textarea>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Booking Select Option Name</label>
          <input type="text" name="booking_service_name" class="form-control" value="{{ old('booking_service_name') }}" placeholder="e.g. 12-Lead ECG">
          <small class="text-muted">The exact option name in the booking dropdown.</small>
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', 1) }}" required>
        </div>
        <div class="col-md-4 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" checked>
            <label class="form-check-label fw-semibold" for="isActive">Active / Visible</label>
          </div>
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Save Service</button>
          <a href="{{ route('admin.services.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

