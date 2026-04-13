// header.js - Header interactivity

(function () {
  const header      = document.getElementById('siteHeader');
  const menuToggle  = document.getElementById('menuToggle');
  const slidePanel  = document.getElementById('slidePanel');
  const panelOverlay = document.getElementById('panelOverlay');
  const panelClose  = document.getElementById('panelClose');

  // ── Scroll effect ────────────────────────────────────────────
  window.addEventListener('scroll', () => {
    header.classList.toggle('scrolled', window.scrollY > 30);
  });

  // ── Panel helpers ────────────────────────────────────────────
  function openPanel() {
    menuToggle.classList.add('open');
    slidePanel.classList.add('open');
    panelOverlay.classList.add('open');
    document.body.style.overflow = 'hidden'; // prevent bg scroll
  }

  function closePanel() {
    menuToggle.classList.remove('open');
    slidePanel.classList.remove('open');
    panelOverlay.classList.remove('open');
    document.body.style.overflow = '';
  }

  // ── Toggle on hamburger click ────────────────────────────────
  if (menuToggle && slidePanel) {
    menuToggle.addEventListener('click', () => {
      slidePanel.classList.contains('open') ? closePanel() : openPanel();
    });
  }

  // ── Close button inside panel ────────────────────────────────
  if (panelClose) {
    panelClose.addEventListener('click', closePanel);
  }

  // ── Close on overlay click ───────────────────────────────────
  if (panelOverlay) {
    panelOverlay.addEventListener('click', closePanel);
  }

  // ── Close on nav link click ──────────────────────────────────
  if (slidePanel) {
    slidePanel.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', closePanel);
    });
  }

  // ── Close on Escape key ──────────────────────────────────────
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closePanel();
  });

  // ── Active nav link on scroll ────────────────────────────────
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link');

  if (sections.length && navLinks.length) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          navLinks.forEach(l => l.classList.remove('active'));
          const active = document.querySelector(`.nav-link[href="#${entry.target.id}"]`);
          if (active) active.classList.add('active');
        }
      });
    }, { threshold: 0.5 });

    sections.forEach(s => observer.observe(s));
  }

})();