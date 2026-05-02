// header.js - Header interactivity

(function () {
  const header       = document.getElementById('siteHeader');
  const menuToggle   = document.getElementById('menuToggle');
  const slidePanel   = document.getElementById('slidePanel');
  const panelOverlay = document.getElementById('panelOverlay');
  const panelClose   = document.getElementById('panelClose');

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

  // ── Active nav link ──────────────────────────────────────────
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link');

  const currentPath = window.location.pathname.split('/').pop() || 'index.php';

  navLinks.forEach(link => {
    const href     = link.getAttribute('href') || '';
    const linkPage = href.split('#')[0];
    const linkHash = href.includes('#') ? href.split('#')[1] : null;

    const pageMatches = linkPage === currentPath ||
      (currentPath === '' && linkPage === 'index.php') ||
      (currentPath === 'index.php' && linkPage === '');

    if (pageMatches && !linkHash) {
      link.classList.add('active');
    } else if (pageMatches && linkHash) {
      if (window.location.hash === '#' + linkHash) {
        link.classList.add('active');
      }
    }
  });

  // ── Scroll-based active (for anchor sections on same page) ───
  if (sections.length && navLinks.length) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          navLinks.forEach(l => l.classList.remove('active'));

          let active = document.querySelector(
            `.nav-link[href="${currentPath}#${entry.target.id}"]`
          );

          if (!active) {
            active = document.querySelector(
              `.nav-link[href="${currentPath}"]`
            );
          }

          if (active) active.classList.add('active');
        }
      });
    }, { threshold: 0.4 });

    sections.forEach(s => observer.observe(s));
  }

})();


// ── Anchor scroll offset fix for fixed header ──
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