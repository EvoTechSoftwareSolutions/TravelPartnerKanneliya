<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Partner Kanneliya</title>

    <link rel="icon" href="/_resource/img/logo.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/header/header.css">
    <link rel="stylesheet" href="/footer/footer.css">
    <link rel="stylesheet" href="/gallery/gallery.css">
</head>

<body>

    <!-- ── Header (reused) ── -->
    <?php include '../header/header.php'; ?>

    <!-- ================================================
       BANNER SECTION
  ================================================ -->
    <section class="page-banner" id="packages-banner">

        <div class="banner-bg">
            <img src="https://images.unsplash.com/photo-1565118531796-763e5082d113?w=1920&q=85"
                alt="Kanneliya Packages" />
        </div>

        <div class="banner-overlay"></div>

        <div class="banner-content">
            <div class="banner-eyebrow">
                <span class="banner-eyebrow-line"></span>
                <span class="banner-eyebrow-label">Gallery</span>
            </div>
            <h1 class="banner-title">
                Explore Our Gallery
            </h1>
        </div>

        <div class="banner-scroll-indicator">
            <div class="scroll-line"></div>
            <span class="scroll-text">Scroll Down</span>
        </div>

    </section>

    <!-- ================================================
       GALLERY SECTION
    ================================================ -->
    <section class="gallery-section" id="gallery">
        <div class="gallery-inner">

            <div class="gallery-heading-wrap reveal">
                <div class="gallery-eyebrow">
                    <span class="gallery-eyebrow-line"></span>
                    <span class="gallery-eyebrow-label">Gallery</span>
                    <span class="gallery-eyebrow-line"></span>
                </div>
                <h2 class="gallery-heading">Moments from Kanneliya</h2>
            </div>

            <p class="gallery-desc reveal">
                Explore a collection of moments captured during our journeys through nature. From lush greenery to serene landscapes, each image reflects the beauty and experiences that await you.
            </p>

            <!-- JS builds all items here — no hardcoded divs needed -->
            <div class="gallery-grid reveal"></div>

        </div>
    </section>

    <!-- Lightbox -->
    <div class="gallery-lightbox" id="galleryLightbox" role="dialog" aria-modal="true">
        <div class="gallery-lightbox-backdrop" id="galleryBackdrop"></div>
        <div class="gallery-lightbox-content">
            <button class="gallery-lightbox-close" id="galleryClose" aria-label="Close">
                <svg viewBox="0 0 24 24">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
            <button class="gallery-lightbox-nav gallery-lightbox-prev" id="galleryPrev" aria-label="Previous">
                <svg viewBox="0 0 24 24">
                    <polyline points="15 18 9 12 15 6" />
                </svg>
            </button>
            <img id="galleryLightboxImg" src="" alt="Gallery image" />
            <button class="gallery-lightbox-nav gallery-lightbox-next" id="galleryNext" aria-label="Next">
                <svg viewBox="0 0 24 24">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </button>
            <div class="gallery-lightbox-info">
                <div class="gallery-lightbox-title" id="galleryTitle"></div>
                <span class="gallery-lightbox-counter" id="galleryCounter"></span>
            </div>
        </div>
    </div>

    <!-- ── Footer ── -->
    <?php include '../footer/footer.php'; ?>

    <script src="/header/header.js"></script>
    <script src="/gallery/gallery.js"></script>
    <script src="/footer/footer.js"></script>

</body>

</html>