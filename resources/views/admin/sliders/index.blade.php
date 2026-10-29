@extends('admin.layouts.app')

@section('title', 'Manage Hero Sliders')
@section('page-title', 'Hero Sliders & Banners')

@section('admin-content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <p class="text-muted mb-0">Control the top rotating hero slides, images, titles, and call-to-action buttons.</p>
  <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> Add New Slide
  </a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead>
        <tr>
          <th style="width: 80px;">Order</th>
          <th style="width: 140px;">Preview</th>
          <th>Heading & Details</th>
          <th>Action Buttons</th>
          <th>Status</th>
          <th class="actions-col" style="width: 130px; min-width: 130px; text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($sliders as $slider)
          <tr>
            <td>
              <span class="badge bg-light text-dark border fs-6">#{{ $slider->order }}</span>
            </td>
            <td>
              <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" class="rounded border shadow-sm" style="width: 120px; height: 68px; object-fit: cover;">
            </td>
            <td>
              @if($slider->badge_text)
                <span class="badge bg-info-subtle text-info border border-info-subtle mb-1">{{ $slider->badge_text }}</span>
              @endif
              <div class="fw-bold text-dark fs-6">
                {{ $slider->title }} <span class="text-primary">{{ $slider->title_highlight }}</span>
              </div>
              @if($slider->subtitle)
                <small class="text-muted">{{ $slider->subtitle }}</small>
              @endif
            </td>
            <td>
              @if($slider->btn1_text)
                <span class="badge bg-light text-dark border me-1"><i class="bi bi-box-arrow-up-right me-1"></i>{{ $slider->btn1_text }}</span>
              @endif
              @if($slider->btn2_text)
                <span class="badge bg-light text-dark border"><i class="bi bi-telephone me-1"></i>{{ $slider->btn2_text }}</span>
              @endif
            </td>
            <td>
              @if($slider->is_active)
                <span class="badge bg-success">Active</span>
              @else
                <span class="badge bg-secondary">Inactive</span>
              @endif
            </td>
            <td class="actions-col" style="white-space: nowrap; width: 130px; min-width: 130px; text-align: right;">
              <div class="table-actions" style="display: inline-flex; flex-direction: row; flex-wrap: nowrap; align-items: center; justify-content: flex-end; gap: 8px;">
                <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-outline-primary" title="Edit" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;">
                  <i class="bi bi-pencil"></i>
                </a>
                <form method="POST" action="{{ route('admin.sliders.destroy', $slider) }}" onsubmit="return confirm('Delete this slide?');" style="display: inline-flex; margin: 0; padding: 0;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-outline-danger" title="Delete" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center py-5 text-muted">
              No sliders found. Click "Add New Slide" to create one.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

