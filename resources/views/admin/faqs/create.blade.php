@extends('admin.layouts.app')

@section('title', 'Add FAQ')
@section('page-title', 'Create New Question')

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-plus-circle me-1 text-primary"></i>FAQ Details
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.faqs.store') }}">
      @csrf
      <div class="row g-3">
        <div class="col-12">
          <label class="form-label fw-semibold">Question <span class="text-danger">*</span></label>
          <input type="text" name="question" class="form-control" value="{{ old('question') }}" placeholder="e.g. Is a home ECG as accurate as a hospital ECG?" required>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Answer <span class="text-danger">*</span></label>
          <textarea name="answer" class="form-control" rows="4" required placeholder="Yes. We use the same calibrated 12-lead ECG machines...">{{ old('answer') }}</textarea>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Display Order</label>
          <input type="number" name="order" class="form-control" value="{{ old('order', 1) }}" required>
        </div>
        <div class="col-md-6 d-flex align-items-center pt-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" checked>
            <label class="form-check-label fw-semibold" for="isActive">Active / Visible</label>
          </div>
        </div>

        <div class="col-12 mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Save FAQ</button>
          <a href="{{ route('admin.faqs.index') }}" class="btn btn-light border">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

