// ============================================================
// kanneliya.js — Kanneliya Page Scripts
// ============================================================

// ── Scroll Reveal ─────────────────────────────────────────
(function () {
    const revealEls = document.querySelectorAll('.reveal');
    const revealIO = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                revealIO.unobserve(e.target);
            }
        });
    }, { threshold: 0.1 });
    revealEls.forEach(el => revealIO.observe(el));
})();


// ── Attraction 1 Lightbox ─────────────────────────────────
(function () {
    const imgs = document.querySelectorAll('#attraction-final .attraction-final-img');
    const lightbox = document.getElementById('attractionFinalLightbox');
    const lbImg = document.getElementById('attractionFinalLightboxImg');
    const lbCaption = document.getElementById('attractionFinalCaption');
    const lbClose = document.getElementById('attractionFinalClose');
    const lbPrev = document.getElementById('attractionFinalPrev');
    const lbNext = document.getElementById('attractionFinalNext');

    let currentIdx = 0;
    const imgData = Array.from(imgs).map(item => ({
        src: item.querySelector('img').src,
        alt: item.querySelector('img').alt
    }));

    function openLightbox(index) {
        currentIdx = index;
        updateLightbox();
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('open');
        document.body.style.overflow = '';
        setTimeout(() => { lbImg.src = ''; }, 350);
    }

    function updateLightbox() {
        lbImg.src = imgData[currentIdx].src;
        lbImg.alt = imgData[currentIdx].alt;
        lbCaption.textContent = imgData[currentIdx].alt;
    }

    function showPrev() {
        currentIdx = (currentIdx - 1 + imgData.length) % imgData.length;
        updateLightbox();
    }

    function showNext() {
        currentIdx = (currentIdx + 1) % imgData.length;
        updateLightbox();
    }

    imgs.forEach((item, i) => item.addEventListener('click', () => openLightbox(i)));
    lbClose.addEventListener('click', closeLightbox);
    lbPrev.addEventListener('click', showPrev);
    lbNext.addEventListener('click', showNext);

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('open')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') showPrev();
        if (e.key === 'ArrowRight') showNext();
    });
})();


// ── Attraction 2 Lightbox ─────────────────────────────────
(function () {
    const imgs = document.querySelectorAll('[data-lb="2"]');
    const lightbox = document.getElementById('attractionLightbox2');
    const lbImg = document.getElementById('attractionLightboxImg2');
    const lbCaption = document.getElementById('attractionCaption2');
    const lbClose = document.getElementById('attractionClose2');
    const lbPrev = document.getElementById('attractionPrev2');
    const lbNext = document.getElementById('attractionNext2');

    let currentIdx = 0;
    const imgData = Array.from(imgs).map(item => ({
        src: item.querySelector('img').src,
        alt: item.querySelector('img').alt
    }));

    function openLightbox(index) {
        currentIdx = index;
        updateLightbox();
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('open');
        document.body.style.overflow = '';
        setTimeout(() => { lbImg.src = ''; }, 350);
    }

    function updateLightbox() {
        lbImg.src = imgData[currentIdx].src;
        lbImg.alt = imgData[currentIdx].alt;
        lbCaption.textContent = imgData[currentIdx].alt;
    }

    function showPrev() {
        currentIdx = (currentIdx - 1 + imgData.length) % imgData.length;
        updateLightbox();
    }

    function showNext() {
        currentIdx = (currentIdx + 1) % imgData.length;
        updateLightbox();
    }

    imgs.forEach((item, i) => item.addEventListener('click', () => openLightbox(i)));
    lbClose.addEventListener('click', closeLightbox);
    lbPrev.addEventListener('click', showPrev);
    lbNext.addEventListener('click', showNext);

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('open')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') showPrev();
        if (e.key === 'ArrowRight') showNext();
    });
})();


// ── Destinations Lightbox ─────────────────────────────────
(function () {
    const cards = document.querySelectorAll('.destination-card');
    const lightbox = document.getElementById('destinationsLightbox');
    const lbImg = document.getElementById('destinationsLightboxImg');
    const lbCaption = document.getElementById('destinationsCaption');
    const lbClose = document.getElementById('destinationsClose');
    const lbPrev = document.getElementById('destinationsPrev');
    const lbNext = document.getElementById('destinationsNext');

    let currentIdx = 0;
    const imgData = Array.from(cards).map(item => ({
        src: item.querySelector('img').src,
        alt: item.querySelector('img').alt
    }));

    function openLightbox(index) {
        currentIdx = index;
        updateLightbox();
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('open');
        document.body.style.overflow = '';
        setTimeout(() => { lbImg.src = ''; }, 350);
    }

    function updateLightbox() {
        lbImg.src = imgData[currentIdx].src;
        lbImg.alt = imgData[currentIdx].alt;
        lbCaption.textContent = imgData[currentIdx].alt;
    }

    function showPrev() {
        currentIdx = (currentIdx - 1 + imgData.length) % imgData.length;
        updateLightbox();
    }

    function showNext() {
        currentIdx = (currentIdx + 1) % imgData.length;
        updateLightbox();
    }

    cards.forEach((item, i) => item.addEventListener('click', () => openLightbox(i)));
    lbClose.addEventListener('click', closeLightbox);
    lbPrev.addEventListener('click', showPrev);
    lbNext.addEventListener('click', showNext);

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('open')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') showPrev();
        if (e.key === 'ArrowRight') showNext();
    });
})();