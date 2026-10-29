@extends('admin.layouts.app')

@section('title', 'Add Gallery Item')
@section('page-title', 'Create Gallery Item')

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-plus-circle me-1 text-primary"></i>Gallery Item Details
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Card Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. ডিজিটাল পোর্টেবল এক্স-রে" required>
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Designation / Subtitle</label>
          <input type="text" name="designation" class="form-control" value="{{ old('designation') }}" placeholder="e.g. মার্কেটিং ম্যানেজার (optional)">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Corner Badge Text</label>
          <input type="text" name="badge_text" class="form-control" value="{{ old('badge_text') }}" placeholder="e.g. অফিসিয়াল কার্ড / ডিজিটাল প্রসেসিং">
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Badge Class</label>
          <select name="badge_class" class="form-select">
            <option value="badge-contact">badge-contact (Blue)</option>
            <option value="badge-tech">badge-tech (Indigo)</option>
            <option value="badge-ot">badge-ot (Emerald / OT)</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Badge Icon</label>
          <input type="text" name="badge_icon" class="form-control" value="{{ old('badge_icon', 'bi-shield-check') }}" placeholder="e.g. bi-person-vcard-fill">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Image <span class="text-danger">*</span></label>
          <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>
        <div class="col-md-3">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', 1) }}" required>
        </div>
        <div class="col-md-3 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" checked>
            <label class="form-check-label fw-semibold" for="isActive">Active / Visible</label>
          </div>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Description</label>
          <textarea name="description" class="form-control" rows="2" placeholder="উন্নত ডিজিটাল ফ্ল্যাট প্যানেল ডিটেক্টর (FPD) দ্বারা অন-স্পট এক্স-রে...">{{ old('description') }}</textarea>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Bullet Points / Features (One per line)</label>
          <textarea name="features_text" class="form-control" rows="4" placeholder="তাৎক্ষণিক ডিজিটাল ইমেজ ট্রান্সফার
নিরাপদ ও আন্তর্জাতিক মানের রেডিয়েশন কন্ট্রোল
হাড়ের নিখুঁত ও পরিষ্কার ফ্র্যাকচার ভিউ">{{ old('features_text') }}</textarea>
          <small class="text-muted">Enter each bullet point feature on a new line.</small>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Meta Tech Tags (One per line: Text | icon | class)</label>
          <textarea name="tags_text" class="form-control" rows="4" placeholder="Flat Panel Detector | bi-cpu-fill | tech-tag
রিয়েল-টাইম | bi-lightning-charge-fill | tech-tag">{{ old('tags_text') }}</textarea>
          <small class="text-muted">Format: <code>Tag Text | Icon Class | Tag Style</code></small>
        </div>

        <div class="col-12"><hr class="my-2"></div>
        <h6 class="fw-bold text-dark"><i class="bi bi-box-arrow-up-right me-1 text-primary"></i>Action Buttons</h6>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Button 1 Text</label>
          <input type="text" name="btn1_text" class="form-control" value="{{ old('btn1_text', 'কল করুন: 01348-223547') }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Button 1 Link</label>
          <input type="text" name="btn1_link" class="form-control" value="{{ old('btn1_link', 'tel:+8801348223547') }}">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Button 2 Text</label>
          <input type="text" name="btn2_text" class="form-control" value="{{ old('btn2_text', 'WhatsApp-এ চ্যাট করুন') }}">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-semibold">Button 2 Link</label>
          <input type="text" name="btn2_link" class="form-control" value="{{ old('btn2_link', 'https://wa.me/8801348223547') }}">
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Save Gallery Item</button>
          <a href="{{ route('admin.galleries.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
