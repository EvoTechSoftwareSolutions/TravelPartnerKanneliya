// Attraction Final Lightbox functionality
    const attractionFinalImgs = document.querySelectorAll('.attraction-final-img');
    const attractionFinalLightbox = document.getElementById('attractionFinalLightbox');
    const attractionFinalLbImg = document.getElementById('attractionFinalLightboxImg');
    const attractionFinalLbCounter = document.getElementById('attractionFinalCounter');
    const attractionFinalLbClose = document.getElementById('attractionFinalClose');
    const attractionFinalLbBackdrop = document.getElementById('attractionFinalBackdrop');
    const attractionFinalLbPrev = document.getElementById('attractionFinalPrev');
    const attractionFinalLbNext = document.getElementById('attractionFinalNext');

    let attractionFinalCurrentIdx = 0;
    const attractionFinalImgData = Array.from(attractionFinalImgs).map(item => ({
        src: item.querySelector('img').src,
        alt: item.querySelector('img').alt
    }));

    function openAttractionFinalLB(index) {
        attractionFinalCurrentIdx = index;
        updateAttractionFinalLB();
        attractionFinalLightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeAttractionFinalLB() {
        attractionFinalLightbox.classList.remove('active');
        document.body.style.overflow = '';
    }

    function updateAttractionFinalLB() {
        attractionFinalLbImg.src = attractionFinalImgData[attractionFinalCurrentIdx].src;
        attractionFinalLbImg.alt = attractionFinalImgData[attractionFinalCurrentIdx].alt;
        attractionFinalLbCounter.textContent = (attractionFinalCurrentIdx + 1) + ' / ' + attractionFinalImgData.length;
    }

    attractionFinalImgs.forEach((item, i) => item.addEventListener('click', () => openAttractionFinalLB(i)));
    attractionFinalLbClose.addEventListener('click', closeAttractionFinalLB);
    attractionFinalLbBackdrop.addEventListener('click', closeAttractionFinalLB);
    attractionFinalLbPrev.addEventListener('click', e => {
        e.stopPropagation();
        attractionFinalCurrentIdx = (attractionFinalCurrentIdx - 1 + attractionFinalImgData.length) % attractionFinalImgData.length;
        updateAttractionFinalLB();
    });
    attractionFinalLbNext.addEventListener('click', e => {
        e.stopPropagation();
        attractionFinalCurrentIdx = (attractionFinalCurrentIdx + 1) % attractionFinalImgData.length;
        updateAttractionFinalLB();
    });
    document.addEventListener('keydown', e => {
        if (!attractionFinalLightbox.classList.contains('active')) return;
        if (e.key === 'Escape') closeAttractionFinalLB();
        if (e.key === 'ArrowLeft') {
            attractionFinalCurrentIdx = (attractionFinalCurrentIdx - 1 + attractionFinalImgData.length) % attractionFinalImgData.length;
            updateAttractionFinalLB();
        }
        if (e.key === 'ArrowRight') {
            attractionFinalCurrentIdx = (attractionFinalCurrentIdx + 1) % attractionFinalImgData.length;
            updateAttractionFinalLB();
        }
    });


    const lb2Imgs = document.querySelectorAll('[data-lb="2"]');
    const lb2 = document.getElementById('attractionLightbox2');
    const lb2Img = document.getElementById('attractionLightboxImg2');
    const lb2Counter = document.getElementById('attractionCounter2');
    const lb2Close = document.getElementById('attractionClose2');
    const lb2Backdrop = document.getElementById('attractionBackdrop2');
    const lb2Prev = document.getElementById('attractionPrev2');
    const lb2Next = document.getElementById('attractionNext2');
    let lb2Idx = 0;
    const lb2Data = Array.from(lb2Imgs).map(item => ({ src: item.querySelector('img').src, alt: item.querySelector('img').alt }));
    function openLb2(index) { lb2Idx = index; updateLb2(); lb2.classList.add('active'); document.body.style.overflow = 'hidden'; }
    function closeLb2() { lb2.classList.remove('active'); document.body.style.overflow = ''; }
    function updateLb2() { lb2Img.src = lb2Data[lb2Idx].src; lb2Img.alt = lb2Data[lb2Idx].alt; lb2Counter.textContent = (lb2Idx + 1) + ' / ' + lb2Data.length; }
    lb2Imgs.forEach((item, i) => item.addEventListener('click', () => openLb2(i)));
    lb2Close.addEventListener('click', closeLb2);
    lb2Backdrop.addEventListener('click', closeLb2);
    lb2Prev.addEventListener('click', e => { e.stopPropagation(); lb2Idx = (lb2Idx - 1 + lb2Data.length) % lb2Data.length; updateLb2(); });
    lb2Next.addEventListener('click', e => { e.stopPropagation(); lb2Idx = (lb2Idx + 1) % lb2Data.length; updateLb2(); });
    document.addEventListener('keydown', e => {
        if (!lb2.classList.contains('active')) return;
        if (e.key === 'Escape') closeLb2();
        if (e.key === 'ArrowLeft') { lb2Idx = (lb2Idx - 1 + lb2Data.length) % lb2Data.length; updateLb2(); }
        if (e.key === 'ArrowRight') { lb2Idx = (lb2Idx + 1) % lb2Data.length; updateLb2(); }
    });



    // Destinations Lightbox functionality
    const destinationCards = document.querySelectorAll('.destination-card');
    const destinationsLightbox = document.getElementById('destinationsLightbox');
    const destinationsLbImg = document.getElementById('destinationsLightboxImg');
    const destinationsLbCounter = document.getElementById('destinationsCounter');
    const destinationsLbClose = document.getElementById('destinationsClose');
    const destinationsLbBackdrop = document.getElementById('destinationsBackdrop');
    const destinationsLbPrev = document.getElementById('destinationsPrev');
    const destinationsLbNext = document.getElementById('destinationsNext');

    let destinationsCurrentIdx = 0;
    const destinationsImgData = Array.from(destinationCards).map(item => ({
        src: item.querySelector('img').src,
        alt: item.querySelector('img').alt
    }));

    function openDestinationsLB(index) {
        destinationsCurrentIdx = index;
        updateDestinationsLB();
        destinationsLightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeDestinationsLB() {
        destinationsLightbox.classList.remove('active');
        document.body.style.overflow = '';
    }

    function updateDestinationsLB() {
        destinationsLbImg.src = destinationsImgData[destinationsCurrentIdx].src;
        destinationsLbImg.alt = destinationsImgData[destinationsCurrentIdx].alt;
        destinationsLbCounter.textContent = (destinationsCurrentIdx + 1) + ' / ' + destinationsImgData.length;
    }

    destinationCards.forEach((item, i) => item.addEventListener('click', () => openDestinationsLB(i)));
    destinationsLbClose.addEventListener('click', closeDestinationsLB);
    destinationsLbBackdrop.addEventListener('click', closeDestinationsLB);
    destinationsLbPrev.addEventListener('click', e => { e.stopPropagation(); destinationsCurrentIdx = (destinationsCurrentIdx - 1 + destinationsImgData.length) % destinationsImgData.length; updateDestinationsLB(); });
    destinationsLbNext.addEventListener('click', e => { e.stopPropagation(); destinationsCurrentIdx = (destinationsCurrentIdx + 1) % destinationsImgData.length; updateDestinationsLB(); });
    document.addEventListener('keydown', e => {
        if (!destinationsLightbox.classList.contains('active')) return;
        if (e.key === 'Escape') closeDestinationsLB();
        if (e.key === 'ArrowLeft') { destinationsCurrentIdx = (destinationsCurrentIdx - 1 + destinationsImgData.length) % destinationsImgData.length; updateDestinationsLB(); }
        if (e.key === 'ArrowRight') { destinationsCurrentIdx = (destinationsCurrentIdx + 1) % destinationsImgData.length; updateDestinationsLB(); }
    });