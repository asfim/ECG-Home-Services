@extends('admin.layouts.app')

@section('title', 'Edit Service')
@section('page-title', 'Edit Service: ' . $service->title)

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-pencil-square me-1 text-primary"></i>Update Service
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Service Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Service Image</label>
          <input type="file" name="image" class="form-control" accept="image/*">
          <small class="text-muted">Leave empty to keep existing image.</small>
          <div class="mt-2">
            <img src="{{ $service->image_url }}" alt="Preview" class="rounded border" style="max-height: 60px;">
          </div>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Badge Tag Text</label>
          <input type="text" name="tag_text" class="form-control" value="{{ old('tag_text', $service->tag_text) }}">
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Badge Tag Class</label>
          <select name="tag_class" class="form-select">
            <option value="tag-standard" {{ $service->tag_class === 'tag-standard' ? 'selected' : '' }}>tag-standard (Teal)</option>
            <option value="tag-featured" {{ $service->tag_class === 'tag-featured' ? 'selected' : '' }}>tag-featured (Indigo)</option>
            <option value="tag-wearable" {{ $service->tag_class === 'tag-wearable' ? 'selected' : '' }}>tag-wearable (Amber)</option>
            <option value="tag-urgent" {{ $service->tag_class === 'tag-urgent' ? 'selected' : '' }}>tag-urgent (Rose / Urgent)</option>
            <option value="tag-care" {{ $service->tag_class === 'tag-care' ? 'selected' : '' }}>tag-care (Emerald / Care)</option>
            <option value="tag-group" {{ $service->tag_class === 'tag-group' ? 'selected' : '' }}>tag-group (Sky / Corporate)</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Badge Tag Icon</label>
          <input type="text" name="tag_icon" class="form-control" value="{{ old('tag_icon', $service->tag_icon) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Icon (Bootstrap Icon Class)</label>
          <input type="text" name="icon" class="form-control" value="{{ old('icon', $service->icon) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Icon Color Style</label>
          <select name="icon_class" class="form-select">
            <option value="" {{ empty($service->icon_class) ? 'selected' : '' }}>Default Teal</option>
            <option value="icon-indigo" {{ $service->icon_class === 'icon-indigo' ? 'selected' : '' }}>Indigo</option>
            <option value="icon-amber" {{ $service->icon_class === 'icon-amber' ? 'selected' : '' }}>Amber</option>
            <option value="icon-rose" {{ $service->icon_class === 'icon-rose' ? 'selected' : '' }}>Rose</option>
            <option value="icon-emerald" {{ $service->icon_class === 'icon-emerald' ? 'selected' : '' }}>Emerald</option>
            <option value="icon-sky" {{ $service->icon_class === 'icon-sky' ? 'selected' : '' }}>Sky</option>
          </select>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Short Description <span class="text-danger">*</span></label>
          <textarea name="description" class="form-control" rows="3" required>{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Booking Select Option Name</label>
          <input type="text" name="booking_service_name" class="form-control" value="{{ old('booking_service_name', $service->booking_service_name) }}">
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', $service->order) }}" required>
        </div>
        <div class="col-md-4 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ $service->is_active ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isActive">Active / Visible</label>
          </div>
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update Service</button>
          <a href="{{ route('admin.services.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
