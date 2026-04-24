<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Jost:wght@300;400;500&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="../css/header.css">
</head>

<body>

  <header class="site-header" id="siteHeader">

    <!-- Logo -->
    <a href="index.php" class="header-logo">
      <!-- <div class="logo-circle">
        <svg viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="30" cy="30" r="28" stroke="#4ecdc4" stroke-width="1.5" />
          <path d="M30 12 C20 18 15 26 20 32 C24 37 28 34 30 30 C32 26 30 20 30 12Z" fill="#4ecdc4" opacity="0.8" />
          <path d="M30 12 C40 18 45 26 40 32 C36 37 32 34 30 30 C28 26 30 20 30 12Z" fill="#4ecdc4" opacity="0.5" />
          <ellipse cx="30" cy="36" rx="10" ry="5" fill="#4ecdc4" opacity="0.6" />
          <line x1="10" y1="44" x2="50" y2="44" stroke="#4ecdc4" stroke-width="1" opacity="0.5" />
        </svg>
      </div> -->
      <img src="_resource/img/logo.png" alt="Kanneliya Logo" class="logo-image">

      <div class="logo-text">
        <span class="logo-main">Kanneliya</span>
        <span class="logo-sub">TRAVEL PARTNER</span>
      </div>
    </a>

    <!-- Desktop Nav -->
    <nav class="header-nav">
      <a href="index.php" class="nav-link active">Home</a>
      <a href="packages.php" class="nav-link">Packages</a>
      <a href="about.php" class="nav-link">About</a>
      <a href="kanneliya.php" class="nav-link">Kanneliya</a>
      <a href="gallery.php" class="nav-link">Gallery</a>
      <a href="about.php#contact" class="nav-link">Contact</a>
    </nav>

    <!-- Right side controls -->
    <div class="header-cta">
      <!-- Desktop Call Us -->
      <a href="about.php#contact" class="cta-btn">Call Us</a>

      <!-- Mobile: Call Now (left of hamburger) -->
      <a href="about.php#contact" class="mobile-call-btn">Call Us</a>

      <!-- Hamburger -->
      <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
        <span></span><span></span><span></span>
      </button>
    </div>

  </header>

  <!-- Overlay — outside <header> -->
  <div class="panel-overlay" id="panelOverlay"></div>

  <!-- Slide Panel — outside <header> -->
  <nav class="slide-panel" id="slidePanel">

    <!-- Panel top bar -->
    <div class="slide-panel-header">
      <a href="index.php" class="slide-panel-logo">
        <!-- <div class="logo-circle">
          <svg viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="30" cy="30" r="28" stroke="#4ecdc4" stroke-width="1.5" />
            <path d="M30 12 C20 18 15 26 20 32 C24 37 28 34 30 30 C32 26 30 20 30 12Z" fill="#4ecdc4" opacity="0.8" />
            <path d="M30 12 C40 18 45 26 40 32 C36 37 32 34 30 30 C28 26 30 20 30 12Z" fill="#4ecdc4" opacity="0.5" />
            <ellipse cx="30" cy="36" rx="10" ry="5" fill="#4ecdc4" opacity="0.6" />
            <line x1="10" y1="44" x2="50" y2="44" stroke="#4ecdc4" stroke-width="1" opacity="0.5" />
          </svg>
        </div> -->
        <img src="_resource/img/logo.png" alt="Kanneliya Logo" class="logo-image">

        <div class="logo-text">
          <span class="logo-main">Kanneliya</span>
          <span class="logo-sub">TRAVEL PARTNER</span>
        </div>
      </a>
      <button class="slide-panel-close" id="panelClose" aria-label="Close Menu">
        <svg viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18" />
          <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </button>
    </div>

    <!-- Nav links -->
    <div class="slide-panel-nav">
      <a href="index.php" class="slide-panel-link">Home</a>
      <a href="packages.php" class="slide-panel-link">Packages</a>
      <a href="about.php" class="slide-panel-link">About</a>
      <a href="kanneliya.php" class="slide-panel-link">Kanneliya</a>
      <a href="gallery.php" class="slide-panel-link">Gallery</a>
      <a href="about.php#contact" class="slide-panel-link">Contact</a>
      <a href="about.php#contact" class="slide-panel-cta">Call Us</a>
    </div>

  </nav>

  <script src="../js/header.js"></script>

</body>

</html>