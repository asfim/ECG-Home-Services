@extends('admin.layouts.app')

@section('title', 'Admin Profile')
@section('page-title', 'My Profile & Security')

@section('admin-content')
<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header fw-bold">
        <i class="bi bi-person-gear me-1 text-primary"></i>Update Account Credentials
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.profile.update') }}">
          @csrf
          @method('PUT')
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Admin Name <span class="text-danger">*</span></label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
              <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="col-12"><hr class="my-2"></div>
            <h6 class="fw-bold text-dark"><i class="bi bi-shield-lock-fill me-1 text-warning"></i>Change Password (Leave blank to keep current)</h6>

            <div class="col-12">
              <label class="form-label fw-semibold">Current Password</label>
              <input type="password" name="current_password" class="form-control" placeholder="Required only if changing password">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">New Password</label>
              <input type="password" name="password" class="form-control" placeholder="Minimum 8 characters">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Confirm New Password</label>
              <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type new password">
            </div>

            <div class="col-12 mt-4">
              <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update Profile & Password</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
