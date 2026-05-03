<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Travel Partner Kanneliya</title>

  <link rel="icon" href="/_resource/img/logo.png">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="/home/style.css">
  <link rel="stylesheet" href="/header/header.css">
  <link rel="stylesheet" href="/home/hero.css">
  <link rel="stylesheet" href="/footer/footer.css">
</head>

<body>

  <!-- ================================================
       HEADER
  ================================================ -->
  <?php include '../header/header.php'; ?>

  <!-- ================================================
       SECTION 01 — HERO
  ================================================ -->
  <section class="hero" id="home">

    <div class="hero-slider" id="heroSlider">
      <div class="slide active" data-index="0">
        <img src="/_resource/img/home/hero/Kanneliya-1-1 1.png" alt="Kanneliya Forest 1" class="slide-img" />
      </div>
      <div class="slide" data-index="1">
        <img src="https://images.unsplash.com/photo-1565118531796-763e5082d113?w=1920&q=85" alt="Kanneliya Forest 2" class="slide-img" />
      </div>
      <div class="slide" data-index="2">
        <img src="https://images.unsplash.com/photo-1542401886-65d6c61db217?w=1920&q=85" alt="Kanneliya Forest 3" class="slide-img" />
      </div>
      <div class="slide" data-index="3">
        <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=1920&q=85" alt="Kanneliya Forest 4" class="slide-img" />
      </div>
    </div>

    <div class="hero-overlay"></div>

    <div class="hero-social">
      <span class="social-label">Follow Us</span>
      <div class="social-icons">
        <a href="https://www.facebook.com/share/1Bs3cBNbkj/?mibextid=wwXIfr" class="social-link" aria-label="Facebook" target="_blank">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
          </svg>
        </a>
        <a href="#" class="social-link" aria-label="Instagram">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="2" y="2" width="20" height="20" rx="5" />
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" />
            <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
          </svg>
        </a>
        <a href="https://www.tiktok.com/@travelpartnerkanneliya?_r=1&_t=ZS-92JbmMsXzKm" class="social-link" aria-label="TikTok" target="_blank">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.7a8.18 8.18 0 004.77 1.52V6.77a4.85 4.85 0 01-1-.08z" />
          </svg>
        </a>
      </div>
    </div>

    <div class="hero-content">
      <div class="hero-eyebrow">
        <span class="eyebrow-line"></span>
        <span class="eyebrow-text">Travel Partner Kanneliya</span>
      </div>
      <h1 class="hero-title" id="heroTitle"></h1>
    </div>

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

    <div class="mouse-indicator">
      <div class="mouse-icon">
        <div class="mouse-wheel"></div>
      </div>
      <div class="mouse-tail"></div>
    </div>

  </section>

  <!-- ================================================
       SECTION 02 — ABOUT
  ================================================ -->
  <section class="about-section" id="about">
    <div class="about-inner">

      <!-- Left column -->
      <div class="about-left">

        <div class="about-eyebrow reveal d1">
          <span class="about-eyebrow-line"></span>
          <span class="about-eyebrow-label">About Us</span>
        </div>

        <h2 class="about-heading reveal d2">Experience Nature Better</h2>

        <div class="about-image-grid reveal-left d3">

          <!-- Top-right: behind centre -->
          <div class="about-img-box about-img-top-right">
            <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?w=800&q=80" alt="Mountain landscape" />
          </div>

          <!-- Centre main -->
          <div class="about-img-box about-img-center">
            <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=900&q=80" alt="Forest path" />
          </div>

          <!-- Bottom-left overlap -->
          <div class="about-img-box about-img-bot-left">
            <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=600&q=80" alt="Mountain fog" />
          </div>

          <button class="about-explore-btn" onclick="window.location.href='/about#about'">Explore More</button>

        </div>
      </div>

      <!-- Right column -->
      <div class="about-right">
        <p class="reveal d3">
          We are a dedicated tourism service provider specializing in unforgettable travel experiences in and around Kanneliya. With a passion for nature and a deep understanding of what travelers truly seek, we focus on delivering well-organized, comfortable, and memorable journeys for every visitor. Our goal is not just to take you to a destination, but to ensure you experience it in the most enjoyable and hassle-free way.
        </p>
        <p class="reveal d4">
          Our team is made up of experienced professionals and knowledgeable local guides who are committed to providing high-quality service from start to finish. From the moment you plan your trip with us, we assist you with everything—from tour arrangements and transportation to guided excursions and personalized recommendations. We pay attention to every detail so you can relax and fully enjoy your adventure.
        </p>
        <p class="reveal d5">
          We believe that every traveler is different. That’s why we offer flexible and customizable tour packages designed to match your preferences, schedule, and budget. Whether you’re looking for a peaceful nature escape, an adventurous trek, or a group outing, we tailor each experience to meet your expectations...
        </p>
      </div>

    </div>
  </section>

  <!-- ================================================
       SECTION 03 — DESTINATIONS
  ================================================ -->
  <section class="dest-section" id="kanneliya">
    <div class="dest-inner">

      <!--
        Grid layout (4 col × 3 row):

        Row 1: img-a  | img-b  | heading (spans col3+col4)
        Row 2: img-a  | img-b  | img-c   | img-d
        Row 3: sm(e)  | big(f) | sm(g)   | sm(h)
      -->
      <div class="dest-grid">

        <!-- Col 1 — spans row 1+2 -->
        <div class="dest-card dest-a reveal d1"
          data-name="Natural Bat's Cave"
          data-src="/_resource/img/kanneliya/batCave/1.jpg">
          <img src="/_resource/img/kanneliya/batCave/1.jpg" alt="Natural Bat's Cave" />
          <div class="dest-card-label">Natural Bat's Cave</div>
        </div>

        <!-- Col 2 — spans row 1+2 -->
        <div class="dest-card dest-b reveal d2"
          data-name="Anagimala Ella Waterfall"
          data-src="/_resource/img/kanneliya/anagimala/3.jpg">
          <img src="/_resource/img/kanneliya/anagimala/3.jpg" alt="Anagimala Ella Waterfallm" />
          <div class="dest-card-label">Anagimala Ella Waterfall</div>
        </div>

        <!-- Col 3+4 row 1 — heading spans both columns -->
        <div class="dest-heading-block reveal d1">
          <div class="dest-eyebrow">
            <span class="dest-eyebrow-line"></span>
            <span class="dest-eyebrow-label">Destinations</span>
          </div>
          <h2 class="dest-heading">Hidden Gems of Kanneliya</h2>
        </div>

        <!-- Col 3 row 2 — image-c -->
        <div class="dest-card dest-c reveal d3"
          data-name="Giant Nawada Tree"
          data-src="/_resource/img/kanneliya/tree/3.webp">
          <img src="/_resource/img/kanneliya/tree/3.webp" alt="Giant Nawada Tree" />
          <div class="dest-card-label">Giant Nawada Tree</div>
        </div>

        <!-- Col 4 row 2 — image-d -->
        <div class="dest-card dest-d reveal d4"
          data-name="Kuda Kabbale Peak"
          data-src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=1200&q=85">
          <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=800&q=80" alt="Kuda Kabbale Peak" />
          <div class="dest-card-label">Kuda Kabbale Peak</div>
        </div>

        <!-- Bottom row — sm | big | sm | sm -->
        <div class="dest-card dest-e reveal d2"
          data-name="Narangas Ella Waterfall"
          data-src="/_resource/img/kanneliya/narangas/1.webp">
          <img src="/_resource/img/kanneliya/narangas/1.webp" alt="Narangas Ella Waterfall" />
          <div class="dest-card-label">Narangas Ella Waterfall</div>
        </div>

        <div class="dest-card dest-f reveal d3"
          data-name="Maha Kabbale Peak"
          data-src="https://images.unsplash.com/photo-1518173946687-a4c8892bbd9f?w=1200&q=85">
          <img src="https://images.unsplash.com/photo-1518173946687-a4c8892bbd9f?w=800&q=80" alt="Maha Kabbale Peak" />
          <div class="dest-card-label">Maha Kabbale Peak</div>
        </div>

        <!-- <div class="dest-card dest-g reveal d4"
             data-name="Jungle Creek"
             data-src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=1200&q=85">
          <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&q=80" alt="Jungle Creek" />
          <div class="dest-card-label">Destination Name</div>
        </div>

        <div class="dest-card dest-h reveal d5"
             data-name="Deep Rainforest"
             data-src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?w=1200&q=85">
          <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?w=800&q=80" alt="Deep Rainforest" />
          <div class="dest-card-label">Destination Name</div>
        </div> -->

      </div>
    </div>
  </section>

  <!-- Lightbox -->
  <div class="dest-lightbox" id="destLightbox">
    <div class="dest-lightbox-inner">
      <button class="dest-lightbox-close" id="destLbClose" aria-label="Close">
        <svg viewBox="0 0 24 24" fill="none">
          <line x1="18" y1="6" x2="6" y2="18" />
          <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </button>
      <button class="dest-lb-arrow dest-lb-prev" id="destLbPrev" aria-label="Previous">
        <svg viewBox="0 0 24 24">
          <polyline points="15 18 9 12 15 6" />
        </svg>
      </button>
      <button class="dest-lb-arrow dest-lb-next" id="destLbNext" aria-label="Next">
        <svg viewBox="0 0 24 24">
          <polyline points="9 18 15 12 9 6" />
        </svg>
      </button>
      <img class="dest-lightbox-img" id="destLbImg" src="" alt="" />
      <div class="dest-lightbox-caption" id="destLbCaption"></div>
    </div>
  </div>

  <!-- ================================================
       SECTION 04 — PACKAGES
  ================================================ -->
  <section class="pkg-section" id="packages">
    <div class="pkg-inner">

      <!-- Heading -->
      <div class="pkg-heading-wrap reveal d1">
        <div class="pkg-eyebrow">
          <span class="pkg-eyebrow-line"></span>
          <span class="pkg-eyebrow-label">Packages</span>
          <span class="pkg-eyebrow-line"></span>
        </div>
        <h2 class="pkg-heading">Plan Your Perfect Escape</h2>
      </div>

      <!-- Carousel track -->
      <div class="pkg-carousel-wrap">
        <button class="pkg-arrow pkg-prev" id="pkgPrev" aria-label="Previous">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="15 18 9 12 15 6" />
          </svg>
        </button>
        <button class="pkg-arrow pkg-next" id="pkgNext" aria-label="Next">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="9 18 15 12 9 6" />
          </svg>
        </button>

        <div class="pkg-track" id="pkgTrack">

          <!-- Card 1 -->
          <div class="pkg-card" data-index="0">
            <div class="pkg-card-inner">
              <div class="pkg-card-notch"></div>
              <h3 class="pkg-card-title">Package 01</h3>
              <div class="pkg-plan-block">
                <h4 class="pkg-plan-title">Day out Package 01</h4>
                <div class="pkg-divider"></div>
                <ol class="pkg-list">
                  <li>Kanneliya Forest Visiting</li>
                  <li>Launch Time In Our Hotel</li>
                  <li>Natural Pool Bathing</li>
                </ol>
              </div>
              <div class="pkg-divider"></div>
              <div class="pkg-meals-block">
                <h4 class="pkg-plan-title">Package Include</h4>
                <p class="pkg-meal-type">Welcome Drink</p>
                <p class="pkg-meal-type">Breakfast</p>
                <p class="pkg-meal-type">Launch & Dessert</p>
                <p class="pkg-meal-type">Evening Snack</p>
                <!-- <ul class="pkg-meal-list">
                  <li>String Hoppers</li>
                  <li>Dhull Curry</li>
                </ul> -->
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="pkg-card" data-index="1">
            <div class="pkg-card-inner">
              <div class="pkg-card-notch"></div>
              <h3 class="pkg-card-title">Package 02</h3>
              <div class="pkg-plan-block">
                <h4 class="pkg-plan-title">Day Out Package 02</h4>
                <div class="pkg-divider"></div>
                <ol class="pkg-list">
                  <li>Kithul Experience</li>
                  <li>Kanneliya Forest Visiting</li>
                  <li>Launch Time (Place- Natural Pool Pokuna)</li>
                  <li>Forest Hermitage Visiting</li>
                </ol>
              </div>
              <div class="pkg-divider"></div>
              <div class="pkg-meals-block">
                <h4 class="pkg-plan-title">Package Include</h4>
                <p class="pkg-meal-type">Welcome Drink</p>
                <p class="pkg-meal-type">Breakfast</p>
                <p class="pkg-meal-type">Launch & Dessert</p>
                <p class="pkg-meal-type">Evening Snack</p>
                <!-- <ul class="pkg-meal-list">
                  <li>String Hoppers</li>
                  <li>Dhull Curry</li>
                  <li>Egg</li>
                  <li>Polsambola</li>
                </ul> -->
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="pkg-card" data-index="2">
            <div class="pkg-card-inner">
              <div class="pkg-card-notch"></div>
              <h3 class="pkg-card-title">Package 03</h3>
              <div class="pkg-plan-block">
                <h4 class="pkg-plan-title">Two days trip Plan 01</h4>
                <div class="pkg-divider"></div>
                <p class="pkg-meal-type">DAY 01</p>
                <ol class="pkg-list">
                  <li>Kithul Experience</li>
                  <li>Kanneliya Forest Visiting ...</li>
                </ol>
                <br/>
                <p class="pkg-meal-type">DAY 02</p>
                <ol class="pkg-list">
                  <li>Tea Factory Visiting.</li>
                  <li>Lankagama Visiting  (See 7 Water Falls) ...</li>
                </ol>
              </div>
              <div class="pkg-divider"></div>
              <div class="pkg-meals-block">
                <h4 class="pkg-plan-title">Package Include</h4>
                <p class="pkg-meal-type">Welcome Drink</p>
                <p class="pkg-meal-type">Breakfast</p>
                <p class="pkg-meal-type">Launch & Dessert ...</p>
                <!-- <ul class="pkg-meal-list">
                  <li>String Hoppers</li>
                  <li>Dhull Curry</li>
                  <li>Egg</li>
                </ul> -->
              </div>
            </div>
          </div>

          <!-- Card 4 -->
          <div class="pkg-card" data-index="3">
            <div class="pkg-card-inner">
              <div class="pkg-card-notch"></div>
              <h3 class="pkg-card-title">Package 04</h3>
              <div class="pkg-plan-block">
                <h4 class="pkg-plan-title">Two days trip Plan 02</h4>
                <div class="pkg-divider"></div>
                <p class="pkg-meal-type">DAY 01</p>
                <ol class="pkg-list">
                  <li>Kithul Experience</li>
                  <li>Kanneliya Forest Visiting ...</li>
                </ol>
                <br/>
                <p class="pkg-meal-type">DAY 02</p>
                <ol class="pkg-list">
                  <li>Visiting Galle Fort & National Maritime Museum.</li>
                  <li>Visting Rumassala ...</li>
                </ol>
              </div>
              <div class="pkg-divider"></div>
              <div class="pkg-meals-block">
                <h4 class="pkg-plan-title">Package Include</h4>
                <p class="pkg-meal-type">Welcome Drink</p>
                <p class="pkg-meal-type">Breakfast</p>
                <p class="pkg-meal-type">Launch & Dessert ...</p>
                <!-- <ul class="pkg-meal-list">
                  <li>String Hoppers</li>
                  <li>Dhull Curry</li>
                  <li>Egg</li>
                </ul> -->
              </div>
            </div>
          </div>

        </div><!-- /pkg-track -->
      </div><!-- /pkg-carousel-wrap -->

      <!-- Dot indicators -->
      <div class="pkg-dots" id="pkgDots"></div>

    </div>
  </section>
  <!-- ================================================
       SECTION 05 — WHY CHOOSE US
  ================================================ -->
  <section class="why-section" id="why">
    <div class="why-inner">

      <!-- Heading -->
      <div class="why-heading-wrap reveal d1">
        <div class="why-eyebrow">
          <span class="why-eyebrow-line"></span>
          <span class="why-eyebrow-label">Why Choose Us</span>
        </div>
        <h2 class="why-heading">Experience You Can Trust</h2>
      </div>

      <!-- Accordion cards -->
      <div class="why-cards" id="whyCards">

        <!-- Card 1 — active by default (large) -->
        <div class="why-card why-active" data-index="0">
          <img src="/_resource/img/home/why/y1.jpg" alt="Kanneliya Waterfall" />
          <div class="why-card-content">
            <h3 class="why-card-title">Unforgettable Rainforest Adventures</h3>
            <p class="why-card-text">Experience the magic of Kanneliya through expertly guided tours, hidden waterfalls, and breathtaking जंगल trails that bring you closer to nature.</p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="why-card" data-index="1">
          <img src="/_resource/img/home/why/y2.jpg" alt="Forest Path" />
          <div class="why-card-content">
            <h3 class="why-card-title">Expert Local Guides</h3>
            <p class="why-card-text">Our knowledgeable guides ensure safe, insightful, and enriching journeys through the rainforest.</p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="why-card" data-index="2">
          <img src="/_resource/img/home/why/y3.jpg" alt="Mountain View" />
          <div class="why-card-content">
            <h3 class="why-card-title">Eco-Friendly Travel</h3>
            <p class="why-card-text">We promote sustainable tourism that protects nature while supporting local communities.</p>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="why-card" data-index="3">
          <img src="/_resource/img/home/why/y4.jpg" alt="Sky & Forest" />
          <div class="why-card-content">
            <h3 class="why-card-title">Customized Experiences</h3>
            <p class="why-card-text">Enjoy flexible tour packages tailored to your interests, time, and comfort.</p>
          </div>
        </div>

        <div class="why-card" data-index="4">
          <img src="/_resource/img/home/why/y5.jpg" alt="Sky & Forest" />
          <div class="why-card-content">
            <h3 class="why-card-title">Breathtaking Locations</h3>
            <p class="why-card-text">Explore waterfalls, wildlife, and scenic viewpoints unique to Kanneliya.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ================================================
       SECTION 06 — TESTIMONIALS
  ================================================ -->
  <section class="testi-section" id="testimonials">
    <div class="testi-inner">

      <!-- Heading -->
      <div class="testi-heading-wrap reveal d1">
        <div class="testi-eyebrow">
          <span class="testi-eyebrow-line"></span>
          <span class="testi-eyebrow-label">Testimonials</span>
          <span class="testi-eyebrow-line"></span>
        </div>
        <h2 class="testi-heading">Voices of Our Happy Travellers</h2>
      </div>

      <!-- 3-column scroll grid -->
      <div class="testi-grid">

        <!-- Column 1 — scrolls top→bottom -->
        <div class="testi-col testi-col-down">
          <div class="testi-track">
            <div class="testi-card">
              <h4 class="testi-card-title">Ronny Engebretsen</h4>
              <p class="testi-card-text">Amazing place, top service and wonderful people🤩 I will recomend this atraction👌</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">Niels Onrust</h4>
              <p class="testi-card-text">We had an amazing trek through the rainforest with the best guides! We saw beautiful nature and had amazing mountain views and waterfalls all around. Had a lot of good chats, fun and learnt a lot!</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">Laura Hoffmann</h4>
              <p class="testi-card-text">Kanneliya blew me away. The biodiversity here is unlike anything I have experienced in Southeast Asia. Our guide pointed out rare bird species and medicinal plants I never would have noticed on my own. Absolutely worth every moment.</p>
            </div>
            <!-- Duplicate for seamless loop -->
             <div class="testi-card">
              <h4 class="testi-card-title">Ronny Engebretsen</h4>
              <p class="testi-card-text">Amazing place, top service and wonderful people🤩 I will recomend this atraction👌</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">Niels Onrust</h4>
              <p class="testi-card-text">We had an amazing trek through the rainforest with the best guides! We saw beautiful nature and had amazing mountain views and waterfalls all around. Had a lot of good chats, fun and learnt a lot!</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">Laura Hoffmann</h4>
              <p class="testi-card-text">Kanneliya blew me away. The biodiversity here is unlike anything I have experienced in Southeast Asia. Our guide pointed out rare bird species and medicinal plants I never would have noticed on my own. Absolutely worth every moment.</p>
            </div>
          </div>
        </div>

        <!-- Column 2 — scrolls bottom→top -->
        <div class="testi-col testi-col-up">
          <div class="testi-track">
            <div class="testi-card">
              <h4 class="testi-card-title">Priya Nair</h4>
              <p class="testi-card-text">As someone who loves nature but rarely gets off the beaten track, this experience was transformative. The canopy walk and the sound of the forest at dawn are things I will carry with me forever. The team made us feel completely safe throughout.</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">James Whitfield</h4>
              <p class="testi-card-text">We booked a private trek for our anniversary and it was the best decision of our trip. The waterfall at the end of the trail was breathtaking, and having a knowledgeable guide made the whole experience so much richer. Highly recommend!</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">Amelia Schroeder</h4>
              <p class="testi-card-text">Fantastic experience from start to finish. Booking was easy, the pickup was on time, and the trail itself is stunning.</p>
            </div>
            <!-- Duplicate for seamless loop -->
            <div class="testi-card">
              <h4 class="testi-card-title">Priya Nair</h4>
              <p class="testi-card-text">As someone who loves nature but rarely gets off the beaten track, this experience was transformative. The canopy walk and the sound of the forest at dawn are things I will carry with me forever. The team made us feel completely safe throughout.</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">James Whitfield</h4>
              <p class="testi-card-text">We booked a private trek for our anniversary and it was the best decision of our trip. The waterfall at the end of the trail was breathtaking, and having a knowledgeable guide made the whole experience so much richer. Highly recommend!</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">Amelia Schroeder</h4>
              <p class="testi-card-text">Fantastic experience from start to finish. Booking was easy, the pickup was on time, and the trail itself is stunning.</p>
            </div>
          </div>
        </div>
 
        <!-- Column 3 — scrolls top→bottom -->
        <div class="testi-col testi-col-down">
          <div class="testi-track">
            <div class="testi-card">
              <h4 class="testi-card-title">Tomás Ferreira</h4>
              <p class="testi-card-text">I visited Kanneliya as part of a two-week tour of Sri Lanka and it was the highlight without a doubt. The forest feels ancient and untouched. Our guide shared stories about the ecosystem that completely changed how I see nature conservation. A truly special place.</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">Sophie Marchand</h4>
              <p class="testi-card-text">The morning bird walk was magical. We spotted over a dozen endemic species within the first hour. The guides know every call and rustle in that forest. It felt like having a secret window into a world most people never get to see.</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">Kenji Watanabe</h4>
              <p class="testi-card-text">Perfect for photographers. The light through the canopy in the early morning is incredible, and there are so many interesting subjects everywhere you look. The team was patient with our slow pace and always pointed us towards the best spots.</p>
            </div>
            <!-- Duplicate for seamless loop -->
            <div class="testi-card">
              <h4 class="testi-card-title">Tomás Ferreira</h4>
              <p class="testi-card-text">I visited Kanneliya as part of a two-week tour of Sri Lanka and it was the highlight without a doubt. The forest feels ancient and untouched. Our guide shared stories about the ecosystem that completely changed how I see nature conservation. A truly special place.</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">Sophie Marchand</h4>
              <p class="testi-card-text">The morning bird walk was magical. We spotted over a dozen endemic species within the first hour. The guides know every call and rustle in that forest. It felt like having a secret window into a world most people never get to see.</p>
            </div>
            <div class="testi-card">
              <h4 class="testi-card-title">Kenji Watanabe</h4>
              <p class="testi-card-text">Perfect for photographers. The light through the canopy in the early morning is incredible, and there are so many interesting subjects everywhere you look. The team was patient with our slow pace and always pointed us towards the best spots.</p>
            </div>
          </div>
        </div>
 
      </div><!-- /testi-grid -->
    </div>
  </section>

  <!-- ================================================
       FOOTER
  ================================================ -->
  <?php include '../footer/footer.php'; ?>

  <!-- Scripts -->
  <script src="/header/header.js"></script>
  <script src="/home/main.js"></script>
  <script src="/home/hero.js"></script>
  <script src="/footer/footer.js"></script>

</body>

</html>