<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/hero.css">
</head>
<body>
  
<section class="hero" id="home">

  <!-- Background Slider (vertical scroll images) -->
  <div class="hero-slider" id="heroSlider">
    <div class="slide active" data-index="0">
      <img 
        src="https://images.unsplash.com/photo-1586348943529-beaae6c28db9?w=1920&q=85" 
        alt="Kanneliya Forest 1" 
        class="slide-img"
      />
    </div>
    <div class="slide" data-index="1">
      <img 
        src="https://images.unsplash.com/photo-1565118531796-763e5082d113?w=1920&q=85" 
        alt="Kanneliya Forest 2"
        class="slide-img"
      />
    </div>
    <div class="slide" data-index="2">
      <img 
        src="https://images.unsplash.com/photo-1542401886-65d6c61db217?w=1920&q=85" 
        alt="Kanneliya Forest 3"
        class="slide-img"
      />
    </div>
    <div class="slide" data-index="3">
      <img 
        src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=1920&q=85" 
        alt="Kanneliya Forest 4"
        class="slide-img"
      />
    </div>
  </div>

  <!-- Bottom-to-top gradient overlay -->
  <div class="hero-overlay"></div>

  <!-- Social sidebar (left) -->
  <div class="hero-social">
    <span class="social-label">Follow Us</span>
    <div class="social-icons">
      <a href="https://www.facebook.com/share/1Bs3cBNbkj/?mibextid=wwXIfr" class="social-link" aria-label="Facebook" target="_blank">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
      </a>
      <a href="#" class="social-link" aria-label="Instagram">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
      </a>
      <a href="https://www.tiktok.com/@travelpartnerkanneliya?_r=1&_t=ZS-92JbmMsXzKm" class="social-link" aria-label="TikTok" target="_blank">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.7a8.18 8.18 0 004.77 1.52V6.77a4.85 4.85 0 01-1-.08z"/></svg>
      </a>
    </div>
  </div>

  <!-- Main hero content -->
  <div class="hero-content">
    <div class="hero-eyebrow">
      <span class="eyebrow-line"></span>
      <span class="eyebrow-text">Travel Partner Kanneliya</span>
    </div>
    <h1 class="hero-title" id="heroTitle">
      <!-- Text is injected by JS for per-slide content -->
    </h1>
  </div>

  <!-- Vertical slide counter (right) -->
  <div class="hero-counter" id="heroCounter">
    <div class="counter-track">
      <span class="counter-item" data-num="01">0.1</span>
      <span class="counter-item" data-num="02">0.2</span>
      <span class="counter-item" data-num="03">0.3</span>
      <span class="counter-item" data-num="04">0.4</span>
    </div>
    <div class="counter-bar">
      <div class="counter-bar-fill" id="counterBarFill"></div>
    </div>
  </div>

  <!-- Mouse scroll indicator (bottom center) -->
  <div class="mouse-indicator">
    <div class="mouse-icon">
      <div class="mouse-wheel"></div>
    </div>
    <div class="mouse-tail"></div>
  </div>

</section>

<script src="../js/hero.js"></script>

</body>
</html>




