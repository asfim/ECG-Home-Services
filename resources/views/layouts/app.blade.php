<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- ===== Primary SEO ===== -->
  <title>{{ $settings['site_title'] ?? 'ECG Home Service in Mohammadpur, Dhaka | 24/7 Home ECG Test' }}</title>
  <meta name="description" content="{{ $settings['meta_description'] ?? 'ECG home service in Mohammadpur, Dhaka. Book a 12-lead ECG test at home from ৳800' }}">
  <meta name="keywords" content="{{ $settings['meta_keywords'] ?? 'ECG home service, ECG home service Dhaka, home ECG test' }}">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <meta name="author" content="{{ $settings['author'] ?? 'CardioHome' }}">
  <link rel="canonical" href="{{ $settings['canonical_url'] ?? url('/') }}">
  <meta name="theme-color" content="#ffffff">
  <link rel="icon" type="image/png" href="{{ asset($settings['favicon'] ?? 'images/logo.png') }}">
  <link rel="apple-touch-icon" href="{{ asset($settings['favicon'] ?? 'images/logo.png') }}">

  <!-- Local SEO -->
  <meta name="geo.region" content="{{ $settings['geo_region'] ?? 'BD-13' }}">
  <meta name="geo.placename" content="{{ $settings['geo_placename'] ?? 'Mohammadpur, Dhaka' }}">
  <meta name="geo.position" content="{{ $settings['geo_position'] ?? '23.7662;90.3589' }}">
  <meta name="ICBM" content="{{ str_replace(';', ', ', $settings['geo_position'] ?? '23.7662, 90.3589') }}">

  <!-- Open Graph / Social -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{{ $settings['site_name'] ?? 'CardioHome' }}">
  <meta property="og:title" content="{{ $settings['site_title'] ?? 'ECG Home Service in Mohammadpur, Dhaka' }}">
  <meta property="og:description" content="{{ $settings['meta_description'] ?? 'Book an ECG test at home in Mohammadpur & nearby Dhaka areas.' }}">
  <meta property="og:url" content="{{ $settings['canonical_url'] ?? url('/') }}">
  <meta property="og:image" content="{{ asset($settings['logo'] ?? 'images/logo.png') }}">
  <meta property="og:locale" content="en_US">
  <meta property="og:locale:alternate" content="bn_BD">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $settings['site_title'] ?? 'ECG Home Service in Mohammadpur, Dhaka' }}">
  <meta name="twitter:description" content="{{ $settings['meta_description'] ?? '24/7 home ECG test with cardiologist-reviewed report.' }}">
  <meta name="twitter:image" content="{{ asset($settings['logo'] ?? 'images/logo.png') }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <!-- Custom styles -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Structured data: Local medical business -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "MedicalBusiness",
    "@id": "{{ $settings['canonical_url'] ?? url('/') }}#business",
    "name": "{{ $settings['site_name'] ?? 'CardioHome' }} – ECG Home Service",
    "description": "{{ $settings['meta_description'] ?? '' }}",
    "url": "{{ $settings['canonical_url'] ?? url('/') }}",
    "image": "{{ asset($settings['logo'] ?? 'images/logo.png') }}",
    "telephone": "{{ $settings['tel_phone'] ?? '+8801348223547' }}",
    "email": "{{ $settings['email'] ?? 'care@cardiohome.com.bd' }}",
    "priceRange": "৳800 - ৳4,500",
    "currenciesAccepted": "BDT",
    "paymentAccepted": "Cash, bKash, Nagad, Rocket",
    "medicalSpecialty": "Cardiovascular",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "{{ $settings['address'] ?? 'Tajmahal Road, Mohammadpur' }}",
      "addressLocality": "Dhaka",
      "postalCode": "1207",
      "addressCountry": "BD"
    }
  }
  </script>
</head>
<body data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="90">

  <!-- ============ NAVBAR ============ -->
  <nav class="navbar navbar-expand-lg sticky-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#home" id="brandLogo" aria-label="{{ $settings['site_name'] ?? 'CardioHome' }} Home">
        <img src="{{ asset($settings['logo'] ?? 'images/logo.png') }}" alt="{{ $settings['site_name'] ?? 'CardioHome' }} Logo" class="brand-img" height="64">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation" id="navToggler">
        <i class="bi bi-list"></i>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="#home" id="nav-home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#services" id="nav-services">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#gallery" id="nav-gallery">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="#pricing" id="nav-pricing">Pricing</a></li>
          <li class="nav-item"><a class="nav-link" href="#areas" id="nav-areas">Coverage</a></li>
          <li class="nav-item"><a class="nav-link" href="#faq" id="nav-faq">FAQ</a></li>
        </ul>
        <div class="d-flex gap-2 nav-cta align-items-center">
          <a href="tel:{{ $settings['tel_phone'] ?? '+8801348223547' }}" class="btn btn-ghost" id="navCallBtn"><i class="bi bi-telephone-fill"></i> Call</a>
          <a href="#booking" class="btn btn-glow" id="navBookBtn">Book ECG</a>
          @auth
            <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-warning ms-1" title="Admin Panel"><i class="bi bi-speedometer2"></i> Admin</a>
          @endauth
        </div>
      </div>
    </div>
  </nav>

  @yield('content')

  <!-- ============ FOOTER ============ -->
  <footer class="footer">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <a class="navbar-brand d-flex align-items-center mb-3" href="#home" aria-label="{{ $settings['site_name'] ?? 'CardioHome' }} Home">
            <img src="{{ asset($settings['logo'] ?? 'images/logo.png') }}" alt="{{ $settings['site_name'] ?? 'CardioHome' }} Logo" class="brand-img footer-logo" height="68">
          </a>
          <p>{{ $settings['footer_desc'] ?? '24/7 ECG home service in Mohammadpur, Dhaka — hospital-grade home ECG tests, Holter monitoring and cardiologist-reviewed reports at your doorstep.' }}</p>
          <div class="socials">
            @if(!empty($settings['facebook_url']))
              <a href="{{ $settings['facebook_url'] }}" aria-label="Facebook" id="fbLink" target="_blank" rel="noopener"><i class="bi bi-facebook"></i></a>
            @endif
            @if(!empty($settings['youtube_url']))
              <a href="{{ $settings['youtube_url'] }}" aria-label="YouTube" id="ytLink" target="_blank" rel="noopener"><i class="bi bi-youtube"></i></a>
            @endif
            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '8801348223547' }}" aria-label="WhatsApp" id="waLink" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>
        <div class="col-6 col-lg-2">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#services">Services</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="#faq">FAQ</a></li>
          </ul>
        </div>
        <div class="col-6 col-lg-3">
          <h4>Services</h4>
          <ul>
            @if(isset($services) && count($services) > 0)
              @foreach($services->take(5) as $srv)
                <li><a href="#services">{{ $srv->title }}</a></li>
              @endforeach
            @else
              <li><a href="#services">12-Lead ECG at Home</a></li>
              <li><a href="#gallery">Digital Portable X-Ray</a></li>
              <li><a href="#gallery">OT C-Arm (FPD) Service</a></li>
              <li><a href="#services">Holter Monitoring at Home</a></li>
            @endif
          </ul>
        </div>
        <div class="col-lg-3">
          <h4>Contact</h4>
          <ul class="footer-contact">
            <li><i class="bi bi-geo-alt"></i> {{ $settings['address'] ?? 'Tajmahal Road, Mohammadpur, Dhaka-1207' }}</li>
            <li><i class="bi bi-telephone"></i> <a href="tel:{{ $settings['tel_phone'] ?? '+8801348223547' }}">{{ $settings['hotline_phone'] ?? '01348-223547' }}</a></li>
            <li><i class="bi bi-envelope"></i> <a href="mailto:{{ $settings['email'] ?? 'care@cardiohome.com.bd' }}">{{ $settings['email'] ?? 'care@cardiohome.com.bd' }}</a></li>
            <li><i class="bi bi-clock"></i> {{ $settings['working_hours'] ?? 'Open 24 hours, 7 days' }}</li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <span>© <span id="year">{{ date('Y') }}</span> {{ $settings['copyright'] ?? 'CardioHome. All rights reserved.' }}</span>
        <span>Made with <i class="bi bi-heart-fill"></i> in Dhaka</span>
      </div>
    </div>
  </footer>

  <!-- Floating action buttons -->
  <div class="fab-group">
    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '8801348223547' }}" class="fab fab-wa" target="_blank" rel="noopener" aria-label="Chat on WhatsApp" id="fabWhatsapp"><i class="bi bi-whatsapp"></i></a>
    <a href="tel:{{ $settings['tel_phone'] ?? '+8801348223547' }}" class="fab fab-call" aria-label="Call now" id="fabCall"><i class="bi bi-telephone-fill"></i></a>
  </div>
  <button class="back-top" id="backTop" aria-label="Back to top"><i class="bi bi-arrow-up"></i></button>

  <!-- Success Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content success-modal text-center p-4">
        <div class="success-check mb-3 mx-auto"><i class="bi bi-check-lg text-success fs-1"></i></div>
        <h3 id="successTitle" class="fw-bold mb-2">Booking Received!</h3>
        <p id="successText" class="text-muted mb-4">Our team will call you within 5 minutes to confirm your appointment.</p>
        <button type="button" class="btn btn-glow w-100" data-bs-dismiss="modal" id="successCloseBtn">Got it</button>
      </div>
    </div>
  </div>

  <!-- Image Preview Lightbox Modal -->
  <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content bg-transparent border-0 shadow-none">
        <div class="modal-header border-0 pb-2 text-white d-flex justify-content-between align-items-center">
          <h5 class="modal-title fs-5 fw-bold" id="imagePreviewTitle">বাস্তব কার্যক্রমের ছবি</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center p-0">
          <img id="modalPreviewImg" src="" alt="বাস্তব সেবার ছবি প্রিভিউ" class="img-fluid rounded-4 shadow-lg" style="max-height: 82vh; max-width: 100%; object-fit: contain; background: #000;">
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  @stack('scripts')
</body>
</html>
