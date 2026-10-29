/* CardioHome — interactions */
(() => {
  'use strict';

  // Navbar background on scroll + back-to-top visibility
  const nav = document.getElementById('mainNav');
  const backTop = document.getElementById('backTop');
  const onScroll = () => {
    const y = window.scrollY;
    nav.classList.toggle('scrolled', y > 40);
    backTop.classList.toggle('show', y > 600);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
  backTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  // Close mobile menu after clicking a link
  const navMenu = document.getElementById('navMenu');
  navMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
    const inst = bootstrap.Collapse.getInstance(navMenu);
    if (inst) inst.hide();
  }));

  // Animated counters
  const animateCount = (el) => {
    const target = parseFloat(el.dataset.count);
    const decimals = parseInt(el.dataset.decimals || '0', 10);
    const suffix = el.dataset.suffix || '';
    const duration = 1600;
    const start = performance.now();
    const step = (now) => {
      const p = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - p, 3);
      const val = target * eased;
      el.textContent = (decimals ? val.toFixed(decimals) : Math.round(val).toLocaleString()) + suffix;
      if (p < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  };

  // Reveal on scroll (with stagger inside rows)
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el = entry.target;
      el.classList.add('in');
      el.querySelectorAll('[data-count]').forEach(animateCount);
      io.unobserve(el);
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.reveal').forEach(el => {
    const siblings = el.parentElement ? [...el.parentElement.children].filter(c => c.classList.contains('reveal')) : [];
    const idx = siblings.indexOf(el);
    if (idx > 0) el.style.transitionDelay = `${Math.min(idx * 90, 450)}ms`;
    io.observe(el);
  });

  // Live BPM simulation
  const bpmEl = document.getElementById('bpmValue');
  setInterval(() => {
    bpmEl.textContent = 68 + Math.floor(Math.random() * 9);
  }, 1500);

  // Pre-select service when clicking service/pricing buttons
  const serviceSelect = document.getElementById('service');
  document.querySelectorAll('[data-service]').forEach(btn => {
    btn.addEventListener('click', () => { serviceSelect.value = btn.dataset.service; });
  });

  // Date: min = today, default = today
  const dateInput = document.getElementById('date');
  const today = new Date();
  const iso = new Date(today.getTime() - today.getTimezoneOffset() * 60000).toISOString().split('T')[0];
  dateInput.min = iso;
  dateInput.value = iso;

  // Booking form validation + AJAX submission to Laravel backend
  const form = document.getElementById('bookingForm');
  const modalEl = document.getElementById('successModal');
  const modal = modalEl ? new bootstrap.Modal(modalEl) : null;
  if (form) {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      if (!form.checkValidity()) {
        form.classList.add('was-validated');
        form.querySelector(':invalid')?.focus();
        return;
      }
      const submitBtn = document.getElementById('submitBooking');
      const originalText = submitBtn ? submitBtn.innerHTML : '';
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Submitting...';
      }

      const formData = new FormData(form);
      const actionUrl = form.getAttribute('action') || '/book';

      try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        const res = await fetch(actionUrl, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {})
          }
        });

        const data = await res.json();

        if (res.ok && data.success) {
          const titleEl = document.getElementById('successTitle');
          const textEl = document.getElementById('successText');
          if (titleEl) titleEl.textContent = 'Booking Received!';
          if (textEl) textEl.textContent = data.message;
          if (modal) modal.show();
          form.reset();
          form.classList.remove('was-validated');
          if (dateInput) dateInput.value = iso;
        } else {
          let errorMsg = data.message || 'Validation error occurred.';
          if (data.errors) {
            errorMsg = Object.values(data.errors).flat().join('\n');
          }
          alert(errorMsg);
        }
      } catch (err) {
        console.error(err);
        alert('An error occurred while submitting your booking. Please call our hotline directly.');
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalText;
        }
      }
    });
  }

  // Image preview modal handler
  const imageModal = document.getElementById('imagePreviewModal');
  if (imageModal) {
    imageModal.addEventListener('show.bs.modal', (e) => {
      const trigger = e.relatedTarget;
      if (!trigger) return;
      const imgSrc = trigger.getAttribute('data-img-src');
      const imgTitle = trigger.getAttribute('data-img-title');
      const modalImg = document.getElementById('modalPreviewImg');
      const titleEl = document.getElementById('imagePreviewTitle');
      if (modalImg && imgSrc) modalImg.src = imgSrc;
      if (titleEl && imgTitle) titleEl.textContent = imgTitle;
    });
  }

  // Footer year
  document.getElementById('year').textContent = new Date().getFullYear();
})();
