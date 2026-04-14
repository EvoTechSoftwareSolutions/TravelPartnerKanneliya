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

  const currentPath = window.location.pathname.split('/').pop();
  const currentHash = window.location.hash.replace('#', '');

  navLinks.forEach(link => {
    const href     = link.getAttribute('href') || '';
    const linkPage = href.split('/').pop().split('#')[0];
    const linkHash = href.includes('#') ? href.split('#')[1] : null;

    // If URL has a hash, only activate the matching hash link — skip all others
    if (currentHash) {
      if (linkHash && linkPage === currentPath && linkHash === currentHash) {
        link.classList.add('active');
      }
      return;
    }

    // Skip links that point to a hash on a different page
    if (linkHash && linkPage !== '' && linkPage !== currentPath) return;

    const isHome =
      (currentPath === '' || currentPath === 'home.php') &&
      (linkPage === 'home.php' || linkPage === '');

    const isOther =
      linkPage !== '' &&
      linkPage !== 'home.php' &&
      currentPath === linkPage &&
      !linkHash;

    if (isHome || isOther) {
      link.classList.add('active');
    }
  });

  // ── Scroll-based active (for anchor sections on home page) ───
  // Disabled when URL has a hash to prevent overriding hash-based active state
  if (sections.length && navLinks.length && !currentHash) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          navLinks.forEach(l => l.classList.remove('active'));

          // Try matching by anchor hash first
          let active = document.querySelector(
            `.nav-link[href="#${entry.target.id}"]`
          );

          // Fallback: match page-based link for current page
          if (!active) {
            active = document.querySelector(
              `.nav-link[href="${currentPath}"], .nav-link[href="home.php"]`
            );
          }

          if (active) active.classList.add('active');
        }
      });
    }, { threshold: 0.4 });

    sections.forEach(s => observer.observe(s));
  }

})();