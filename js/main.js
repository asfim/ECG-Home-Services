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

  // Booking form validation + success modal
  const form = document.getElementById('bookingForm');
  const modal = new bootstrap.Modal(document.getElementById('successModal'));
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (!form.checkValidity()) {
      form.classList.add('was-validated');
      form.querySelector(':invalid')?.focus();
      return;
    }
    const name = document.getElementById('fullName').value.trim();
    const phone = document.getElementById('phone').value.trim();
    document.getElementById('successText').textContent =
      `Thank you, ${name}! Our team will call ${phone} within 5 minutes to confirm your ${serviceSelect.value} appointment.`;
    modal.show();
    form.reset();
    form.classList.remove('was-validated');
    dateInput.value = iso;
  });

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
