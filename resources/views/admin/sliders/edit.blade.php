@extends('admin.layouts.app')

@section('title', 'Edit Slide')
@section('page-title', 'Edit Hero Slide #' . $slider->id)

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-pencil-square me-1 text-primary"></i>Update Slide Details
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.sliders.update', $slider) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Slide Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Highlighted Word/Phrase (Yellow)</label>
          <input type="text" name="title_highlight" class="form-control" value="{{ old('title_highlight', $slider->title_highlight) }}">
        </div>
        <div class="col-md-8">
          <label class="form-label fw-semibold">Subtitle / Trailing Line</label>
          <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $slider->subtitle) }}">
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Badge Pill Text</label>
          <input type="text" name="badge_text" class="form-control" value="{{ old('badge_text', $slider->badge_text) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Slide Background Image</label>
          <input type="file" name="image" class="form-control" accept="image/*">
          <small class="text-muted">Leave empty to keep current image.</small>
          <div class="mt-2">
            <span class="small text-muted d-block mb-1">Current image preview:</span>
            <img src="{{ $slider->image_url }}" alt="Preview" class="rounded border" style="max-height: 80px; width: auto;">
          </div>
        </div>
        <div class="col-md-3">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', $slider->order) }}" required>
        </div>
        <div class="col-md-3 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ $slider->is_active ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isActive">Active / Visible</label>
          </div>
        </div>

        <div class="col-12"><hr class="my-2"></div>
        <h6 class="fw-bold text-dark"><i class="bi bi-box-arrow-up-right me-1 text-primary"></i>Call to Action Buttons</h6>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Primary Button Text</label>
          <input type="text" name="btn1_text" class="form-control" value="{{ old('btn1_text', $slider->btn1_text) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Primary Button Link</label>
          <input type="text" name="btn1_link" class="form-control" value="{{ old('btn1_link', $slider->btn1_link) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Secondary Button Text</label>
          <input type="text" name="btn2_text" class="form-control" value="{{ old('btn2_text', $slider->btn2_text) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Secondary Button Link</label>
          <input type="text" name="btn2_link" class="form-control" value="{{ old('btn2_link', $slider->btn2_link) }}">
        </div>

        <div class="col-12"><hr class="my-2"></div>
        <h6 class="fw-bold text-dark"><i class="bi bi-card-heading me-1 text-info"></i>Floating Feature Cards (Right Side)</h6>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Float Card 1 Title</label>
          <input type="text" name="float_card_1_title" class="form-control" value="{{ old('float_card_1_title', $slider->float_card_1_title) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Float Card 1 Subtitle</label>
          <input type="text" name="float_card_1_subtitle" class="form-control" value="{{ old('float_card_1_subtitle', $slider->float_card_1_subtitle) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Float Card 2 Title</label>
          <input type="text" name="float_card_2_title" class="form-control" value="{{ old('float_card_2_title', $slider->float_card_2_title) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Float Card 2 Subtitle</label>
          <input type="text" name="float_card_2_subtitle" class="form-control" value="{{ old('float_card_2_subtitle', $slider->float_card_2_subtitle) }}">
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update Slide</button>
          <a href="{{ route('admin.sliders.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
