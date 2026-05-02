/* ============================================================
   GALLERY — Dynamic Masonry + Lightbox
   To add images: just add entries to the IMAGES array below.
   No HTML changes needed.
   ============================================================ */

const IMAGES = [
    { src: '_resource/img/gallery/56.jpeg', alt: 'Kanneliya Forest' },
    { src: '_resource/img/gallery/1.jpg',   alt: 'Waterfall' },
    { src: '_resource/img/gallery/2.jpg',   alt: 'Hills' },
    { src: '_resource/img/gallery/3.jpg',   alt: 'Tea Plantation' },
    // Add more images here:
    { src: '_resource/img/gallery/4.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/5.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/6.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/7.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/8.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/9.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/10.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/11.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/12.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/13.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/14.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/15.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/16.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/17.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/18.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/19.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/20.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/21.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/22.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/23.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/24.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/25.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/26.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/27.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/28.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/29.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/30.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/31.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/32.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/33.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/34.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/35.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/36.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/37.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/38.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/39.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/40.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/41.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/42.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/43.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/44.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/45.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/46.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/47.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/48.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/49.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/50.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/51.jpg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/52.jpeg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/53.jpeg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/54.jpeg', alt: 'Sunrise' },
    { src: '_resource/img/gallery/55.jpeg', alt: 'Sunrise' },
    //{ src: '_resource/img/gallery/57.jpeg', alt: 'River' },
];

/* ── Masonry span patterns (repeats for any image count) ──
   Each entry = [colSpan, rowSpan] for desktop 3-col grid.
   Pattern repeats every 7 items.                         */
const SPAN_PATTERN = [
    [1, 2],   // large left
    [1, 1],   // top middle
    [1, 1],   // top right
    [2, 1],   // wide bottom
    [1, 1],   // small
    [1, 1],   // small
    [1, 1],   // small
];

/* ── Build gallery grid ── */
function buildGallery() {
    const grid = document.querySelector('.gallery-grid');
    if (!grid) return;

    grid.innerHTML = '';

    IMAGES.forEach((img, i) => {
        const pattern = SPAN_PATTERN[i % SPAN_PATTERN.length];
        const colSpan = pattern[0];
        const rowSpan = pattern[1];

        const item = document.createElement('div');
        item.className = 'gallery-item';
        item.dataset.index = i;

        if (colSpan > 1) item.style.gridColumn = `span ${colSpan}`;
        if (rowSpan > 1) item.style.gridRow = `span ${rowSpan}`;

        item.innerHTML = `
            <img src="${img.src}" alt="${img.alt}" loading="lazy" />
            <div class="gallery-item-overlay">
                <div class="gallery-expand-icon">
                    <svg viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        <line x1="11" y1="8" x2="11" y2="14"/>
                        <line x1="8" y1="11" x2="14" y2="11"/>
                    </svg>
                </div>
                <span class="gallery-item-title">${img.alt}</span>
            </div>`;

        item.addEventListener('click', () => openLB(i));
        grid.appendChild(item);
    });
}

/* ── Lightbox ── */
const lightbox   = document.getElementById('galleryLightbox');
const lbImg      = document.getElementById('galleryLightboxImg');
const lbCounter  = document.getElementById('galleryCounter');
const lbClose    = document.getElementById('galleryClose');
const lbBackdrop = document.getElementById('galleryBackdrop');
const lbPrev     = document.getElementById('galleryPrev');
const lbNext     = document.getElementById('galleryNext');

let currentIdx = 0;

function openLB(index) {
    currentIdx = index;
    updateLB();
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeLB() {
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
}

function updateLB() {
    lbImg.src = IMAGES[currentIdx].src;
    lbImg.alt = IMAGES[currentIdx].alt;
    lbCounter.textContent = `${currentIdx + 1} / ${IMAGES.length}`;
}

function prevImg(e) {
    if (e) e.stopPropagation();
    currentIdx = (currentIdx - 1 + IMAGES.length) % IMAGES.length;
    updateLB();
}

function nextImg(e) {
    if (e) e.stopPropagation();
    currentIdx = (currentIdx + 1) % IMAGES.length;
    updateLB();
}

lbClose.addEventListener('click', closeLB);
lbBackdrop.addEventListener('click', closeLB);
lbPrev.addEventListener('click', prevImg);
lbNext.addEventListener('click', nextImg);

document.addEventListener('keydown', e => {
    if (!lightbox.classList.contains('active')) return;
    if (e.key === 'Escape')     closeLB();
    if (e.key === 'ArrowLeft')  prevImg();
    if (e.key === 'ArrowRight') nextImg();
});

/* ── Touch / swipe support for lightbox ── */
let touchStartX = 0;
lightbox.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
lightbox.addEventListener('touchend', e => {
    const dx = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(dx) > 50) dx < 0 ? nextImg() : prevImg();
});

/* ── Scroll reveal ── */
function initReveal() {
    const els = document.querySelectorAll('.reveal');
    if (!els.length) return;
    const io = new IntersectionObserver(entries => {
        entries.forEach(en => {
            if (en.isIntersecting) {
                en.target.classList.add('revealed');
                io.unobserve(en.target);
            }
        });
    }, { threshold: 0.12 });
    els.forEach(el => io.observe(el));
}

/* ── Init ── */
document.addEventListener('DOMContentLoaded', () => {
    buildGallery();
    initReveal();
});