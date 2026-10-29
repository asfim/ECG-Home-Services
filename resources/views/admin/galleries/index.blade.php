@extends('admin.layouts.app')

@section('title', 'Work & Real Service Gallery')
@section('page-title', 'Service & Work Gallery')

@section('admin-content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <p class="text-muted mb-0">Control the real work gallery cards, images (C-Arm, X-Ray, Visiting Card, etc.), bullet points, and action buttons.</p>
  <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> Add Gallery Item
  </a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead>
        <tr>
          <th style="width: 70px;">Order</th>
          <th style="width: 100px;">Photo</th>
          <th>Title & Designation</th>
          <th>Badge & Tags</th>
          <th>Buttons</th>
          <th>Status</th>
          <th class="actions-col" style="width: 130px; min-width: 130px; text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($galleries as $item)
          <tr>
            <td>
              <span class="badge bg-light text-dark border">#{{ $item->order }}</span>
            </td>
            <td>
              <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="rounded border shadow-sm" style="width: 75px; height: 55px; object-fit: cover;">
            </td>
            <td>
              <div class="fw-bold text-dark fs-6">{{ $item->title }}</div>
              @if($item->designation)
                <small class="text-muted d-block">{{ $item->designation }}</small>
              @endif
              @if($item->description)
                <small class="text-muted text-truncate d-inline-block" style="max-width: 280px;">{{ $item->description }}</small>
              @endif
            </td>
            <td>
              @if($item->badge_text)
                <span class="badge bg-info-subtle text-info border border-info-subtle mb-1">{{ $item->badge_text }}</span>
              @endif
              @if(!empty($item->tags) && is_array($item->tags))
                <div class="d-flex flex-wrap gap-1">
                  @foreach($item->tags as $t)
                    <span class="badge bg-light text-secondary border small">{{ $t['text'] ?? '' }}</span>
                  @endforeach
                </div>
              @endif
            </td>
            <td>
              @if($item->btn1_text)
                <span class="badge bg-light text-dark border me-1">{{ $item->btn1_text }}</span>
              @endif
              @if($item->btn2_text)
                <span class="badge bg-light text-dark border">{{ $item->btn2_text }}</span>
              @endif
            </td>
            <td>
              @if($item->is_active)
                <span class="badge bg-success">Active</span>
              @else
                <span class="badge bg-secondary">Inactive</span>
              @endif
            </td>
            <td class="actions-col" style="white-space: nowrap; width: 130px; min-width: 130px; text-align: right;">
              <div class="table-actions" style="display: inline-flex; flex-direction: row; flex-wrap: nowrap; align-items: center; justify-content: flex-end; gap: 8px;">
                <a href="{{ route('admin.galleries.edit', $item) }}" class="btn btn-outline-primary" title="Edit" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;">
                  <i class="bi bi-pencil"></i>
                </a>
                <form method="POST" action="{{ route('admin.galleries.destroy', $item) }}" onsubmit="return confirm('Delete this gallery item?');" style="display: inline-flex; margin: 0; padding: 0;">
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
            <td colspan="7" class="text-center py-5 text-muted">
              No gallery items found. Click "Add Gallery Item" to create one.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

