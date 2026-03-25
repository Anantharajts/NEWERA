<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Carousel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg: #f4f4f0;
      --card: #ffffff;
      --fg: #1a1a1a;
      --muted: #6b6b6b;
      --accent: #1a1a1a;
      --border: #e0e0dc;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--bg);
      color: var(--fg);
      min-height: 100vh;
    }

    .font-display {
      font-family: 'Playfair Display', serif;
    }

    /* Slider mechanics */
    .slider-container {
      overflow: hidden;
    }

    .slider-track {
      display: flex;
      transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .slide {
      flex: 0 0 100%;
      padding: 0 1rem;
    }

    @media (min-width: 768px) {
      .slide {
        flex: 0 0 50%;
      }
    }

    @media (min-width: 1024px) {
      .slide {
        flex: 0 0 33.333%;
      }
    }

    /* Card */
    .card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 12px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    .card-image {
      aspect-ratio: 4/5;
      overflow: hidden;
      background: #eaeaea;
    }

    .card-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }

    .card:hover .card-image img {
      transform: scale(1.05);
    }

    /* Navigation */
    .nav-btn {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: var(--card);
      border: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s ease;
      color: var(--fg);
    }

    .nav-btn:hover {
      background: var(--fg);
      color: var(--card);
      border-color: var(--fg);
    }

    .nav-btn:disabled {
      opacity: 0.3;
      cursor: not-allowed;
    }

    .nav-btn:disabled:hover {
      background: var(--card);
      color: var(--fg);
      border-color: var(--border);
    }

    /* Dots */
    .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--border);
      border: none;
      padding: 0;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .dot.active {
      background: var(--fg);
      width: 24px;
      border-radius: 4px;
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce) {

      .slider-track,
      .card,
      .card-image img,
      .nav-btn,
      .dot {
        transition: none !important;
      }
    }
  </style>
</head>

<body>
  <main class="max-w-7xl mx-auto px-4 py-16 md:py-24">
    <!-- Header -->
    <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
      <div>
        <p class="text-sm font-medium tracking-wider uppercase mb-2" style="color: var(--muted);">Collection</p>
        <h1 class="font-display text-3xl md:text-4xl font-medium">Featured Works</h1>
      </div>

      <!-- Navigation -->
      <div class="flex items-center gap-3">
        <button class="nav-btn" id="prevBtn" aria-label="Previous" onclick="prevSlide()">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 12H5M12 19l-7-7 7-7" />
          </svg>
        </button>
        <button class="nav-btn" id="nextBtn" aria-label="Next" onclick="nextSlide()">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14M12 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </header>
    <div class="slider-container mb-8">
      <div class="slider-track" id="carousel" style="transform: translateX(0%); width: 75%;" >
        <div class="slide">
          <article class="card">
            <div class="card-image">
              <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600&amp;q=80" alt="Aurora Series" loading="lazy">
            </div>
            <div class="p-5">
              <p class="text-xs font-medium tracking-wider uppercase mb-1" style="color: var(--muted);">Portrait</p>
              <h3 class="font-display text-lg font-medium">Aurora Series</h3>
            </div>
          </article>
        </div>

        <div class="slide">
          <article class="card">
            <div class="card-image">
              <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=600&amp;q=80" alt="Urban Edge" loading="lazy">
            </div>
            <div class="p-5">
              <p class="text-xs font-medium tracking-wider uppercase mb-1" style="color: var(--muted);">Editorial</p>
              <h3 class="font-display text-lg font-medium">Urban Edge</h3>
            </div>
          </article>
        </div>

        <div class="slide">
          <article class="card">
            <div class="card-image">
              <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?w=600&amp;q=80" alt="Natural Light" loading="lazy">
            </div>
            <div class="p-5">
              <p class="text-xs font-medium tracking-wider uppercase mb-1" style="color: var(--muted);">Fashion</p>
              <h3 class="font-display text-lg font-medium">Natural Light</h3>
            </div>
          </article>
        </div>

        <div class="slide">
          <article class="card">
            <div class="card-image">
              <img src="https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?w=600&amp;q=80" alt="Mono Study" loading="lazy">
            </div>
            <div class="p-5">
              <p class="text-xs font-medium tracking-wider uppercase mb-1" style="color: var(--muted);">Artistic</p>
              <h3 class="font-display text-lg font-medium">Mono Study</h3>
            </div>
          </article>
        </div>

        <div class="slide">
          <article class="card">
            <div class="card-image">
              <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=600&amp;q=80" alt="Motion Blur" loading="lazy">
            </div>
            <div class="p-5">
              <p class="text-xs font-medium tracking-wider uppercase mb-1" style="color: var(--muted);">Experimental</p>
              <h3 class="font-display text-lg font-medium">Motion Blur</h3>
            </div>
          </article>
        </div>

        <div class="slide">
          <article class="card">
            <div class="card-image">
              <img src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=600&amp;q=80" alt="Studio Session" loading="lazy">
            </div>
            <div class="p-5">
              <p class="text-xs font-medium tracking-wider uppercase mb-1" style="color: var(--muted);">Commercial</p>
              <h3 class="font-display text-lg font-medium">Studio Session</h3>
            </div>
          </article>
        </div>
      </div>
    </div>
    <!-- <div class="flex items-center justify-center gap-2" id="dotsContainer">
      <button class="dot active" aria-label="Go to slide 1"></button>
      <button class="dot " aria-label="Go to slide 2"></button>
      <button class="dot " aria-label="Go to slide 3"></button>
      <button class="dot " aria-label="Go to slide 4"></button></div> -->
    <!-- Carousel -->
    <!-- <div class="slider-container mb-8">
      <div class="slider-track" id="sliderTrack"> -->
        <!-- Slides injected by JS -->
      <!-- </div>
    </div> -->

    <!-- Dots -->
    <!-- <div class="flex items-center justify-center gap-2" id="dotsContainer"></div> -->
  </main>

  <script>
    // // Data
    // const items = [{
    //     image: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600&q=80',
    //     title: 'Aurora Series',
    //     category: 'Portrait'
    //   },
    //   {
    //     image: 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=600&q=80',
    //     title: 'Urban Edge',
    //     category: 'Editorial'
    //   },
    //   {
    //     image: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=600&q=80',
    //     title: 'Natural Light',
    //     category: 'Fashion'
    //   },
    //   {
    //     image: 'https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?w=600&q=80',
    //     title: 'Mono Study',
    //     category: 'Artistic'
    //   },
    //   {
    //     image: 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=600&q=80',
    //     title: 'Motion Blur',
    //     category: 'Experimental'
    //   },
    //   {
    //     image: 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=600&q=80',
    //     title: 'Studio Session',
    //     category: 'Commercial'
    //   },
    // ];

    // State
    // let currentIndex = 0;
    // let slidesPerView = 1;

    // // Elements
    // const track = document.getElementById('sliderTrack');
    // const dotsContainer = document.getElementById('dotsContainer');
    // const prevBtn = document.getElementById('prevBtn');
    // const nextBtn = document.getElementById('nextBtn');

    // // Calculate slides per view based on viewport
    // function calcSlidesPerView() {
    //   if (window.innerWidth >= 1024) return 3;
    //   if (window.innerWidth >= 768) return 2;
    //   return 1;
    // }

    // Render slides
    // function renderSlides() {
    //   track.innerHTML = items.map(item => `
    //     <div class="slide">
    //       <article class="card">
    //         <div class="card-image">
    //           <img src="${item.image}" alt="${item.title}" loading="lazy">
    //         </div>
    //         <div class="p-5">
    //           <p class="text-xs font-medium tracking-wider uppercase mb-1" style="color: var(--muted);">${item.category}</p>
    //           <h3 class="font-display text-lg font-medium">${item.title}</h3>
    //         </div>
    //       </article>
    //     </div>
    //   `).join('');
    // }

    // Render dots
  //   function renderDots() {
  //     slidesPerView = calcSlidesPerView();
  //     const maxIndex = Math.max(0, items.length - slidesPerView);

  //     dotsContainer.innerHTML = '';
  //     for (let i = 0; i <= maxIndex; i++) {
  //       const dot = document.createElement('button');
  //       dot.className = `dot ${i === currentIndex ? 'active' : ''}`;
  //       dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
  //       dot.addEventListener('click', () => goToSlide(i));
  //       dotsContainer.appendChild(dot);
  //     }
  //   }

  //   // Update slider position
  //   function updateSlider() {
  //     slidesPerView = calcSlidesPerView();
  //     const maxIndex = Math.max(0, items.length - slidesPerView);
  //     currentIndex = Math.min(currentIndex, maxIndex);

  //     const offset = currentIndex * (100 / slidesPerView);
  //     track.style.transform = `translateX(-${offset}%)`;

  //     // Update dots
  //     const dots = dotsContainer.querySelectorAll('.dot');
  //     dots.forEach((dot, i) => {
  //       dot.classList.toggle('active', i === currentIndex);
  //     });

  //     // Update buttons
  //     prevBtn.disabled = currentIndex === 0;
  //     nextBtn.disabled = currentIndex >= maxIndex;
  //   }

  //   // Navigation
  //   function goToSlide(index) {
  //     currentIndex = index;
  //     updateSlider();
  //   }

  //   function nextSlide() {
  //     const maxIndex = items.length - slidesPerView;
  //     if (currentIndex < maxIndex) {
  //       currentIndex++;
  //       updateSlider();
  //     }
  //   }

  //   function prevSlide() {
  //     if (currentIndex > 0) {
  //       currentIndex--;
  //       updateSlider();
  //     }
  //   }

  //   // Init
  //   function init() {
  //     // renderSlides();
  //     renderDots();
  //     updateSlider();

  //     prevBtn.addEventListener('click', prevSlide);
  //     nextBtn.addEventListener('click', nextSlide);

  //     window.addEventListener('resize', () => {
  //       renderDots();
  //       updateSlider();
  //     });
  //   }

  //   init();
  // </script>

    <script>
        const carousel = document.getElementById("carousel");

        function nextSlide() {
            const firstImage = carousel.children[0];
            carousel.style.transition = "transform 0.5s ease-in-out";
            carousel.style.transform = "translateX(-20%)"; // Move left

            setTimeout(() => {
                carousel.appendChild(firstImage); // Move first to last
                carousel.style.transition = "none";
                carousel.style.transform = "translateX(0)"; // Reset position
            }, 500);
        }

        function prevSlide() {
            const lastImage = carousel.children[carousel.children.length - 1];
            carousel.style.transition = "none";
            carousel.insertBefore(lastImage, carousel.firstChild); // Move last to first
            carousel.style.transform = "translateX(-20%)"; // Move right

            setTimeout(() => {
                carousel.style.transition = "transform 0.5s ease-in-out";
                carousel.style.transform = "translateX(0)"; // Reset position
            }, 10);
        }
    </script>

</body>

</html>