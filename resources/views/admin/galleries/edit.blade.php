@extends('admin.layouts.app')

@section('title', 'Edit Gallery Item')
@section('page-title', 'Edit Gallery: ' . $gallery->title)

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-pencil-square me-1 text-primary"></i>Update Gallery Item
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.galleries.update', $gallery) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Card Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Designation / Subtitle</label>
          <input type="text" name="designation" class="form-control" value="{{ old('designation', $gallery->designation) }}">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Corner Badge Text</label>
          <input type="text" name="badge_text" class="form-control" value="{{ old('badge_text', $gallery->badge_text) }}">
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Badge Class</label>
          <select name="badge_class" class="form-select">
            <option value="badge-contact" {{ $gallery->badge_class === 'badge-contact' ? 'selected' : '' }}>badge-contact (Blue)</option>
            <option value="badge-tech" {{ $gallery->badge_class === 'badge-tech' ? 'selected' : '' }}>badge-tech (Indigo)</option>
            <option value="badge-ot" {{ $gallery->badge_class === 'badge-ot' ? 'selected' : '' }}>badge-ot (Emerald / OT)</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Badge Icon</label>
          <input type="text" name="badge_icon" class="form-control" value="{{ old('badge_icon', $gallery->badge_icon) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Image</label>
          <input type="file" name="image" class="form-control" accept="image/*">
          <small class="text-muted">Leave empty to keep current image.</small>
          <div class="mt-2">
            <img src="{{ $gallery->image_url }}" alt="Preview" class="rounded border" style="max-height: 60px;">
          </div>
        </div>
        <div class="col-md-3">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', $gallery->order) }}" required>
        </div>
        <div class="col-md-3 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ $gallery->is_active ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isActive">Active / Visible</label>
          </div>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Description</label>
          <textarea name="description" class="form-control" rows="2">{{ old('description', $gallery->description) }}</textarea>
        </div>

        @php
          $featuresText = is_array($gallery->features) ? implode("\n", $gallery->features) : '';
          $tagsText = '';
          if (is_array($gallery->tags)) {
              $tagLines = [];
              foreach ($gallery->tags as $t) {
                  $txt = $t['text'] ?? '';
                  $icn = $t['icon'] ?? 'bi-shield-check';
                  $cls = $t['class'] ?? 'tech-tag';
                  $tagLines[] = "{$txt} | {$icn} | {$cls}";
              }
              $tagsText = implode("\n", $tagLines);
          }
        @endphp

        <div class="col-md-6">
          <label class="form-label fw-semibold">Bullet Points / Features (One per line)</label>
          <textarea name="features_text" class="form-control" rows="4">{{ old('features_text', $featuresText) }}</textarea>
          <small class="text-muted">Enter each bullet point feature on a new line.</small>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Meta Tech Tags (One per line: Text | icon | class)</label>
          <textarea name="tags_text" class="form-control" rows="4">{{ old('tags_text', $tagsText) }}</textarea>
          <small class="text-muted">Format: <code>Tag Text | Icon Class | Tag Style</code></small>
        </div>

        <div class="col-12"><hr class="my-2"></div>
        <h6 class="fw-bold text-dark"><i class="bi bi-box-arrow-up-right me-1 text-primary"></i>Action Buttons</h6>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Button 1 Text</label>
          <input type="text" name="btn1_text" class="form-control" value="{{ old('btn1_text', $gallery->btn1_text) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Button 1 Link</label>
          <input type="text" name="btn1_link" class="form-control" value="{{ old('btn1_link', $gallery->btn1_link) }}">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Button 2 Text</label>
          <input type="text" name="btn2_text" class="form-control" value="{{ old('btn2_text', $gallery->btn2_text) }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Button 2 Link</label>
          <input type="text" name="btn2_link" class="form-control" value="{{ old('btn2_link', $gallery->btn2_link) }}">
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update Gallery Item</button>
          <a href="{{ route('admin.galleries.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
