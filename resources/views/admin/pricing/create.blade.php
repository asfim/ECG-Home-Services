@extends('admin.layouts.app')

@section('title', 'Add Pricing Plan')
@section('page-title', 'Create Pricing Package')

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-plus-circle me-1 text-primary"></i>Pricing Plan Details
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.pricing.store') }}">
      @csrf
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Package Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. ECG + Review" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Subtitle</label>
          <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}" placeholder="e.g. ECG with cardiologist report">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Price (Amount) <span class="text-danger">*</span></label>
          <input type="number" name="price" class="form-control" value="{{ old('price', 800) }}" required>
        </div>
        <div class="col-md-2">
          <label class="form-label fw-semibold">Currency Symbol</label>
          <input type="text" name="currency" class="form-control" value="{{ old('currency', '৳') }}" required>
        </div>
        <div class="col-md-3">
          <label class="form-label fw-semibold">Ribbon Badge Text</label>
          <input type="text" name="ribbon_text" class="form-control" value="{{ old('ribbon_text', 'Most Popular') }}" placeholder="e.g. Most Popular">
        </div>
        <div class="col-md-3 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="isFeatured">
            <label class="form-check-label fw-semibold" for="isFeatured">Highlight as Featured</label>
          </div>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Features List (One item per line) <span class="text-danger">*</span></label>
          <textarea name="features_text" class="form-control" rows="5" required placeholder="Home visit included
Printed ECG strip
Digital copy on WhatsApp
- Cardiologist review">{{ old('features_text') }}</textarea>
          <small class="text-muted">
            Tip: Prepend <code>- </code> (dash) or <code>! </code> to make an item marked as <strong>excluded / unavailable</strong> (e.g. <code>- Cardiologist review</code>). All other lines are marked as included!
          </small>
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Button Text</label>
          <input type="text" name="btn_text" class="form-control" value="{{ old('btn_text', 'Choose Plan') }}">
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Booking Pre-select Name</label>
          <input type="text" name="btn_service_name" class="form-control" value="{{ old('btn_service_name') }}" placeholder="e.g. ECG + Cardiologist Review">
        </div>
        <div class="col-md-2">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', 1) }}" required>
        </div>
        <div class="col-md-2 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" checked>
            <label class="form-check-label fw-semibold" for="isActive">Active</label>
          </div>
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Save Plan</button>
          <a href="{{ route('admin.pricing.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
