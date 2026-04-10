// Hero Slider Functionality
const slides = document.querySelectorAll('.slide');
const navItems = document.querySelectorAll('.nav-item');
let currentSlide = 0;
let slideInterval;

function goToSlide(index) {
    // Remove active class from current slide
    slides[currentSlide].classList.remove('active');
    slides[currentSlide].classList.add('prev');

    // Update current slide
    currentSlide = index;

    if (currentSlide >= slides.length) {
        currentSlide = 0;
    } else if (currentSlide < 0) {
        currentSlide = slides.length - 1;
    }

    // Add active class to new slide
    slides[currentSlide].classList.remove('prev');
    slides[currentSlide].classList.add('active');

    // Update navigation
    updateNavigation();
}

function updateNavigation() {
    navItems.forEach((item, index) => {
        if (index === currentSlide) {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    });
}

function nextSlide() {
    goToSlide(currentSlide + 1);
}

// Auto slide every 5 seconds
function startSlideShow() {
    slideInterval = setInterval(nextSlide, 5000);
}

function stopSlideShow() {
    clearInterval(slideInterval);
}

// Navigation click handlers
navItems.forEach((item, index) => {
    item.addEventListener('click', () => {
        stopSlideShow();
        goToSlide(index);
        startSlideShow();
    });
});

// Start slideshow
startSlideShow();

// Pause on hover
const heroSection = document.querySelector('.hero-section');
heroSection.addEventListener('mouseenter', stopSlideShow);
heroSection.addEventListener('mouseleave', startSlideShow);

// Keyboard navigation
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
        stopSlideShow();
        nextSlide();
        startSlideShow();
    } else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
        stopSlideShow();
        goToSlide(currentSlide - 1);
        startSlideShow();
    }
});