@extends('admin.layouts.app')

@section('title', 'Edit Pricing Plan')
@section('page-title', 'Edit Pricing Package: ' . $pricing->name)

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-pencil-square me-1 text-primary"></i>Update Pricing Plan
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.pricing.update', $pricing) }}">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Package Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $pricing->name) }}" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Subtitle</label>
          <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $pricing->subtitle) }}">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Price (Amount) <span class="text-danger">*</span></label>
          <input type="number" name="price" class="form-control" value="{{ old('price', $pricing->price) }}" required>
        </div>
        <div class="col-md-2">
          <label class="form-label fw-semibold">Currency Symbol</label>
          <input type="text" name="currency" class="form-control" value="{{ old('currency', $pricing->currency) }}" required>
        </div>
        <div class="col-md-3">
          <label class="form-label fw-semibold">Ribbon Badge Text</label>
          <input type="text" name="ribbon_text" class="form-control" value="{{ old('ribbon_text', $pricing->ribbon_text) }}">
        </div>
        <div class="col-md-3 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="isFeatured" {{ $pricing->is_featured ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isFeatured">Highlight as Featured</label>
          </div>
        </div>

        @php
          $featLines = [];
          if (is_array($pricing->features)) {
              foreach ($pricing->features as $f) {
                  $prefix = empty($f['included']) ? '- ' : '';
                  $featLines[] = $prefix . ($f['text'] ?? '');
              }
          }
          $featText = implode("\n", $featLines);
        @endphp

        <div class="col-12">
          <label class="form-label fw-semibold">Features List (One item per line) <span class="text-danger">*</span></label>
          <textarea name="features_text" class="form-control" rows="5" required>{{ old('features_text', $featText) }}</textarea>
          <small class="text-muted">
            Tip: Prepend <code>- </code> (dash) or <code>! </code> to make an item marked as <strong>excluded / unavailable</strong> (e.g. <code>- Cardiologist review</code>). All other lines are marked as included!
          </small>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Button Text</label>
          <input type="text" name="btn_text" class="form-control" value="{{ old('btn_text', $pricing->btn_text) }}">
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Booking Pre-select Name</label>
          <input type="text" name="btn_service_name" class="form-control" value="{{ old('btn_service_name', $pricing->btn_service_name) }}">
        </div>
        <div class="col-md-2">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', $pricing->order) }}" required>
        </div>
        <div class="col-md-2 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ $pricing->is_active ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isActive">Active</label>
          </div>
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update Plan</button>
          <a href="{{ route('admin.pricing.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
