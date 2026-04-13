// Gallery Lightbox functionality
    const galleryItems = document.querySelectorAll('.gallery-item');
    const lightbox = document.getElementById('galleryLightbox');
    const lbImg = document.getElementById('galleryLightboxImg');
    const lbTitle = document.getElementById('galleryTitle');
    const lbCounter = document.getElementById('galleryCounter');
    const lbClose = document.getElementById('galleryClose');
    const lbBackdrop = document.getElementById('galleryBackdrop');
    const lbPrev = document.getElementById('galleryPrev');
    const lbNext = document.getElementById('galleryNext');

    let currentIdx = 0;
    const imgData = Array.from(galleryItems).map(item => ({
        src: item.querySelector('img').src,
        alt: item.querySelector('img').alt,
        title: item.querySelector('.gallery-item-title')?.textContent || ''
    }));

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
        lbImg.src = imgData[currentIdx].src;
        lbImg.alt = imgData[currentIdx].alt;
        lbTitle.textContent = imgData[currentIdx].title;
        lbCounter.textContent = (currentIdx + 1) + ' / ' + imgData.length;
    }

    galleryItems.forEach((item, i) => item.addEventListener('click', () => openLB(i)));
    lbClose.addEventListener('click', closeLB);
    lbBackdrop.addEventListener('click', closeLB);
    lbPrev.addEventListener('click', e => { e.stopPropagation(); currentIdx = (currentIdx - 1 + imgData.length) % imgData.length; updateLB(); });
    lbNext.addEventListener('click', e => { e.stopPropagation(); currentIdx = (currentIdx + 1) % imgData.length; updateLB(); });
    document.addEventListener('keydown', e => {
        if (!lightbox.classList.contains('active')) return;
        if (e.key === 'Escape') closeLB();
        if (e.key === 'ArrowLeft') { currentIdx = (currentIdx - 1 + imgData.length) % imgData.length; updateLB(); }
        if (e.key === 'ArrowRight') { currentIdx = (currentIdx + 1) % imgData.length; updateLB(); }
    });