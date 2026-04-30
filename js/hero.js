// hero.js - Hero Section Logic

(function () {
  const SLIDES = [
    {
      title: "Discover The Hidden\nJewels Of Kanneliya",
      subtitle: "Where Ancient Forest Meets Modern Adventure"
    },
    {
      title: "Breathe The Mist Of\nTropical Rainforests",
      subtitle: "Untouched Wilderness Awaits You"
    },
    {
      title: "Walk Among The\nWhispering Giants",
      subtitle: "A Journey Into Nature's Heart"
    },
    {
      title: "Explore The Rivers\nOf Southern Sri Lanka",
      subtitle: "Your Story Begins In The Wild"
    }
  ];

  const DURATION = 6000; // ms per slide

  let currentSlide = 0;
  let autoTimer = null;
  let isTransitioning = false;

  const slides = document.querySelectorAll('.hero-slider .slide');
  const heroTitle = document.getElementById('heroTitle');
  const counterItems = document.querySelectorAll('.counter-item');
  const counterBarFill = document.getElementById('counterBarFill');

  function setSlide(index, direction = 'down') {
    if (isTransitioning || index === currentSlide) return;
    isTransitioning = true;

    const prevSlide = slides[currentSlide];
    const nextSlide = slides[index];

    // Fade out previous
    prevSlide.classList.remove('active');
    const prevImg = prevSlide.querySelector('.slide-img');
    prevImg.classList.remove('scrolling-down');
    prevImg.style.transform = 'translateY(0%)';

    // Fade in next
    nextSlide.classList.add('active');
    const nextImg = nextSlide.querySelector('.slide-img');
    nextImg.style.transform = 'translateY(0%)';
    nextImg.classList.remove('scrolling-down');

    // Trigger vertical scroll animation
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        nextImg.classList.add('scrolling-down');
      });
    });

    currentSlide = index;

    // Update counter
    updateCounter(index);

    // Update title
    updateTitle(SLIDES[index].title);

    setTimeout(() => {
      isTransitioning = false;
    }, 700);
  }

  function updateCounter(index) {
    counterItems.forEach((item, i) => {
      item.classList.toggle('active', i === index);
    });

    // Bar fill: 25% per slide
    const fillPct = ((index + 1) / slides.length) * 100;
    counterBarFill.style.height = fillPct + '%';
  }

  function updateTitle(text) {
    heroTitle.classList.remove('visible');
    setTimeout(() => {
      heroTitle.innerHTML = text.replace(/\n/g, '<br>');
      heroTitle.classList.add('visible');
    }, 120);
  }

  function nextSlide() {
    const next = (currentSlide + 1) % slides.length;
    setSlide(next);
  }

  function startAuto() {
    stopAuto();
    autoTimer = setInterval(nextSlide, DURATION);
  }

  function stopAuto() {
    if (autoTimer) {
      clearInterval(autoTimer);
      autoTimer = null;
    }
  }

  // Counter click
  counterItems.forEach((item, i) => {
    item.addEventListener('click', () => {
      stopAuto();
      setSlide(i);
      startAuto();
    });
  });

  // Initialize
  function init() {
    if (!slides.length) return;

    // Set first slide active
    slides[0].classList.add('active');
    const firstImg = slides[0].querySelector('.slide-img');
    firstImg.classList.add('scrolling-down');

    updateCounter(0);
    updateTitle(SLIDES[0].title);

    // Delay title entry
    setTimeout(() => {
      heroTitle.classList.add('visible');
    }, 300);

    startAuto();
  }

  // Wait for DOM
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
