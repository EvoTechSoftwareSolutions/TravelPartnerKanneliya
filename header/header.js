// header.js - Header interactivity

(function () {
  const header       = document.getElementById('siteHeader');
  const menuToggle   = document.getElementById('menuToggle');
  const slidePanel   = document.getElementById('slidePanel');
  const panelOverlay = document.getElementById('panelOverlay');
  const panelClose   = document.getElementById('panelClose');

  // Guard — stop if header elements not found
  if (!header || !menuToggle || !slidePanel) return;

  // ── Scroll effect ────────────────────────────────────────────
  window.addEventListener('scroll', () => {
    header.classList.toggle('scrolled', window.scrollY > 30);
  });

  // ── Panel helpers ────────────────────────────────────────────
  function openPanel() {
    menuToggle.classList.add('open');
    slidePanel.classList.add('open');
    panelOverlay.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closePanel() {
    menuToggle.classList.remove('open');
    slidePanel.classList.remove('open');
    panelOverlay.classList.remove('open');
    document.body.style.overflow = '';
  }

  // ── Toggle on hamburger click ────────────────────────────────
  menuToggle.addEventListener('click', () => {
    slidePanel.classList.contains('open') ? closePanel() : openPanel();
  });

  // ── Close button inside panel ────────────────────────────────
  if (panelClose) {
    panelClose.addEventListener('click', closePanel);
  }

  // ── Close on overlay click ───────────────────────────────────
  if (panelOverlay) {
    panelOverlay.addEventListener('click', closePanel);
  }

  // ── Close on nav link click ──────────────────────────────────
  slidePanel.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', closePanel);
  });

  // ── Close on Escape key ──────────────────────────────────────
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closePanel();
  });

  // ── Active nav link ──────────────────────────────────────────
  const navLinks = document.querySelectorAll('.nav-link');
  const currentPath = window.location.pathname.replace(/\/$/, '') || '/';
  const currentHash = window.location.hash;

  navLinks.forEach(link => link.classList.remove('active'));

  navLinks.forEach(link => {
    const href = link.getAttribute('href') || '';
    if (href.startsWith('tel:') || href.startsWith('http')) return;

    const linkPath = href.split('#')[0].replace(/\/$/, '') || '/';
    const linkHash = href.includes('#') ? '#' + href.split('#')[1] : '';

    if (linkHash) {
      if (linkPath === currentPath && currentHash === linkHash) {
        link.classList.add('active');
      }
    } else {
      if (linkPath === currentPath) {
        link.classList.add('active');
      }
    }
  });

  // ── Scroll-based active (for anchor sections on same page) ───
  const sections = document.querySelectorAll('section[id]');

  if (sections.length && navLinks.length) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          navLinks.forEach(l => l.classList.remove('active'));

          const hashLink = document.querySelector(
            `.nav-link[href="${currentPath}#${entry.target.id}"]`
          );
          const pageLink = document.querySelector(
            `.nav-link[href="${currentPath}"]`
          );

          if (hashLink) hashLink.classList.add('active');
          else if (pageLink) pageLink.classList.add('active');
        }
      });
    }, { threshold: 0.4 });

    sections.forEach(s => observer.observe(s));
  }

})();


// ── Anchor scroll offset fix for fixed header ──────────────────
(function () {
  const HEADER_HEIGHT = 100;

  function scrollToHash(hash) {
    if (!hash) return;
    const target = document.querySelector(hash);
    if (!target) return;
    const top = target.getBoundingClientRect().top + window.scrollY - HEADER_HEIGHT;
    window.scrollTo({ top, behavior: 'smooth' });
  }

  window.addEventListener('load', () => {
    if (window.location.hash) {
      setTimeout(() => scrollToHash(window.location.hash), 50);
    }
  });
})();