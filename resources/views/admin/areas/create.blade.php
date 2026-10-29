@extends('admin.layouts.app')

@section('title', 'Add Coverage Area')
@section('page-title', 'Add New Dhaka Area')

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-plus-circle me-1 text-primary"></i>Coverage Area Details
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.areas.store') }}">
      @csrf
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Area Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Mohammadpur / Dhanmondi" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Icon Class</label>
          <input type="text" name="icon" class="form-control" value="{{ old('icon', 'bi-geo-alt') }}" placeholder="e.g. bi-geo-alt">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', 1) }}" required>
        </div>
        <div class="col-md-4 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_primary" value="1" id="isPrimary">
            <label class="form-check-label fw-semibold" for="isPrimary">Mark as Primary (Highlighted)</label>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" checked>
            <label class="form-check-label fw-semibold" for="isActive">Active</label>
          </div>
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Save Area</button>
          <a href="{{ route('admin.areas.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
