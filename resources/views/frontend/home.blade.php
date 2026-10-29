@extends('layouts.app')

@section('content')
<main>
  <!-- ============ FULL WIDTH HERO SLIDER ============ -->
  <header class="hero-fullwidth" id="home">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4500" data-bs-pause="hover">
      <!-- Indicators -->
      <div class="carousel-indicators custom-indicators">
        @foreach($sliders as $index => $slider)
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
      </div>

      <div class="carousel-inner">
        @foreach($sliders as $slider)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <div class="slider-bg" style="background-image: url('{{ $slider->image_url }}');"></div>
            <div class="slider-overlay"></div>
            <div class="container position-relative slider-content-wrap">
              <div class="row align-items-center min-vh-hero">
                <div class="col-lg-7 col-xl-6">
                  @if($slider->badge_text)
                    <div class="pill">
                      <span class="live-dot"></span> 
                      @if($slider->badge_icon) <i class="bi {{ $slider->badge_icon }}"></i> @endif 
                      {{ $slider->badge_text }}
                    </div>
                  @endif

                  <h1 class="hero-title">
                    {{ $slider->title }}
                    @if($slider->title_highlight)
                      <span class="text-yellow">{{ $slider->title_highlight }}</span>
                    @endif
                    @if($slider->subtitle)
                      <span class="d-block mt-2">{{ $slider->subtitle }}</span>
                    @endif
                  </h1>

                  <div class="d-flex flex-wrap gap-3 mt-4">
                    @if($slider->btn1_text)
                      <a href="{{ $slider->btn1_link ?? '#booking' }}" class="btn btn-glow btn-lg">
                        @if($slider->btn1_icon)<i class="bi {{ $slider->btn1_icon }}"></i>@endif {{ $slider->btn1_text }}
                      </a>
                    @endif
                    @if($slider->btn2_text)
                      <a href="{{ $slider->btn2_link ?? 'tel:' . ($settings['tel_phone'] ?? '+8801348223547') }}" class="btn btn-outline-light-soft btn-lg">
                        @if($slider->btn2_icon)<i class="bi {{ $slider->btn2_icon }}"></i>@endif {{ $slider->btn2_text }}
                      </a>
                    @endif
                  </div>
                </div>

                <div class="col-lg-5 col-xl-6 d-none d-lg-block">
                  <div class="slider-float-wrap">
                    @if($slider->float_card_1_title)
                      <div class="float-card static-float d-flex align-items-center gap-3">
                        <span class="icon-circle icon-circle-rose">
                          <i class="bi {{ $slider->float_card_1_icon ?? 'bi-activity' }}"></i>
                        </span>
                        <div>
                          <strong style="display:block; font-size: 1.15rem; color: #ffffff;">{{ $slider->float_card_1_title }}</strong>
                          <small style="color: var(--teal-400); font-weight: 600;">{{ $slider->float_card_1_subtitle }}</small>
                        </div>
                      </div>
                    @endif

                    @if($slider->float_card_2_title)
                      <div class="float-card static-float d-flex align-items-center gap-3">
                        <span class="icon-circle">
                          <i class="bi {{ $slider->float_card_2_icon ?? 'bi-printer-fill' }}"></i>
                        </span>
                        <div>
                          <strong style="display:block; font-size: 1.05rem; color: #ffffff;">{{ $slider->float_card_2_title }}</strong>
                          <small style="color: rgba(255,255,255,0.75);">{{ $slider->float_card_2_subtitle }}</small>
                        </div>
                        <i class="bi bi-check-circle-fill text-success ms-auto"></i>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Controls -->
      <button class="carousel-control-prev fullwidth-control" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Previous">
        <span class="fullwidth-arrow"><i class="bi bi-chevron-left"></i></span>
      </button>
      <button class="carousel-control-next fullwidth-control" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Next">
        <span class="fullwidth-arrow"><i class="bi bi-chevron-right"></i></span>
      </button>
    </div>
  </header>

  <!-- ============ SERVICES ============ -->
  <section class="section section-alt" id="services">
    <div class="container">
      <div class="section-head text-center reveal">
        <span class="eyebrow">Our Services</span>
        <h2><span class="text-yellow">ECG Home Service</span> Packages in Dhaka</h2>
        <p>Every ECG home service package is carried out by trained technicians using hospital-grade machines.</p>
      </div>
      <div class="row g-4">
        @foreach($services as $index => $service)
          <div class="col-md-6 col-lg-4 reveal">
            <article class="service-card service-card-{{ $index + 1 }}">
              <div class="service-thumb">
                <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="img-fluid" loading="lazy">
                @if($service->tag_text)
                  <span class="service-tag {{ $service->tag_class ?? 'tag-standard' }}">
                    @if($service->tag_icon)<i class="bi {{ $service->tag_icon }}"></i>@endif {{ $service->tag_text }}
                  </span>
                @endif
              </div>
              <div class="service-body">
                <div class="service-header-row">
                  <div class="service-icon {{ $service->icon_class }}"><i class="bi {{ $service->icon }}"></i></div>
                  <h3>{{ $service->title }}</h3>
                </div>
                <p>{{ $service->description }}</p>
                <a href="{{ $service->action_link ?? '#booking' }}" class="service-link" data-service="{{ $service->booking_service_name ?? $service->title }}">
                  {{ $service->action_text ?? 'Book now' }} <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </article>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ============ REAL SERVICE & WORK GALLERY ============ -->
  <section class="section gallery-section" id="gallery">
    <div class="container">
      <div class="section-head text-center reveal">
        <span class="eyebrow"><i class="bi bi-camera-fill me-1"></i> আমাদের সেবা ও বাস্তব কার্যক্রম</span>
        <h2>আধুনিক যন্ত্রপাতি, <span class="text-yellow">বাস্তব কার্যক্রম ও রিপোর্ট</span> গ্যালারি</h2>
        <p>পোর্টেবল ১২-লিড ইসিজি, ডিজিটাল এক্স-রে, ওটি সি-আর্ম এবং কার্ডিওলজিস্টের ভেরিফাইড রিপোর্ট — সরাসরি বাস্তব চিত্র।</p>
      </div>

      <div class="row g-4 justify-content-center">
        @foreach($galleries as $gallery)
          <div class="col-lg-4 col-md-6 reveal">
            <div class="gallery-card h-100">
              <div class="gallery-thumb contain-thumb" data-bs-toggle="modal" data-bs-target="#imagePreviewModal" data-img-src="{{ $gallery->image_url }}" data-img-title="{{ $gallery->title }} {{ $gallery->designation ? '— ' . $gallery->designation : '' }}">
                <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="img-fluid" loading="lazy">
                <div class="gallery-thumb-overlay">
                  <span class="preview-icon"><i class="bi bi-zoom-in"></i> বড় করে দেখুন</span>
                </div>
                @if($gallery->badge_text)
                  <span class="gallery-badge {{ $gallery->badge_class ?? 'badge-contact' }}">
                    @if($gallery->badge_icon)<i class="bi {{ $gallery->badge_icon }}"></i>@endif {{ $gallery->badge_text }}
                  </span>
                @endif
              </div>
              <div class="gallery-body">
                @if(!empty($gallery->tags) && is_array($gallery->tags))
                  <div class="gallery-meta">
                    @foreach($gallery->tags as $t)
                      <span class="{{ $t['class'] ?? 'tech-tag' }}">
                        @if(!empty($t['icon']))<i class="bi {{ $t['icon'] }}"></i>@endif {{ $t['text'] ?? '' }}
                      </span>
                    @endforeach
                  </div>
                @endif

                <h3 class="gallery-title">
                  {{ $gallery->title }}
                  @if($gallery->designation)
                    <span class="d-block text-muted fs-6 fw-normal mt-1">{{ $gallery->designation }}</span>
                  @endif
                </h3>

                @if($gallery->description)
                  <p class="gallery-desc">{{ $gallery->description }}</p>
                @endif

                @if(!empty($gallery->features) && is_array($gallery->features))
                  <ul class="gallery-features list-unstyled">
                    @foreach($gallery->features as $feat)
                      <li><i class="bi bi-check-circle-fill text-success"></i> {{ $feat }}</li>
                    @endforeach
                  </ul>
                @endif

                <div class="gallery-actions pt-2 mt-auto">
                  @if($gallery->btn1_text)
                    <a href="{{ $gallery->btn1_link ?? '#booking' }}" class="btn {{ $gallery->btn1_class ?? 'btn-glow' }} btn-sm w-100 mb-2" @if($gallery->booking_service) data-service="{{ $gallery->booking_service }}" @endif>
                      @if($gallery->btn1_icon)<i class="bi {{ $gallery->btn1_icon }} me-1"></i>@endif {{ $gallery->btn1_text }}
                    </a>
                  @endif
                  @if($gallery->btn2_text)
                    <a href="{{ $gallery->btn2_link ?? '#' }}" target="_blank" rel="noopener" class="btn {{ $gallery->btn2_class ?? 'btn-outline-success' }} btn-sm w-100">
                      @if($gallery->btn2_icon)<i class="bi {{ $gallery->btn2_icon }} me-1"></i>@endif {{ $gallery->btn2_text }}
                    </a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Banner note below gallery -->
      @if(!empty($settings['gallery_callout_text']))
        <div class="gallery-callout text-center reveal">
          <div class="gallery-callout-box">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-info-circle-fill text-teal-600 fs-5"></i>
              <span class="text-dark fw-semibold">{{ $settings['gallery_callout_text'] }}</span>
            </div>
            <a href="tel:{{ $settings['gallery_callout_tel'] ?? $settings['tel_phone'] ?? '+8801348223547' }}" class="btn btn-glow btn-sm">
              <i class="bi bi-telephone-fill me-1"></i> {{ $settings['gallery_callout_name'] ?? '01348-223547' }}
            </a>
          </div>
        </div>
      @endif
    </div>
  </section>

  <!-- ============ WHY US / ABOUT ============ -->
  @if($about)
    <section class="section" id="about">
      <div class="container">
        <div class="row align-items-center g-5">
          <div class="col-lg-6 reveal">
            <div class="about-visual">
              <img src="{{ $about->image_url }}" alt="{{ $about->title }}" class="img-fluid" width="1200" height="896" loading="lazy">
              <div class="exp-badge">
                <strong>{{ $about->experience_years }}</strong>
                <span>{!! nl2br(e($about->experience_text)) !!}</span>
              </div>
            </div>
          </div>
          <div class="col-lg-6 reveal">
            <span class="eyebrow">{{ $about->eyebrow }}</span>
            <h2 class="mb-3">{{ $about->title }} <span class="text-yellow">{{ $about->title_highlight }}</span></h2>
            @if($about->lead_text)
              <p class="lead-muted">{{ $about->lead_text }}</p>
            @endif

            @if(!empty($about->features) && is_array($about->features))
              <ul class="check-list">
                @foreach($about->features as $feat)
                  <li><i class="bi bi-check2-circle"></i> {{ $feat }}</li>
                @endforeach
              </ul>
            @endif

            <div class="row g-3 mt-2">
              <div class="col-4">
                <div class="mini-stat">
                  <strong data-count="{{ $about->stat1_count }}" data-suffix="{{ $about->stat1_suffix ?? '' }}">0</strong>
                  <span>{{ $about->stat1_label }}</span>
                </div>
              </div>
              <div class="col-4">
                <div class="mini-stat">
                  <strong data-count="{{ $about->stat2_count }}" data-suffix="{{ $about->stat2_suffix ?? '' }}">0</strong>
                  <span>{{ $about->stat2_label }}</span>
                </div>
              </div>
              <div class="col-4">
                <div class="mini-stat">
                  <strong data-count="{{ $about->stat3_count }}" data-suffix="{{ $about->stat3_suffix ?? '' }}">0</strong>
                  <span>{{ $about->stat3_label }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- ============ PRICING ============ -->
  <section class="section section-dark" id="pricing">
    <div class="container position-relative">
      <div class="section-head text-center reveal">
        <span class="eyebrow">Transparent Pricing</span>
        <h2><span class="text-yellow">ECG Home Service</span> Price in Dhaka</h2>
        <p>No hidden charges — the home visit fee is included. Pay only after your ECG test at home is done.</p>
      </div>
      <div class="row g-4 justify-content-center align-items-stretch">
        @foreach($pricingPlans as $plan)
          <div class="col-md-6 col-lg-4 reveal">
            <div class="price-card {{ $plan->is_featured ? 'featured' : '' }}">
              @if($plan->is_featured && $plan->ribbon_text)
                <span class="ribbon">{{ $plan->ribbon_text }}</span>
              @endif
              <h3>{{ $plan->name }}</h3>
              @if($plan->subtitle)
                <p class="price-desc">{{ $plan->subtitle }}</p>
              @endif
              <div class="price"><span>{{ $plan->currency }}</span>{{ number_format($plan->price) }}</div>
              
              @if(!empty($plan->features) && is_array($plan->features))
                <ul>
                  @foreach($plan->features as $item)
                    <li class="{{ empty($item['included']) ? 'muted' : '' }}">
                      <i class="bi {{ !empty($item['included']) ? 'bi-check-lg' : 'bi-x-lg' }}"></i> {{ $item['text'] }}
                    </li>
                  @endforeach
                </ul>
              @endif

              <a href="#booking" class="btn {{ $plan->is_featured ? 'btn-glow' : 'btn-outline-light-soft' }} w-100" data-service="{{ $plan->btn_service_name ?? $plan->name }}">
                {{ $plan->btn_text ?? 'Choose Plan' }}
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ============ COVERAGE ============ -->
  <section class="section" id="areas">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-5 reveal">
          <span class="eyebrow">Coverage Area</span>
          <h2 class="mb-3"><span class="text-yellow">ECG Home Service</span> Areas in Dhaka</h2>
          <p class="lead-muted">Our technicians are stationed in Mohammadpur, so our ECG home service reaches Shyamoli, Lalmatia, Dhanmondi, Adabor, Mirpur and nearby areas fast. Not sure if we cover you? Just call us.</p>
          <a href="tel:{{ $settings['tel_phone'] ?? '+8801348223547' }}" class="btn btn-glow mt-2" id="areaCallBtn">
            <i class="bi bi-geo-alt-fill"></i> Check My Area
          </a>
        </div>
        <div class="col-lg-7 reveal">
          <div class="area-grid">
            @foreach($coverageAreas as $area)
              <span class="area-chip {{ $area->is_primary ? 'primary' : '' }}">
                <i class="bi {{ $area->icon ?? 'bi-geo-alt' }}"></i> {{ $area->name }}
              </span>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ BOOKING ============ -->
  <section class="section section-alt" id="booking">
    <div class="container">
      <div class="booking-wrap reveal">
        <div class="row g-0">
          <div class="col-lg-5 booking-side">
            <span class="eyebrow">Book Appointment</span>
            <h2>Book <span class="text-yellow">ECG Home Service</span></h2>
            <p>Fill in your details and our team will call you within 5 minutes to confirm.</p>
            <ul class="contact-list">
              <li>
                <span><i class="bi bi-telephone-fill"></i></span>
                <div>
                  <small>Hotline (24/7)</small>
                  <a href="tel:{{ $settings['tel_phone'] ?? '+8801348223547' }}">{{ $settings['hotline_phone'] ?? '01348-223547' }}</a>
                </div>
              </li>
              <li>
                <span><i class="bi bi-whatsapp"></i></span>
                <div>
                  <small>WhatsApp</small>
                  <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '8801348223547' }}" target="_blank" rel="noopener">{{ $settings['hotline_phone'] ?? '01348-223547' }}</a>
                </div>
              </li>
              <li>
                <span><i class="bi bi-geo-alt-fill"></i></span>
                <div>
                  <small>Base Office</small>
                  {{ $settings['address'] ?? 'Tajmahal Road, Mohammadpur, Dhaka-1207' }}
                </div>
              </li>
            </ul>
            <svg class="booking-ecg" viewBox="0 0 400 60" aria-hidden="true">
              <path d="M0 30 H120 L132 30 L140 8 L150 52 L160 18 L168 30 H260 L272 30 L280 8 L290 52 L300 18 L308 30 H400" />
            </svg>
          </div>
          <div class="col-lg-7 booking-form-col">
            <form id="bookingForm" class="needs-validation" novalidate method="POST" action="{{ route('booking.store') }}">
              @csrf
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="fullName" class="form-label">Patient Name</label>
                  <input type="text" class="form-control" name="patient_name" id="fullName" placeholder="e.g. Abdul Karim" required>
                  <div class="invalid-feedback">Please enter the patient's name.</div>
                </div>
                <div class="col-md-6">
                  <label for="phone" class="form-label">Phone Number</label>
                  <input type="tel" class="form-control" name="phone" id="phone" placeholder="01XXXXXXXXX" pattern="^(\+?88)?01[3-9]\d{8}$" required>
                  <div class="invalid-feedback">Enter a valid Bangladeshi mobile number.</div>
                </div>
                <div class="col-md-6">
                  <label for="service" class="form-label">Service</label>
                  <select class="form-select" name="service" id="service" required>
                    <option value="" selected disabled>Select a service</option>
                    @foreach($services as $srv)
                      <option value="{{ $srv->booking_service_name ?? $srv->title }}">{{ $srv->title }}</option>
                    @endforeach
                    <option value="Digital Portable X-Ray">Digital Portable X-Ray</option>
                    <option value="Portable C-Arm (OT Support)">Portable C-Arm (OT Support)</option>
                  </select>
                  <div class="invalid-feedback">Please choose a service.</div>
                </div>
                <div class="col-md-6">
                  <label for="area" class="form-label">Area</label>
                  <select class="form-select" name="area" id="area" required>
                    <option value="" selected disabled>Select your area</option>
                    @foreach($coverageAreas as $ca)
                      <option value="{{ $ca->name }}">{{ $ca->name }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">Please select your area.</div>
                </div>
                <div class="col-12">
                  <label for="address" class="form-label">Full Address</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="House, Road, Block" required>
                  <div class="invalid-feedback">Please enter your address.</div>
                </div>
                <div class="col-md-6">
                  <label for="date" class="form-label">Preferred Date</label>
                  <input type="date" class="form-control" name="preferred_date" id="date" required>
                  <div class="invalid-feedback">Please pick a date.</div>
                </div>
                <div class="col-md-6">
                  <label for="time" class="form-label">Preferred Time</label>
                  <select class="form-select" name="preferred_time" id="time" required>
                    <option value="" selected disabled>Select time</option>
                    <option value="As soon as possible">As soon as possible</option>
                    <option value="Morning (8am – 12pm)">Morning (8am – 12pm)</option>
                    <option value="Afternoon (12pm – 4pm)">Afternoon (12pm – 4pm)</option>
                    <option value="Evening (4pm – 8pm)">Evening (4pm – 8pm)</option>
                    <option value="Night (8pm – 12am)">Night (8pm – 12am)</option>
                  </select>
                  <div class="invalid-feedback">Please select a time.</div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="female_technician" value="1" id="femaleTech">
                    <label class="form-check-label" for="femaleTech">I prefer a female technician</label>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-glow btn-lg w-100" id="submitBooking">
                    <i class="bi bi-send-fill"></i> Confirm Booking
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ TESTIMONIALS ============ -->
  <section class="section" id="testimonials">
    <div class="container">
      <div class="section-head text-center reveal">
        <span class="eyebrow">Testimonials</span>
        <h2>What patients say about our <span class="text-yellow">ECG Home Service</span></h2>
      </div>
      <div class="row g-4">
        @foreach($testimonials as $testi)
          <div class="col-md-4 reveal">
            <figure class="testi-card">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="stars">
                  @for($i = 1; $i <= 5; $i++)
                    @if($testi->rating >= $i)
                      <i class="bi bi-star-fill"></i>
                    @elseif($testi->rating >= ($i - 0.5))
                      <i class="bi bi-star-half"></i>
                    @else
                      <i class="bi bi-star"></i>
                    @endif
                  @endfor
                </div>
                @if($testi->is_verified)
                  <span class="verified-tag"><i class="bi bi-patch-check-fill"></i> Verified</span>
                @endif
              </div>
              <blockquote>{{ $testi->comment }}</blockquote>
              <figcaption>
                <span class="avatar {{ $testi->avatar_class }}">{{ $testi->avatar_text }}</span>
                <div>
                  <strong>{{ $testi->name }}</strong>
                  <small>{{ $testi->location }}</small>
                </div>
              </figcaption>
            </figure>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ============ SEO CONTENT ============ -->
  <section class="section seo-section" id="ecg-home-service">
    <div class="container">
      <div class="row g-5 align-items-start">
        <div class="col-lg-7 reveal">
          <span class="eyebrow">About the Service</span>
          <h2 class="mb-4">{{ $settings['seo_title'] ?? 'ECG Home Service in Dhaka — why test at home?' }}</h2>
          <div class="seo-text">
            <p>{{ $settings['seo_desc'] ?? "An ECG (electrocardiogram) is a quick, painless test that records your heart's electrical activity. It helps doctors detect irregular heartbeat, heart attack signs, and other heart conditions. With our ECG home service, you no longer need to travel to a hospital or wait in long queues — we bring the same 12-lead ECG machine to your home." }}</p>
            
            <h3>{{ $settings['seo_who_title'] ?? 'Who should book a home ECG test?' }}</h3>
            <ul class="seo-list">
              @php
                $whoList = json_decode($settings['seo_who_list'] ?? '[]', true) ?: [
                  "Elderly or bedridden patients who can't travel easily",
                  'Heart patients who need a routine ECG for their doctor',
                  'Anyone with chest pain, palpitations or breathlessness',
                  'People with diabetes or high blood pressure',
                  'Pre-surgery, pre-employment or visa medical ECG'
                ];
              @endphp
              @foreach($whoList as $item)
                <li><i class="bi bi-dot"></i> {{ $item }}</li>
              @endforeach
            </ul>

            <h3>{{ $settings['seo_included_title'] ?? "What's included in our ECG at home?" }}</h3>
            <p>{{ $settings['seo_included_desc'] ?? 'Every ECG home service visit includes a trained technician, sterile disposable electrodes, a printed ECG strip on the spot, and a digital report on WhatsApp. Choose the cardiologist review package for a written interpretation within 30 minutes. Our home ECG service runs 24/7 across Mohammadpur and nearby areas of Dhaka.' }}</p>
          </div>
        </div>

        <div class="col-lg-5 reveal">
          <div class="bn-card" lang="bn">
            <span class="bn-badge"><i class="bi bi-translate"></i> বাংলা</span>
            <h3>{{ $settings['bn_title'] ?? 'বাসায় ইসিজি সেবা — মোহাম্মদপুর, ঢাকা' }}</h3>
            <p>{{ $settings['bn_desc'] ?? 'এখন আর হাসপাতালে লাইনে দাঁড়িয়ে ইসিজি করাতে হবে না। আমাদের ইসিজি হোম সার্ভিস মোহাম্মদপুর, শ্যামলী, লালমাটিয়া, ধানমন্ডি, আদাবর ও মিরপুরে ২৪ ঘণ্টা পাওয়া যায়। প্রশিক্ষিত টেকনিশিয়ান ৩০–৪৫ মিনিটের মধ্যে আপনার বাসায় এসে ১২-লিড ইসিজি করবেন, আর কার্ডিওলজিস্টের রিপোর্ট হোয়াটসঅ্যাপে পাঠানো হবে।' }}</p>
            
            @php
              $bnPoints = json_decode($settings['bn_features'] ?? '[]', true) ?: [
                'বাসায় ইসিজি টেস্ট — মাত্র ৮০০ টাকা থেকে',
                'মহিলা টেকনিশিয়ান পাওয়া যায়',
                'সেবা শেষে পেমেন্ট — ক্যাশ, বিকাশ, নগদ'
              ];
            @endphp
            <ul>
              @foreach($bnPoints as $pt)
                <li><i class="bi bi-check2-circle"></i> {{ $pt }}</li>
              @endforeach
            </ul>
            <a href="tel:{{ $settings['tel_phone'] ?? '+8801348223547' }}" class="btn btn-glow w-100" id="bnCallBtn">
              <i class="bi bi-telephone-fill"></i> এখনই কল করুন
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ FAQ ============ -->
  <section class="section section-alt" id="faq">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-4 reveal">
          <span class="eyebrow">FAQ</span>
          <h2 class="mb-3"><span class="text-yellow">ECG Home Service</span> FAQ</h2>
          <p class="lead-muted">Can't find your answer? Call us anytime — we're happy to help.</p>
          <a href="tel:{{ $settings['tel_phone'] ?? '+8801348223547' }}" class="btn btn-ghost-dark mt-2" id="faqCallBtn">
            <i class="bi bi-headset"></i> Talk to us
          </a>
        </div>
        <div class="col-lg-8 reveal">
          <div class="accordion custom-accordion" id="faqAccordion">
            @foreach($faqs as $index => $faq)
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="faq{{ $faq->id }}">
                    {{ $faq->question }}
                  </button>
                </h3>
                <div id="faq{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">{{ $faq->answer }}</div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ EMERGENCY CTA ============ -->
  <section class="cta-band" id="contact">
    <div class="container">
      <div class="cta-inner reveal">
        <div class="d-flex align-items-center gap-3">
          <span class="cta-icon"><i class="bi bi-exclamation-octagon-fill"></i></span>
          <div>
            <h2>{{ $settings['emergency_title'] ?? 'Chest pain or breathlessness?' }}</h2>
            <p>{{ $settings['emergency_desc'] ?? 'Call our emergency line now — priority dispatch 24 hours a day.' }}</p>
          </div>
        </div>
        <a href="tel:{{ $settings['tel_phone'] ?? '+8801348223547' }}" class="btn btn-light btn-lg cta-btn" id="emergencyCallBtn">
          <i class="bi bi-telephone-fill"></i> {{ $settings['hotline_phone'] ?? '01348-223547' }}
        </a>
      </div>
    </div>
  </section>
</main>
@endsection
