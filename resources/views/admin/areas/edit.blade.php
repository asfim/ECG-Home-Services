@extends('admin.layouts.app')

@section('title', 'Edit Coverage Area')
@section('page-title', 'Edit Area: ' . $area->name)

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-pencil-square me-1 text-primary"></i>Update Area
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.areas.update', $area) }}">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Area Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $area->name) }}" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Icon Class</label>
          <input type="text" name="icon" class="form-control" value="{{ old('icon', $area->icon) }}">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', $area->order) }}" required>
        </div>
        <div class="col-md-4 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_primary" value="1" id="isPrimary" {{ $area->is_primary ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isPrimary">Mark as Primary (Highlighted)</label>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ $area->is_active ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isActive">Active</label>
          </div>
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update Area</button>
          <a href="{{ route('admin.areas.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

