// Scroll reveal
        const revealEls = document.querySelectorAll('.reveal');
        const io = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); }
            });
        }, { threshold: 0.1 });
        revealEls.forEach(el => io.observe(el));
 
        // Lightbox
        const accomItems = document.querySelectorAll('.accom-item');
        const lightbox   = document.getElementById('accomLightbox');
        const lbImg      = document.getElementById('accomLightboxImg');
        const lbCounter  = document.getElementById('accomCounter');
        const lbClose    = document.getElementById('accomClose');
        const lbBackdrop = document.getElementById('accomBackdrop');
        const lbPrev     = document.getElementById('accomPrev');
        const lbNext     = document.getElementById('accomNext');
 
        let currentIdx = 0;
        const imgData = Array.from(accomItems).map(item => ({
            src: item.querySelector('img').src,
            alt: item.querySelector('img').alt
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
            lbCounter.textContent = (currentIdx + 1) + ' / ' + imgData.length;
        }
 
        accomItems.forEach((item, i) => item.addEventListener('click', () => openLB(i)));
        lbClose.addEventListener('click', closeLB);
        lbBackdrop.addEventListener('click', closeLB);
        lbPrev.addEventListener('click', e => { e.stopPropagation(); currentIdx = (currentIdx - 1 + imgData.length) % imgData.length; updateLB(); });
        lbNext.addEventListener('click', e => { e.stopPropagation(); currentIdx = (currentIdx + 1) % imgData.length; updateLB(); });
        document.addEventListener('keydown', e => {
            if (!lightbox.classList.contains('active')) return;
            if (e.key === 'Escape') closeLB();
            if (e.key === 'ArrowLeft')  { currentIdx = (currentIdx - 1 + imgData.length) % imgData.length; updateLB(); }
            if (e.key === 'ArrowRight') { currentIdx = (currentIdx + 1) % imgData.length; updateLB(); }
        });