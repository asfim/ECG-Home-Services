@extends('admin.layouts.app')

@section('title', 'Manage Pricing Plans')
@section('page-title', 'Pricing Packages')

@section('admin-content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <p class="text-muted mb-0">Control the pricing tier cards, package features, prices, and highlighted ribbons.</p>
  <a href="{{ route('admin.pricing.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> Add Pricing Plan
  </a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead>
        <tr>
          <th style="width: 70px;">Order</th>
          <th>Plan Name</th>
          <th>Price</th>
          <th>Featured / Ribbon</th>
          <th>Included Features</th>
          <th>Status</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($plans as $plan)
          <tr>
            <td>
              <span class="badge bg-light text-dark border">#{{ $plan->order }}</span>
            </td>
            <td>
              <div class="fw-bold text-dark fs-6">{{ $plan->name }}</div>
              @if($plan->subtitle)
                <small class="text-muted">{{ $plan->subtitle }}</small>
              @endif
            </td>
            <td>
              <span class="fs-5 fw-bold text-primary">{{ $plan->currency }}{{ number_format($plan->price) }}</span>
            </td>
            <td>
              @if($plan->is_featured)
                <span class="badge bg-warning text-dark"><i class="bi bi-star-fill me-1"></i>{{ $plan->ribbon_text ?? 'Featured' }}</span>
              @else
                <span class="text-muted small">Standard</span>
              @endif
            </td>
            <td>
              @if(!empty($plan->features) && is_array($plan->features))
                <small class="text-muted">{{ count($plan->features) }} items listed</small>
              @endif
            </td>
            <td>
              @if($plan->is_active)
                <span class="badge bg-success">Active</span>
              @else
                <span class="badge bg-secondary">Inactive</span>
              @endif
            </td>
            <td class="text-end">
              <a href="{{ route('admin.pricing.edit', $plan) }}" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                <i class="bi bi-pencil"></i>
              </a>
              <form method="POST" action="{{ route('admin.pricing.destroy', $plan) }}" class="d-inline" onsubmit="return confirm('Delete this pricing plan?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center py-5 text-muted">
              No pricing plans found. Click "Add Pricing Plan" to create one.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
