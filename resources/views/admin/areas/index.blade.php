@extends('admin.layouts.app')

@section('title', 'Manage Coverage Areas')
@section('page-title', 'Dhaka Coverage Areas')

@section('admin-content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <p class="text-muted mb-0">Manage areas in Dhaka where technicians provide home service (also populates the booking area select).</p>
  <a href="{{ route('admin.areas.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> Add Coverage Area
  </a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead>
        <tr>
          <th style="width: 70px;">Order</th>
          <th>Area Name</th>
          <th>Primary / Base</th>
          <th>Icon</th>
          <th>Status</th>
          <th class="actions-col" style="width: 130px; min-width: 130px; text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($areas as $area)
          <tr>
            <td>
              <span class="badge bg-light text-dark border">#{{ $area->order }}</span>
            </td>
            <td>
              <div class="fw-bold text-dark fs-6">
                <i class="bi {{ $area->icon ?? 'bi-geo-alt' }} text-danger me-1"></i> {{ $area->name }}
              </div>
            </td>
            <td>
              @if($area->is_primary)
                <span class="badge bg-primary"><i class="bi bi-star-fill me-1"></i>Base Office</span>
              @else
                <span class="text-muted small">Standard Coverage</span>
              @endif
            </td>
            <td><code>{{ $area->icon ?? 'bi-geo-alt' }}</code></td>
            <td>
              @if($area->is_active)
                <span class="badge bg-success">Active</span>
              @else
                <span class="badge bg-secondary">Inactive</span>
              @endif
            </td>
            <td class="actions-col" style="white-space: nowrap; width: 130px; min-width: 130px; text-align: right;">
              <div class="table-actions" style="display: inline-flex; flex-direction: row; flex-wrap: nowrap; align-items: center; justify-content: flex-end; gap: 8px;">
                <a href="{{ route('admin.areas.edit', $area) }}" class="btn btn-outline-primary" title="Edit" style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;">
                  <i class="bi bi-pencil"></i>
                </a>
                <form method="POST" action="{{ route('admin.areas.destroy', $area) }}" onsubmit="return confirm('Delete this area?');" style="display: inline-flex; margin: 0; padding: 0;">
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
              No coverage areas found.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

