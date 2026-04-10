/* ── DATA ── */
  const slides = [
    { eyebrow: "TRAVEL PARTNER KANNELIYA", title: "Explore The Hidden<br>Gems Of The<br>Rainforest" },
    { eyebrow: "NATURE AWAITS YOU",        title: "Breathe In The<br>Magic Of Ancient<br>Forests" },
    { eyebrow: "WILDLIFE SANCTUARY",       title: "Journey Into The<br>Heart Of Sri<br>Lanka's Jungle" },
    { eyebrow: "ESCAPE THE ORDINARY",      title: "Find Your Peace<br>Among The Trees<br>And Rivers" },
  ];
 
  let current = 0;
  let transitioning = false;
  let timer;
 
  /* ── HEADER SCROLL ── */
  window.addEventListener('scroll', () => {
    document.getElementById('header').classList.toggle('scrolled', window.scrollY > 40);
  });
 
  /* ── MOBILE MENU ── */
  function toggleMenu() {
    const nav = document.getElementById('mobileNav');
    const ham = document.getElementById('hamburger');
    nav.classList.toggle('open');
    ham.classList.toggle('open');
  }
 
  /* ── SLIDE LOGIC ── */
  function goTo(idx) {
    if (transitioning || idx === current) return;
    transitioning = true;
    clearInterval(timer);
 
    const prevIdx = current;
    const imgs = document.querySelectorAll('.hero-bg-img');
    const items = document.querySelectorAll('.hero-counter-item');
    const eyebrow = document.getElementById('eyebrow');
    const title = document.getElementById('heroTitle');
 
    // Out animations for text
    eyebrow.classList.remove('show');
    title.classList.remove('show');
 
    // Exit old image (slide up)
    imgs[prevIdx].classList.remove('active');
    imgs[prevIdx].classList.add('exit');
 
    setTimeout(() => {
      // Clean exit class
      imgs[prevIdx].classList.remove('exit');
 
      // Switch slide
      current = idx;
      imgs[current].classList.add('active');
 
      // Update counter
      items[prevIdx].classList.remove('active');
      items[current].classList.add('active');
 
      // Reset fill animations by cloning
      const fills = document.querySelectorAll('.hero-counter-fill');
      fills.forEach(f => {
        const clone = f.cloneNode(true);
        f.parentNode.replaceChild(clone, f);
      });
 
      // Update text
      eyebrow.innerHTML = slides[current].eyebrow;
      title.innerHTML = slides[current].title;
 
      setTimeout(() => {
        eyebrow.classList.add('show');
        title.classList.add('show');
        transitioning = false;
        startTimer();
      }, 60);
 
    }, 900);
  }
 
  function startTimer() {
    clearInterval(timer);
    timer = setInterval(() => goTo((current + 1) % 4), 5500);
  }
 
  startTimer();



   // Intersection Observer for scroll-triggered animations
  const targets = [
    'eyebrow','heading',
    'imgTop','imgMain','imgBtm','exploreBtn',
    'txt1','txt2','txt3'
  ];
 
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        observer.unobserve(e.target);
      }
    });
  }, { threshold: 0.15 });
 
  targets.forEach(id => {
    const el = document.getElementById(id);
    if (el) observer.observe(el);
  });
 
  // Trigger immediately if already in view on load
  window.addEventListener('load', () => {
    targets.forEach(id => {
      const el = document.getElementById(id);
      if (!el) return;
      const rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight) el.classList.add('visible');
    });
  });