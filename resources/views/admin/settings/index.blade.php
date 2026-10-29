@extends('admin.layouts.app')

@section('title', 'Site Settings & SEO')
@section('page-title', 'Site Settings, Branding & SEO')

@section('admin-content')
<div class="card">
  <div class="card-header fw-bold">
    <i class="bi bi-sliders me-1 text-primary"></i>Global Website Configuration
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <ul class="nav nav-tabs mb-4" id="settingTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active fw-semibold" id="brand-tab" data-bs-toggle="tab" data-bs-target="#brandPane" type="button" role="tab">
            <i class="bi bi-palette me-1"></i> Branding & Contact
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link fw-semibold" id="footer-tab" data-bs-toggle="tab" data-bs-target="#footerPane" type="button" role="tab">
            <i class="bi bi-layout-text-window-reverse me-1 text-success"></i> Footer & Socials (ফুটার সেটিংস)
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link fw-semibold" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seoPane" type="button" role="tab">
            <i class="bi bi-search me-1"></i> SEO & Meta Data
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link fw-semibold" id="bangla-tab" data-bs-toggle="tab" data-bs-target="#banglaPane" type="button" role="tab">
            <i class="bi bi-translate me-1"></i> বাংলা সেকশন ও SEO টেক্সট
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link fw-semibold" id="cta-tab" data-bs-toggle="tab" data-bs-target="#ctaPane" type="button" role="tab">
            <i class="bi bi-megaphone me-1"></i> Banners & Emergency CTA
          </button>
        </li>
      </ul>

      <div class="tab-content" id="settingTabsContent">
        <!-- 1. Branding & Contact -->
        <div class="tab-pane fade show active" id="brandPane" role="tabpanel">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label fw-semibold text-primary"><i class="bi bi-window me-1"></i> Website Title (ব্রাউজার ট্যাব ও এসইও টাইটেল) <span class="text-danger">*</span></label>
              <input type="text" name="site_title" class="form-control form-control-lg" value="{{ $settings['site_title'] ?? 'ECG Home Service in Mohammadpur, Dhaka | 24/7 Home ECG Test' }}" required>
              <small class="text-muted">এই টাইটেলটি ব্রাউজারের ট্যাবে এবং গুগল সার্চ রেজাল্টে সবার উপরে দেখাবে।</small>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Site Name (ব্র্যান্ড নাম)</label>
              <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] ?? 'CardioHome' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Hotline Phone (Display)</label>
              <input type="text" name="hotline_phone" class="form-control" value="{{ $settings['hotline_phone'] ?? '01348-223547' }}">
            </div>

            <div class="col-md-6">
              <div class="p-3 bg-light rounded-3 border">
                <label class="form-label fw-semibold text-dark"><i class="bi bi-image me-1 text-primary"></i> Upload Website Logo (মূল লোগো)</label>
                <input type="file" name="logo" class="form-control" accept="image/*">
                <div class="mt-2 d-flex align-items-center gap-3">
                  <span class="small text-muted">বর্তমান লোগো:</span>
                  <div class="p-2 bg-white rounded border shadow-sm">
                    <img src="{{ asset($settings['logo'] ?? 'images/logo.png') }}" alt="Logo" style="height: 48px; max-width: 180px; object-fit: contain;">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="p-3 bg-light rounded-3 border">
                <label class="form-label fw-semibold text-dark"><i class="bi bi-app-indicator me-1 text-info"></i> Upload Favicon (ব্রাউজার আইকন)</label>
                <input type="file" name="favicon" class="form-control" accept="image/*">
                <div class="mt-2 d-flex align-items-center gap-3">
                  <span class="small text-muted">বর্তমান ফেভিকন:</span>
                  <div class="p-2 bg-white rounded border shadow-sm">
                    <img src="{{ asset($settings['favicon'] ?? 'images/logo.png') }}" alt="Favicon" style="height: 32px; width: 32px; object-fit: contain;">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Contact Email</label>
              <input type="email" name="email" class="form-control" value="{{ $settings['email'] ?? 'care@cardiohome.com.bd' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Working Hours Text</label>
              <input type="text" name="working_hours" class="form-control" value="{{ $settings['working_hours'] ?? 'Open 24 hours, 7 days' }}">
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Physical Base Address</label>
              <input type="text" name="address" class="form-control" value="{{ $settings['address'] ?? 'Tajmahal Road, Mohammadpur, Dhaka-1207' }}">
            </div>
          </div>
        </div>

        <!-- 2. Footer Settings -->
        <div class="tab-pane fade" id="footerPane" role="tabpanel">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label fw-semibold text-primary"><i class="bi bi-file-earmark-text me-1"></i> Footer About / Description (ফুটারের সংক্ষিপ্ত পরিচিতি)</label>
              <textarea name="footer_desc" class="form-control" rows="3" placeholder="24/7 ECG home service in Mohammadpur, Dhaka...">{{ $settings['footer_desc'] ?? '' }}</textarea>
              <small class="text-muted">ফুটারের বাম কলামে লোগোর ঠিক নিচে এই লেখাটি প্রদর্শিত হবে।</small>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Footer Copyright Text (কপিরাইট নাম)</label>
              <input type="text" name="copyright" class="form-control" value="{{ $settings['copyright'] ?? 'CardioHome. All rights reserved.' }}">
              <small class="text-muted">© {{ date('Y') }} এর সাথে প্রদর্শিত হবে।</small>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Footer Credit Note (ডানপাশের নোট)</label>
              <input type="text" name="footer_credit" class="form-control" value="{{ $settings['footer_credit'] ?? 'Made with ❤️ in Dhaka' }}">
              <small class="text-muted">ফুটারের নিচে ডানে প্রদর্শিত হবে।</small>
            </div>

            <div class="col-12"><hr class="my-2"></div>
            <h6 class="fw-bold text-dark"><i class="bi bi-share-fill me-1 text-primary"></i>Footer Social Media Links (সোশ্যাল মিডিয়া লিঙ্ক)</h6>

            <div class="col-md-4">
              <label class="form-label fw-semibold"><i class="bi bi-facebook text-primary me-1"></i> Facebook Page URL</label>
              <input type="text" name="facebook_url" class="form-control" value="{{ $settings['facebook_url'] ?? '#' }}" placeholder="https://facebook.com/...">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-semibold"><i class="bi bi-youtube text-danger me-1"></i> YouTube Channel URL</label>
              <input type="text" name="youtube_url" class="form-control" value="{{ $settings['youtube_url'] ?? '#' }}" placeholder="https://youtube.com/...">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-semibold"><i class="bi bi-whatsapp text-success me-1"></i> WhatsApp Number</label>
              <input type="text" name="whatsapp_number" class="form-control" value="{{ $settings['whatsapp_number'] ?? '8801348223547' }}" placeholder="8801348223547">
            </div>
          </div>
        </div>

        <!-- 2. SEO & Meta -->
        <div class="tab-pane fade" id="seoPane" role="tabpanel">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label fw-semibold">Meta Description (গুগল সার্চ স্নsnippet ডেসক্রিপশন)</label>
              <textarea name="meta_description" class="form-control" rows="3">{{ $settings['meta_description'] ?? '' }}</textarea>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Meta Keywords</label>
              <textarea name="meta_keywords" class="form-control" rows="2">{{ $settings['meta_keywords'] ?? '' }}</textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Canonical URL</label>
              <input type="url" name="canonical_url" class="form-control" value="{{ $settings['canonical_url'] ?? 'https://cardiohome.com.bd/' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Author</label>
              <input type="text" name="author" class="form-control" value="{{ $settings['author'] ?? 'CardioHome' }}">
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Geo Region</label>
              <input type="text" name="geo_region" class="form-control" value="{{ $settings['geo_region'] ?? 'BD-13' }}">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-semibold">Geo Placename</label>
              <input type="text" name="geo_placename" class="form-control" value="{{ $settings['geo_placename'] ?? 'Mohammadpur, Dhaka' }}">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-semibold">Geo Position (lat;lng)</label>
              <input type="text" name="geo_position" class="form-control" value="{{ $settings['geo_position'] ?? '23.7662;90.3589' }}">
            </div>
          </div>
        </div>

        <!-- 3. Bangla & SEO Content -->
        <div class="tab-pane fade" id="banglaPane" role="tabpanel">
          <div class="row g-3">
            <h6 class="fw-bold text-dark"><i class="bi bi-translate me-1 text-primary"></i>বাংলা ইনফো বক্স (Home Page Box)</h6>
            <div class="col-12">
              <label class="form-label fw-semibold">বক্স শিরোনাম (Title)</label>
              <input type="text" name="bn_title" class="form-control" value="{{ $settings['bn_title'] ?? '' }}">
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">বক্স বিস্তারিত বিবরণ (Description)</label>
              <textarea name="bn_desc" class="form-control" rows="3">{{ $settings['bn_desc'] ?? '' }}</textarea>
            </div>

            @php
              $bnArr = json_decode($settings['bn_features'] ?? '[]', true) ?: [];
              $bnText = implode("\n", $bnArr);
            @endphp
            <div class="col-12">
              <label class="form-label fw-semibold">বক্স ফিচার পয়েন্টসমূহ (প্রতি লাইনে একটি)</label>
              <textarea name="bn_features_text" class="form-control" rows="3">{{ $bnText }}</textarea>
            </div>

            <div class="col-12"><hr class="my-3"></div>
            <h6 class="fw-bold text-dark"><i class="bi bi-file-text-fill me-1 text-info"></i>English Detailed SEO Guide Section</h6>

            <div class="col-12">
              <label class="form-label fw-semibold">SEO Section Heading</label>
              <input type="text" name="seo_title" class="form-control" value="{{ $settings['seo_title'] ?? '' }}">
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold">Why Test at Home Paragraph</label>
              <textarea name="seo_desc" class="form-control" rows="3">{{ $settings['seo_desc'] ?? '' }}</textarea>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">"Who Should Book" Title</label>
              <input type="text" name="seo_who_title" class="form-control" value="{{ $settings['seo_who_title'] ?? '' }}">
            </div>
            @php
              $whoArr = json_decode($settings['seo_who_list'] ?? '[]', true) ?: [];
              $whoText = implode("\n", $whoArr);
            @endphp
            <div class="col-md-6">
              <label class="form-label fw-semibold">"Who Should Book" Checklist (One per line)</label>
              <textarea name="seo_who_list_text" class="form-control" rows="4">{{ $whoText }}</textarea>
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">"What's Included" Paragraph</label>
              <textarea name="seo_included_desc" class="form-control" rows="3">{{ $settings['seo_included_desc'] ?? '' }}</textarea>
            </div>
          </div>
        </div>

        <!-- 4. CTA Banners -->
        <div class="tab-pane fade" id="ctaPane" role="tabpanel">
          <div class="row g-3">
            <h6 class="fw-bold text-danger"><i class="bi bi-exclamation-octagon-fill me-1"></i>Emergency CTA Band (Red Hotline Banner)</h6>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Emergency Banner Title</label>
              <input type="text" name="emergency_title" class="form-control" value="{{ $settings['emergency_title'] ?? '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Emergency Banner Subtitle</label>
              <input type="text" name="emergency_desc" class="form-control" value="{{ $settings['emergency_desc'] ?? '' }}">
            </div>

            <div class="col-12"><hr class="my-3"></div>
            <h6 class="fw-bold text-dark"><i class="bi bi-info-circle-fill me-1 text-primary"></i>Work Gallery Callout Note (Below Gallery)</h6>

            <div class="col-12">
              <label class="form-label fw-semibold">Callout Banner Text</label>
              <input type="text" name="gallery_callout_text" class="form-control" value="{{ $settings['gallery_callout_text'] ?? '' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Callout Hotline Label (Name / Phone)</label>
              <input type="text" name="gallery_callout_name" class="form-control" value="{{ $settings['gallery_callout_name'] ?? '01348-223547 (মো: শরিফ)' }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Callout Tel Link Number</label>
              <input type="text" name="gallery_callout_tel" class="form-control" value="{{ $settings['gallery_callout_tel'] ?? '+8801348223547' }}">
            </div>
          </div>
        </div>
      </div>

      <div class="mt-4 pt-3 border-top">
        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save me-1"></i> Save All Settings</button>
      </div>
    </form>
  </div>
</div>
@endsection

