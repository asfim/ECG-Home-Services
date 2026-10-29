<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - CardioHome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }
    .login-card {
      background: #ffffff;
      border-radius: 16px;
      padding: 2.5rem;
      width: 100%;
      max-width: 440px;
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 8px 10px -6px rgba(0, 0, 0, 0.3);
    }
    .brand-icon {
      width: 56px;
      height: 56px;
      border-radius: 12px;
      background: #e0f2fe;
      color: #0284c7;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      margin: 0 auto 1.25rem;
    }
  </style>
</head>
<body>

<div class="login-card">
  <div class="text-center mb-4">
    <div class="brand-icon">
      <i class="bi bi-heart-pulse-fill text-danger"></i>
    </div>
    <h3 class="fw-bold text-dark" style="font-family: 'Outfit', sans-serif;">CardioHome Admin</h3>
    <p class="text-muted small">Sign in to manage your medical website</p>
  </div>

  @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show small mb-3" role="alert">
      {{ $errors->first() }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show small mb-3" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label small fw-semibold text-secondary">Email Address</label>
      <div class="input-group">
        <span class="input-group-text bg-light text-muted"><i class="bi bi-envelope"></i></span>
        <input type="email" name="email" class="form-control" placeholder="admin@cardiohome.com.bd" value="{{ old('email', 'admin@cardiohome.com.bd') }}" required autofocus>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label small fw-semibold text-secondary">Password</label>
      <div class="input-group">
        <span class="input-group-text bg-light text-muted"><i class="bi bi-lock"></i></span>
        <input type="password" name="password" class="form-control" placeholder="••••••••" value="admin123" required>
      </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
        <label class="form-check-label small text-secondary" for="remember">Remember me</label>
      </div>
      <a href="{{ route('home') }}" class="small text-decoration-none text-primary"><i class="bi bi-arrow-left"></i> Front Site</a>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold" style="background: #0284c7; border-color: #0284c7;">
      <i class="bi bi-box-arrow-in-right me-1"></i> Sign In to Dashboard
    </button>

    <div class="mt-4 p-3 rounded-3 bg-light border text-center small text-muted">
      <strong>Default Admin Credentials:</strong><br>
      Email: <code>admin@cardiohome.com.bd</code><br>
      Password: <code>admin123</code>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

