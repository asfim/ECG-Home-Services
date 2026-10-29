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
          <th class="actions-col">Actions</th>
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
            <td class="actions-col">
              <div class="table-actions">
                <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-outline-primary" title="Edit">
                  <i class="bi bi-pencil"></i>
                </a>
                <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" onsubmit="return confirm('Delete this FAQ?');">
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

