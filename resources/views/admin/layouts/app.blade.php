<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Admin Dashboard') - CardioHome</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root {
      --sidebar-width: 260px;
      --primary: #0284c7;
      --primary-dark: #0369a1;
      --bg-dark: #0f172a;
      --bg-sidebar: #1e293b;
      --text-muted: #94a3b8;
      --border-color: #334155;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f8fafc;
      color: #1e293b;
      overflow-x: hidden;
    }

    /* Sidebar */
    .admin-sidebar {
      width: var(--sidebar-width);
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      background: var(--bg-sidebar);
      color: #f1f5f9;
      z-index: 1040;
      overflow-y: auto;
      transition: transform 0.25s ease-in-out;
    }

    .admin-sidebar .brand {
      padding: 1.25rem 1.5rem;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      gap: 0.75rem;
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 1.15rem;
      color: #fff;
      text-decoration: none;
    }

    .nav-label {
      padding: 0.75rem 1.5rem 0.35rem;
      font-size: 0.72rem;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--text-muted);
      font-weight: 700;
    }

    .sidebar-menu {
      list-style: none;
      padding: 0.5rem 0.75rem;
      margin: 0;
    }

    .sidebar-menu .nav-link {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.65rem 1rem;
      color: #cbd5e1;
      font-weight: 500;
      font-size: 0.92rem;
      border-radius: 8px;
      transition: all 0.18s;
      margin-bottom: 0.2rem;
    }

    .sidebar-menu .nav-link i {
      font-size: 1.15rem;
      width: 22px;
      text-align: center;
      color: #94a3b8;
    }

    .sidebar-menu .nav-link:hover {
      background: rgba(255, 255, 255, 0.08);
      color: #ffffff;
    }

    .sidebar-menu .nav-link:hover i {
      color: #38bdf8;
    }

    .sidebar-menu .nav-link.active {
      background: #0284c7;
      color: #ffffff;
    }

    .sidebar-menu .nav-link.active i {
      color: #ffffff;
    }

    /* Main Content */
    .admin-main {
      margin-left: var(--sidebar-width);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      transition: margin-left 0.25s ease-in-out;
    }

    /* Topbar */
    .admin-topbar {
      height: 68px;
      background: #ffffff;
      border-bottom: 1px solid #e2e8f0;
      padding: 0 1.75rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 1020;
    }

    .admin-content {
      padding: 1.75rem;
      flex: 1;
    }

    .card {
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
    }

    .card-header {
      background: #ffffff;
      border-bottom: 1px solid #e2e8f0;
      font-weight: 600;
      padding: 1rem 1.25rem;
      border-top-left-radius: 12px !important;
      border-top-right-radius: 12px !important;
    }

    .stat-card {
      padding: 1.25rem;
      border-radius: 12px;
      background: #fff;
      border: 1px solid #e2e8f0;
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .stat-icon {
      width: 52px;
      height: 52px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
    }

    .table th {
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: #64748b;
      background: #f8fafc;
      border-bottom: 1px solid #e2e8f0;
      padding: 0.75rem 1rem;
    }

    .table td {
      padding: 0.85rem 1rem;
      vertical-align: middle;
      border-bottom: 1px solid #f1f5f9;
    }

    /* Locked Action Buttons */
    .actions-col {
      width: 120px !important;
      min-width: 120px !important;
      text-align: right !important;
      white-space: nowrap !important;
    }

    .table-actions {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: flex-end !important;
      gap: 8px !important;
      white-space: nowrap !important;
      margin: 0 !important;
      padding: 0 !important;
    }

    .table-actions form {
      display: inline-flex !important;
      margin: 0 !important;
      padding: 0 !important;
    }

    .table-actions .btn {
      width: 34px !important;
      height: 34px !important;
      padding: 0 !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      border-radius: 8px !important;
      flex-shrink: 0 !important;
    }

    @media (max-width: 991.98px) {
      .admin-sidebar {
        transform: translateX(-100%);
      }
      .admin-sidebar.show {
        transform: translateX(0);
      }
      .admin-main {
        margin-left: 0;
      }
    }
  </style>
  @stack('styles')
</head>
<body>

  <!-- Sidebar -->
  <aside class="admin-sidebar" id="adminSidebar">
    <a href="{{ route('admin.dashboard') }}" class="brand">
      <i class="bi bi-heart-pulse-fill text-danger fs-4"></i>
      <span>CardioHome Admin</span>
    </a>

    <div class="nav-label">Main</div>
    <ul class="sidebar-menu">
      <li>
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <i class="bi bi-grid-1x2-fill"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.bookings.index') }}" class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
          <i class="bi bi-calendar-check-fill"></i>
          <span>Bookings</span>
          @php
            $pendingCount = \App\Models\Booking::where('status', 'pending')->count();
          @endphp
          @if($pendingCount > 0)
            <span class="badge bg-danger rounded-pill ms-auto">{{ $pendingCount }}</span>
          @endif
        </a>
      </li>
    </ul>

    <div class="nav-label">Content Management</div>
    <ul class="sidebar-menu">
      <li>
        <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
          <i class="bi bi-images"></i>
          <span>Hero Sliders</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
          <i class="bi bi-heart-pulse"></i>
          <span>Services</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.galleries.index') }}" class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
          <i class="bi bi-camera-reels-fill"></i>
          <span>Work Gallery</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.about.edit') }}" class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
          <i class="bi bi-person-lines-fill"></i>
          <span>About / Why Us</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.pricing.index') }}" class="nav-link {{ request()->routeIs('admin.pricing.*') ? 'active' : '' }}">
          <i class="bi bi-tag-fill"></i>
          <span>Pricing Plans</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.areas.index') }}" class="nav-link {{ request()->routeIs('admin.areas.*') ? 'active' : '' }}">
          <i class="bi bi-geo-alt-fill"></i>
          <span>Coverage Areas</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
          <i class="bi bi-chat-quote-fill"></i>
          <span>Testimonials</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
          <i class="bi bi-question-circle-fill"></i>
          <span>FAQs</span>
        </a>
      </li>
    </ul>

    <div class="nav-label">Settings & Profile</div>
    <ul class="sidebar-menu mb-4">
      <li>
        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
          <i class="bi bi-sliders"></i>
          <span>Site Settings & SEO</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.profile.edit') }}" class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
          <i class="bi bi-person-circle"></i>
          <span>Admin Profile</span>
        </a>
      </li>
      <li>
        <a href="{{ route('home') }}" target="_blank" class="nav-link text-warning">
          <i class="bi bi-box-arrow-up-right text-warning"></i>
          <span>View Website</span>
        </a>
      </li>
      <li>
        <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
          @csrf
          <button type="submit" class="nav-link text-danger border-0 bg-transparent w-100 text-start">
            <i class="bi bi-box-arrow-right text-danger"></i>
            <span>Log Out</span>
          </button>
        </form>
      </li>
    </ul>
  </aside>

  <!-- Main Container -->
  <div class="admin-main">
    <!-- Topbar -->
    <header class="admin-topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="btn btn-outline-secondary btn-sm d-lg-none" type="button" id="sidebarToggle" aria-label="Toggle Sidebar">
          <i class="bi bi-list fs-5"></i>
        </button>
        <h4 class="mb-0 fw-bold fs-5 text-dark">@yield('page-title', 'Dashboard')</h4>
      </div>

      <div class="d-flex align-items-center gap-3">
        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary btn-sm d-none d-sm-inline-flex align-items-center gap-1">
          <i class="bi bi-eye"></i> View Site
        </a>
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle d-flex align-items-center gap-2 border" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle fs-5 text-primary"></i>
            <span class="d-none d-md-inline fw-semibold">{{ Auth::user()->name ?? 'Admin' }}</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow border-0">
            <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}"><i class="bi bi-person me-2"></i> Profile & Password</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.settings.index') }}"><i class="bi bi-gear me-2"></i> Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i> Log Out</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <div class="admin-content">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
          <i class="bi bi-check-circle-fill fs-5"></i>
          <div>{{ session('success') }}</div>
          <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
          <i class="bi bi-exclamation-triangle-fill fs-5"></i>
          <div>{{ session('error') }}</div>
          <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
          <h6 class="fw-bold mb-2"><i class="bi bi-x-circle-fill me-1"></i> Please fix the following errors:</h6>
          <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @yield('admin-content')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('sidebarToggle')?.addEventListener('click', () => {
      document.getElementById('adminSidebar')?.classList.toggle('show');
    });
  </script>
  @stack('scripts')
</body>
</html>

