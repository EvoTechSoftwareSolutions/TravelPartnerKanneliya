// Scroll reveal
const revealEls = document.querySelectorAll('.reveal, .reveal-left');
const revealIO = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) { e.target.classList.add('visible'); revealIO.unobserve(e.target); }
  });
}, { threshold: 0.1 });
revealEls.forEach(el => revealIO.observe(el));


// ── Destinations Lightbox ──────────────────────────────
const cards = Array.from(document.querySelectorAll('.dest-card'));
const lightbox = document.getElementById('destLightbox');
const lbImg = document.getElementById('destLbImg');
const lbCaption = document.getElementById('destLbCaption');
const lbClose = document.getElementById('destLbClose');
const lbPrev = document.getElementById('destLbPrev');
const lbNext = document.getElementById('destLbNext');

let currentIndex = 0;

function openLightbox(index) {
  currentIndex = index;
  const card = cards[index];
  lbImg.src = card.dataset.src;
  lbImg.alt = card.dataset.name;
  lbCaption.textContent = card.dataset.name;
  lightbox.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeLightbox() {
  lightbox.classList.remove('open');
  document.body.style.overflow = '';
  setTimeout(() => { lbImg.src = ''; }, 350);
}

function showPrev() {
  openLightbox((currentIndex - 1 + cards.length) % cards.length);
}

function showNext() {
  openLightbox((currentIndex + 1) % cards.length);
}

// cards.forEach((card, i) => {
//   card.addEventListener('click', () => openLightbox(i));
// });

//redirect to page:
cards.forEach((card) => {
  card.addEventListener('click', () => {
    const target = card.getAttribute('window.location');
    if (target) window.location.href = target;
  });
});

lbClose.addEventListener('click', closeLightbox);
lbPrev.addEventListener('click', showPrev);
lbNext.addEventListener('click', showNext);

// Close on backdrop click
lightbox.addEventListener('click', (e) => {
  if (e.target === lightbox) closeLightbox();
});

// Keyboard navigation
document.addEventListener('keydown', (e) => {
  if (!lightbox.classList.contains('open')) return;
  if (e.key === 'Escape') closeLightbox();
  if (e.key === 'ArrowLeft') showPrev();
  if (e.key === 'ArrowRight') showNext();
});


// ── Packages Carousel (drag + swipe + click) ──────────────
(function () {
  const track = document.getElementById('pkgTrack');
  const cards = Array.from(track.querySelectorAll('.pkg-card'));
  const dotsWrap = document.getElementById('pkgDots');
  const btnPrev = document.getElementById('pkgPrev');
  const btnNext = document.getElementById('pkgNext');
  const total = cards.length;
  let current = 1;

  // ── Drag state ──
  let isDragging = false;
  let dragStartX = 0;
  let dragDeltaX = 0;
  let dragMoved = false;
  const DRAG_THRESHOLD = 60; // px needed to trigger a slide change

  // Build dots
  cards.forEach((_, i) => {
    const d = document.createElement('button');
    d.className = 'pkg-dot';
    d.setAttribute('aria-label', `Package ${i + 1}`);
    d.addEventListener('click', () => goTo(i));
    dotsWrap.appendChild(d);
  });

  const dots = Array.from(dotsWrap.querySelectorAll('.pkg-dot'));

  function goTo(index) {
    current = (index + total) % total;
    render();
  }

  function render() {
    cards.forEach((card, i) => {
      card.classList.remove('pkg-pos-center', 'pkg-pos-left', 'pkg-pos-right', 'pkg-pos-hidden', 'pkg-dragging');
      const diff = i - current;
      if (diff === 0) {
        card.classList.add('pkg-pos-center');
      } else if (diff === 1 || diff === -(total - 1)) {
        card.classList.add('pkg-pos-right');
      } else if (diff === -1 || diff === (total - 1)) {
        card.classList.add('pkg-pos-left');
      } else {
        card.classList.add('pkg-pos-hidden');
      }
    });
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
  }

  // ── Pointer events (mouse + touch unified) ──
  function onPointerDown(e) {
    isDragging = true;
    dragMoved = false;
    dragStartX = e.type === 'touchstart' ? e.touches[0].clientX : e.clientX;
    dragDeltaX = 0;
    track.style.cursor = 'grabbing';
  }

  function onPointerMove(e) {
    if (!isDragging) return;
    const x = e.type === 'touchmove' ? e.touches[0].clientX : e.clientX;
    dragDeltaX = x - dragStartX;
    if (Math.abs(dragDeltaX) > 8) dragMoved = true;
  }

  function onPointerUp() {
    if (!isDragging) return;
    isDragging = false;
    track.style.cursor = 'grab';

    if (Math.abs(dragDeltaX) >= DRAG_THRESHOLD) {
      dragDeltaX < 0 ? goTo(current + 1) : goTo(current - 1);
    }
    dragDeltaX = 0;
  }

  // Mouse events
  track.addEventListener('mousedown', onPointerDown);
  window.addEventListener('mousemove', onPointerMove);
  window.addEventListener('mouseup', onPointerUp);

  // Touch events
  track.addEventListener('touchstart', onPointerDown, { passive: true });
  track.addEventListener('touchmove', onPointerMove, { passive: true });
  track.addEventListener('touchend', onPointerUp);

  // Prevent image drag interference
  track.addEventListener('dragstart', e => e.preventDefault());

  // ── Click handler (only fires if NOT a drag) ──
  cards.forEach((card) => {
    card.addEventListener('click', () => {
      if (dragMoved) return; // was a drag, not a click
      if (card.classList.contains('pkg-pos-center')) {
        window.location.href = 'packages.php#pk0' + (current + 1);
      } else if (card.classList.contains('pkg-pos-right')) {
        goTo(current + 1);
      } else if (card.classList.contains('pkg-pos-left')) {
        goTo(current - 1);
      }
    });
  });

  // Arrow buttons
  btnPrev.addEventListener('click', () => goTo(current - 1));
  btnNext.addEventListener('click', () => goTo(current + 1));

  // Keyboard
  document.addEventListener('keydown', e => {
    const section = document.getElementById('packages');
    const rect = section.getBoundingClientRect();
    if (rect.top > window.innerHeight || rect.bottom < 0) return;
    if (e.key === 'ArrowLeft') goTo(current - 1);
    if (e.key === 'ArrowRight') goTo(current + 1);
  });

  // Initial cursor
  track.style.cursor = 'grab';

  render();
})();


// ── Why Choose Us — Horizontal Accordion ──────────────────
(function () {
  const cards = Array.from(document.querySelectorAll('.why-card'));

  function activate(index) {
    cards.forEach((card, i) => {
      card.classList.toggle('why-active', i === index);
    });
  }

  cards.forEach((card, i) => {
    card.addEventListener('click', () => activate(i));
  });
})();