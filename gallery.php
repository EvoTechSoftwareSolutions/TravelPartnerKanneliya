<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Partner Kanneliya</title>

    <link rel="icon" href="_resource/img/logo.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/gallery.css">
</head>

<body>

    <!-- ── Header (reused) ── -->
    <?php include 'includes/header.php'; ?>

    <!-- ================================================
       BANNER SECTION
  ================================================ -->
    <section class="page-banner" id="packages-banner">

        <!-- Background image -->
        <div class="banner-bg">
            <img src="https://images.unsplash.com/photo-1586348943529-beaae6c28db9?w=1920&q=85"
                alt="Kanneliya Packages" />
        </div>

        <!-- Overlay -->
        <div class="banner-overlay"></div>

        <!-- Bottom-left content -->
        <div class="banner-content">
            <div class="banner-eyebrow">
                <span class="banner-eyebrow-line"></span>
                <span class="banner-eyebrow-label">Gallery</span>
            </div>
            <h1 class="banner-title">
                Explore Our Gallery
            </h1>
        </div>

        <!-- Right side scroll indicator -->
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
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>

            <div class="gallery-grid reveal">
                <!-- Image 1 - Large -->
                <div class="gallery-item" data-index="0">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80" alt="Mountain landscape" loading="lazy" />
                    <div class="gallery-item-overlay">
                        <div class="gallery-expand-icon">
                            <svg viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                <line x1="11" y1="8" x2="11" y2="14" />
                                <line x1="8" y1="11" x2="14" y2="11" />
                            </svg>
                        </div>
                        <span class="gallery-item-title">Mountain View</span>
                    </div>
                </div>

                <!-- Image 2 -->
                <div class="gallery-item" data-index="1">
                    <img src="https://images.unsplash.com/photo-1432405972618-c60b0225b8f9?w=800&q=80" alt="Waterfall" loading="lazy" />
                    <div class="gallery-item-overlay">
                        <div class="gallery-expand-icon">
                            <svg viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                <line x1="11" y1="8" x2="11" y2="14" />
                                <line x1="8" y1="11" x2="14" y2="11" />
                            </svg>
                        </div>
                        <span class="gallery-item-title">Waterfall</span>
                    </div>
                </div>

                <!-- Image 3 -->
                <div class="gallery-item" data-index="2">
                    <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=800&q=80" alt="Hills" loading="lazy" />
                    <div class="gallery-item-overlay">
                        <div class="gallery-expand-icon">
                            <svg viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                <line x1="11" y1="8" x2="11" y2="14" />
                                <line x1="8" y1="11" x2="14" y2="11" />
                            </svg>
                        </div>
                        <span class="gallery-item-title">Green Hills</span>
                    </div>
                </div>

                <!-- Image 4 - Wide -->
                <div class="gallery-item" data-index="3">
                    <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?w=800&q=80" alt="Tea plantation" loading="lazy" />
                    <div class="gallery-item-overlay">
                        <div class="gallery-expand-icon">
                            <svg viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                <line x1="11" y1="8" x2="11" y2="14" />
                                <line x1="8" y1="11" x2="14" y2="11" />
                            </svg>
                        </div>
                        <span class="gallery-item-title">Tea Plantation</span>
                    </div>
                </div>

                <!-- Add more images as needed -->
            </div>
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
    <?php include 'includes/footer.php'; ?>

    <script src="js/header.js"></script>
    <script src="js/gallery.js"></script>
    <script src="js/footer.js"></script>

</body>

</html>