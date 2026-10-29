@extends('admin.layouts.app')

@section('title', 'Manage Services')
@section('page-title', 'Services Management')

@section('admin-content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <p class="text-muted mb-0">Control the service packages, descriptions, icons, images, and booking anchors.</p>
  <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> Add New Service
  </a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead>
        <tr>
          <th style="width: 70px;">Order</th>
          <th style="width: 100px;">Thumb</th>
          <th>Service Title</th>
          <th>Tag / Badge</th>
          <th>Icon</th>
          <th>Status</th>
          <th class="actions-col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($services as $service)
          <tr>
            <td>
              <span class="badge bg-light text-dark border">#{{ $service->order }}</span>
            </td>
            <td>
              <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="rounded border" style="width: 80px; height: 55px; object-fit: cover;">
            </td>
            <td>
              <div class="fw-bold text-dark">{{ $service->title }}</div>
              <small class="text-muted text-truncate d-inline-block" style="max-width: 320px;">{{ $service->description }}</small>
            </td>
            <td>
              @if($service->tag_text)
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle">
                  @if($service->tag_icon)<i class="bi {{ $service->tag_icon }} me-1"></i>@endif{{ $service->tag_text }}
                </span>
              @else
                <span class="text-muted small">None</span>
              @endif
            </td>
            <td>
              <div class="d-flex align-items-center gap-2">
                <i class="bi {{ $service->icon }} fs-5 text-primary"></i>
                <small class="text-muted"><code>{{ $service->icon }}</code></small>
              </div>
            </td>
            <td>
              @if($service->is_active)
                <span class="badge bg-success">Active</span>
              @else
                <span class="badge bg-secondary">Inactive</span>
              @endif
            </td>
            <td class="actions-col">
              <div class="table-actions">
                <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-outline-primary" title="Edit">
                  <i class="bi bi-pencil"></i>
                </a>
                <form method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Delete this service?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-outline-danger" title="Delete">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center py-5 text-muted">
              No services found. Click "Add New Service" to create one.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

