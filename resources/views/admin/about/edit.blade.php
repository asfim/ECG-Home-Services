@extends('admin.layouts.app')

@section('title', 'Manage About & Doctor Section')
@section('page-title', 'Why Us / Doctor Section')

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-person-lines-fill me-1 text-primary"></i>Why CardioHome & Medical Team Details
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-md-4">
          <label class="form-label fw-semibold">Section Eyebrow</label>
          <input type="text" name="eyebrow" class="form-control" value="{{ old('eyebrow', $about->eyebrow) }}" required>
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Heading Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $about->title) }}" required>
        </div>
        <div class="col-md-4">
          <label class="form-label fw-semibold">Heading Highlight (Yellow)</label>
          <input type="text" name="title_highlight" class="form-control" value="{{ old('title_highlight', $about->title_highlight) }}">
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Lead Description</label>
          <textarea name="lead_text" class="form-control" rows="2">{{ old('lead_text', $about->lead_text) }}</textarea>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Doctor / Medical Visual Image</label>
          <input type="file" name="image" class="form-control" accept="image/*">
          <small class="text-muted">Leave empty to keep existing image.</small>
          <div class="mt-2">
            <img src="{{ $about->image_url }}" alt="Preview" class="rounded border" style="max-height: 90px;">
          </div>
        </div>

        <div class="col-md-3">
          <label class="form-label fw-semibold">Experience Years Badge</label>
          <input type="text" name="experience_years" class="form-control" value="{{ old('experience_years', $about->experience_years) }}" placeholder="e.g. 10+" required>
        </div>
        <div class="col-md-3">
          <label class="form-label fw-semibold">Experience Badge Label</label>
          <textarea name="experience_text" class="form-control" rows="2" required>{{ old('experience_text', $about->experience_text) }}</textarea>
        </div>

        <div class="col-12"><hr class="my-2"></div>
        <h6 class="fw-bold text-dark"><i class="bi bi-check2-circle me-1 text-success"></i>Trust Points / Features (One per line)</h6>

        @php
          $featText = is_array($about->features) ? implode("\n", $about->features) : '';
        @endphp
        <div class="col-12">
          <textarea name="features_text" class="form-control" rows="4">{{ old('features_text', $featText) }}</textarea>
          <small class="text-muted">Enter each bullet feature on a new line.</small>
        </div>

        <div class="col-12"><hr class="my-2"></div>
        <h6 class="fw-bold text-dark"><i class="bi bi-bar-chart-fill me-1 text-primary"></i>Three Animated Statistics Counters</h6>

        <!-- Stat 1 -->
        <div class="col-md-4">
          <div class="p-3 bg-light rounded border">
            <h6 class="fw-bold text-secondary mb-2">Counter 1</h6>
            <div class="mb-2">
              <label class="form-label small fw-semibold">Count Number</label>
              <input type="number" name="stat1_count" class="form-control form-control-sm" value="{{ old('stat1_count', $about->stat1_count) }}" required>
            </div>
            <div class="mb-2">
              <label class="form-label small fw-semibold">Suffix (e.g. +)</label>
              <input type="text" name="stat1_suffix" class="form-control form-control-sm" value="{{ old('stat1_suffix', $about->stat1_suffix) }}">
            </div>
            <div>
              <label class="form-label small fw-semibold">Label</label>
              <input type="text" name="stat1_label" class="form-control form-control-sm" value="{{ old('stat1_label', $about->stat1_label) }}" required>
            </div>
          </div>
        </div>

        <!-- Stat 2 -->
        <div class="col-md-4">
          <div class="p-3 bg-light rounded border">
            <h6 class="fw-bold text-secondary mb-2">Counter 2</h6>
            <div class="mb-2">
              <label class="form-label small fw-semibold">Count Number</label>
              <input type="number" name="stat2_count" class="form-control form-control-sm" value="{{ old('stat2_count', $about->stat2_count) }}" required>
            </div>
            <div class="mb-2">
              <label class="form-label small fw-semibold">Suffix (e.g. +)</label>
              <input type="text" name="stat2_suffix" class="form-control form-control-sm" value="{{ old('stat2_suffix', $about->stat2_suffix) }}">
            </div>
            <div>
              <label class="form-label small fw-semibold">Label</label>
              <input type="text" name="stat2_label" class="form-control form-control-sm" value="{{ old('stat2_label', $about->stat2_label) }}" required>
            </div>
          </div>
        </div>

        <!-- Stat 3 -->
        <div class="col-md-4">
          <div class="p-3 bg-light rounded border">
            <h6 class="fw-bold text-secondary mb-2">Counter 3</h6>
            <div class="mb-2">
              <label class="form-label small fw-semibold">Count Number</label>
              <input type="number" name="stat3_count" class="form-control form-control-sm" value="{{ old('stat3_count', $about->stat3_count) }}" required>
            </div>
            <div class="mb-2">
              <label class="form-label small fw-semibold">Suffix (e.g. /7)</label>
              <input type="text" name="stat3_suffix" class="form-control form-control-sm" value="{{ old('stat3_suffix', $about->stat3_suffix) }}">
            </div>
            <div>
              <label class="form-label small fw-semibold">Label</label>
              <input type="text" name="stat3_label" class="form-control form-control-sm" value="{{ old('stat3_label', $about->stat3_label) }}" required>
            </div>
          </div>
        </div>

        <div class="col-12 mt-4">
          <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Update Section</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

