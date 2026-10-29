@extends('admin.layouts.app')

@section('title', 'Manage FAQs')
@section('page-title', 'Frequently Asked Questions')

@section('admin-content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <p class="text-muted mb-0">Manage questions and answers displayed in the accordion on the homepage.</p>
  <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> Add New FAQ
  </a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead>
        <tr>
          <th style="width: 70px;">Order</th>
          <th>Question</th>
          <th>Answer Summary</th>
          <th>Status</th>
          <th class="text-end" style="width: 120px; white-space: nowrap;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($faqs as $faq)
          <tr>
            <td>
              <span class="badge bg-light text-dark border">#{{ $faq->order }}</span>
            </td>
            <td>
              <div class="fw-bold text-dark fs-6">{{ $faq->question }}</div>
            </td>
            <td>
              <small class="text-muted text-truncate d-inline-block" style="max-width: 420px;">{{ $faq->answer }}</small>
            </td>
            <td>
              @if($faq->is_active)
                <span class="badge bg-success">Active</span>
              @else
                <span class="badge bg-secondary">Inactive</span>
              @endif
            </td>
            <td class="text-end text-nowrap">
              <div class="d-inline-flex align-items-center justify-content-end gap-2">
                <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                  <i class="bi bi-pencil"></i>
                </a>
                <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" class="d-inline mb-0" onsubmit="return confirm('Delete this FAQ?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center py-5 text-muted">
              No FAQs found. Click "Add New FAQ" to create one.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

