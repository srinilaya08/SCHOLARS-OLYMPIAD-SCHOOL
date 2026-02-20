<?php
$eventsFile = 'customevents.json';
$events = file_exists($eventsFile) ? json_decode(file_get_contents($eventsFile), true) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Meta Tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./assets/logo.jpg" type="image/x-icon" />

  <title>Gallery | Gentle Kids Play School – Joyful Moments in Armoor</title>
  <link rel="canonical" href="https://gentlekidsplayschool.in/gallery.php">

  <!-- SEO Meta Tags -->
  <meta name="keywords"
    content="Gentle Kids Play School Gallery, Armoor preschool photos, kids events, play school activities, fun learning images, kids celebrations, Armoor daycare moments, school photo gallery" />
  <meta name="description"
    content="Explore the joyful and vibrant moments captured at Gentle Kids Play School in Armoor. View photos of fun learning, events, celebrations, and day-to-day activities that make our school special." />

  <!-- Open Graph Meta Tags (for Social Sharing) -->
  <meta property="og:title" content="Gallery | Gentle Kids Play School – Joyful Moments in Armoor" />
  <meta property="og:description"
    content="Take a visual tour of Gentle Kids Play School through our gallery. Witness the smiles, creativity, and celebrations that make our school a joyful place for children." />
  <meta property="og:image" content="https://gentlekidsplayschool.in/assets/gallery-banner.jpg" />
  <meta property="og:url" content="https://gentlekidsplayschool.in/gallery.php" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Gentle Kids Play School" />

  <!-- Schema Markup for Gallery Page -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ImageGallery",
    "name": "Gentle Kids Play School Gallery",
    "url": "https://gentlekidsplayschool.in/gallery.php",
    "description": "Photo gallery of joyful moments, events, and classroom activities at Gentle Kids Play School in Armoor.",
    "image": [
      "https://gentlekidsplayschool.in/assets/gallery1.jpg",
      "https://gentlekidsplayschool.in/assets/gallery2.jpg",
      "https://gentlekidsplayschool.in/assets/gallery3.jpg"
    ],
    "publisher": {
      "@type": "Organization",
      "name": "Gentle Kids Play School",
      "logo": {
        "@type": "ImageObject",
        "url": "https://gentlekidsplayschool.in/assets/logo.jpg"
      }
    }
  }
  </script>

  <meta name="robots" content="index, follow" />

  <!-- Tailwind CSS -->
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/output.css">
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->

  <!-- GSAP Animations -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>

<body class="bg-[#fefcf8] text-gray-800 font-sans">
  <!-- Navbar -->
  <nav class="bg-white shadow-lg fixed h-20 w-full top-0 z-50" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16 md:h-20">

       <!-- Enhanced Logo Section -->
<div class="flex items-center gap-4" id="logo">
  <!-- Logo Image -->
  <img src="assets/logo.jpg" alt="School Logo" class="h-16 w-16 rounded-full shadow-md object-cover">

  <!-- Logo Text -->
  <div class="leading-tight">
    <h1 class="text-2xl font-bold text-[#2D3748] logo-font">Gentle Kids</h1>
    <p class="text-sm text-[#718096]">Kids blossom here</p>
  </div>
</div>


        <!-- Desktop Menu -->
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-8" id="desktop-menu">
            <a href="index.html"
              class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">Home</a>

            <a href="curriculum.html"
              class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">Curriculum</a>
            <a href="careers.php"
              class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">Careers</a>

            <a href="gallery.php"
              class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">Gallery</a>
            <a href="about-us.html"
              class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">About
              us</a>
            <a href="contactus.html"
              class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">Contact
              us</a>
          </div>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
          <button id="mobile-menu-btn" type="button"
            class="mobile-menu-button bg-gray-100 inline-flex items-center justify-center p-2 rounded-md text-[#383C3E] hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition-colors duration-200">
            <span class="sr-only">Open main menu</span>
            <div class="hamburger-lines">
              <span class="block w-6 h-0.5 bg-current mb-1 transition-all duration-300 ease-in-out"></span>
              <span class="block w-6 h-0.5 bg-current mb-1 transition-all duration-300 ease-in-out"></span>
              <span class="block w-6 h-0.5 bg-current transition-all duration-300 ease-in-out"></span>
            </div>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden mobile-menu opacity-0 invisible transform -translate-y-full" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 flex flex-col bg-white shadow-lg">
        <a href="index.html"
          class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">Home</a>

        <a href="curriculum.html"
          class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">Curriculum</a>
        <a href="careers.php"
          class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">Careers</a>

        <a href="gallery.php"
          class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">Gallery</a>
        <a href="about-us.html"
          class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">About
          us</a>
        <a href="contactus.html"
          class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">Contact
          us</a>
      </div>
    </div>
  </nav>

<!-- Header -->
<header class="bg-cover my-20 bg-center relative text-white py-24 px-4" style="background-image: url('./assets/gallery.jpg');">
  <div class="absolute inset-0 bg-black bg-opacity-50"></div>
  <div class="relative max-w-4xl mx-auto text-center z-10">
    <h1 class="text-4xl md:text-5xl font-bold mb-4 fade-up">Events & Celebrations</h1>
    <p class="text-lg md:text-xl max-w-2xl mx-auto">Witness the joyful moments, vibrant festivals, and creative expressions of our little learners at Gentle Kids Play School, Armoor.</p>
  </div>
</header>

<!-- Main Content -->
<main class="max-w-6xl mx-auto px-4 py-16">
  <h2 id="gallery-title" class="text-3xl md:text-4xl font-bold text-center text-sky-500 mb-12">School Gallery</h2>

  <?php if (!empty($events)): ?>
    <div class="space-y-8">
      <?php foreach ($events as $index => $event): ?>
        <div class="accordion-item rounded-xl shadow bg-white border-l-4 border-pink-300 p-6" data-index="<?= $index ?>">
          <div class="flex items-center justify-between cursor-pointer toggle-header" data-index="<?= $index ?>">
            <h3 class="text-xl font-semibold text-pink-700"><?= htmlspecialchars($event['event']) ?></h3>
            <span class="text-2xl font-bold toggle-icon text-pink-600 transition-transform">+</span>
          </div>

          <div class="accordion-content mt-4 hidden overflow-hidden">
            <?php if (!empty($event['images'])): ?>
              <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-4 border-t">
                <?php foreach ($event['images'] as $i => $img): ?>
                  <div class="overflow-hidden rounded-md shadow hover:shadow-lg transition-shadow">
                    <a href="<?= $img ?>" data-fancybox="gallery-<?= $index ?>" data-caption="<?= htmlspecialchars($event['event']) ?> - Image <?= $i + 1 ?>">
                      <img src="<?= $img ?>" alt="<?= htmlspecialchars($event['event']) ?> Image" class="w-full h-40 object-cover rounded-md hover:scale-105 transition-transform duration-300" />
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <p class="text-sm text-gray-500 text-center py-4">No images available for this event.</p>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p class="text-center text-gray-500 text-lg py-20">No events found. Stay tuned for more magical memories!</p>
  <?php endif; ?>
</main>

  <!-- FOOTER -->
  <footer class="bg-[#f5a623] text-white pt-14 pb-8 px-6 md:px-20 relative overflow-hidden" id="footer">

    <!-- Main Footer Grid -->
    <div class="relative z-20 grid grid-cols-1 md:grid-cols-3 gap-10">

      <!-- About Section -->
      <div class="footer-about">
        <h4 class="text-xl font-bold mb-4">About Gentle Kids</h4>
        <p class="text-sm leading-relaxed">
          Gentle Kids Play School in Armoor is a nurturing preschool and early education center committed to playful
          learning.
          With branches in Yogeshwara Colony and Janda Gally, we focus on building strong foundations through fun, care,
          and creativity—making us one of the most trusted play schools in Armoor.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="footer-links">
        <h4 class="text-xl font-bold mb-4">Quick Links</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="/index.html" class="hover:underline">Home</a></li>
          <li><a href="/about-us.html" class="hover:underline">About</a></li>
          <li><a href="/curriculum.html" class="hover:underline">Curriculum</a></li>
          <li><a href="/careers.php" class="hover:underline">Careers</a></li>
          <li><a href="/gallery.php" class="hover:underline">Gallery</a></li>
          <li><a href="/contactus.html" class="hover:underline">Contact</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="footer-contact space-y-4">
        <h4 class="text-xl font-bold mb-4">Contact Us</h4>

        <!-- Location -->
        <div class="flex items-start gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 11c1.656 0 3-1.343 3-3s-1.344-3-3-3-3 1.343-3 3 1.344 3 3 3z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
          </svg>
          <p class="text-sm leading-snug">
            <strong>Our Branches:</strong><br>
            Yogeshwara Colony – Branch 1<br>
            Janda Gally – Branch 2<br>
            Armoor, Telangana
          </p>
        </div>

        <!-- Email -->
        <div class="flex items-center gap-3">
          <svg data-name="1-Email" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
            class="w-4 h-4 text-white fill-current">
            <path
              d="M29 4H3a3 3 0 0 0-3 3v18a3 3 0 0 0 3 3h26a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3zm-.72 2L16 14.77 3.72 6zM30 25a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.23l13.42 9.58a1 1 0 0 0 1.16 0L30 7.23z" />
          </svg>

          <div class="flex flex-col">
            <a href="mailto:gentlekidsarmoor@gmail.com" class="text-sm hover:underline">gentlekidsarmoor@gmail.com</a>
            <a href="mailto:gentlekidsm@gmail.com" class="text-sm hover:underline">gentlekidsm@gmail.com</a>
          </div>
        </div>

        <!-- Phone -->
        <div class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.314 28.323" class="w-4 h-4 text-white fill-current">
            <path
              d="m27.728 20.384-4.242-4.242a1.982 1.982 0 0 0-1.413-.586h-.002c-.534 0-1.036.209-1.413.586L17.83 18.97l-8.485-8.485 2.828-2.828c.78-.78.78-2.05-.001-2.83L7.929.585A1.986 1.986 0 0 0 6.516 0h-.001C5.98 0 5.478.209 5.101.587L.858 4.83C.729 4.958-.389 6.168.142 8.827c.626 3.129 3.246 7.019 7.787 11.56 6.499 6.499 10.598 7.937 12.953 7.937 1.63 0 2.426-.689 2.604-.867l4.242-4.242c.378-.378.587-.881.586-1.416 0-.534-.208-1.037-.586-1.415zm-5.656 5.658c-.028.028-3.409 2.249-12.729-7.07C-.178 9.452 2.276 6.243 2.272 6.244L6.515 2l4.243 4.244-3.535 3.535a.999.999 0 0 0 0 1.414l9.899 9.899a.999.999 0 0 0 1.414 0l3.535-3.536 4.243 4.244-4.242 4.242z" />
          </svg>

          <div class="flex flex-col">
            <a href="tel:+918686090806" class="text-sm hover:underline">+91 86860 90806</a>
            <a href="tel:+918639030903" class="text-sm hover:underline">+91 86390 30903</a>
          </div>
        </div>

        <!-- Working Hours -->
        <div class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <p class="text-sm">Mon – Sat: 9:00 AM – 4:00 PM</p>
        </div>
      </div>
    </div>

    <!-- Divider and Bottom Note -->
    <div class="border-t border-white mt-10 pt-4 text-center text-sm">
      &copy; 2025 Gentle Kids Play School, Armoor. All rights reserved. | Trusted preschool and early education center
      in Telangana.
      <br>
      <span class="block mt-1">Designed & Developed by
        <a href="https://nexvo.vercel.app/" target="_blank" rel="noopener noreferrer"
          class="underline hover:text-gray-200">Nexvo Solutions</a>
      </span>
      M Vishnuvardhan
    </div>
  </footer>

<!-- Scripts -->
<script src="js/common.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script>
  // Fancybox Initialization
  Fancybox.bind("[data-fancybox^='gallery-']", {});

  // Accordion Functionality
  document.querySelectorAll('.toggle-header').forEach(header => {
    header.addEventListener('click', () => {
      const index = header.dataset.index;
      const item = document.querySelector(`.accordion-item[data-index="${index}"]`);
      const content = item.querySelector('.accordion-content');
      const icon = item.querySelector('.toggle-icon');

      if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.textContent = '−';
        gsap.fromTo(content, { height: 0, opacity: 0 }, { height: 'auto', opacity: 1, duration: 0.5 });
      } else {
        gsap.to(content, {
          height: 0,
          opacity: 0,
          duration: 0.4,
          onComplete: () => content.classList.add('hidden')
        });
        icon.textContent = '+';
      }
    });
  });

  // Gallery Title Animation
  gsap.from("#gallery-title", {
    opacity: 0,
    y: 30,
    duration: 1,
    scrollTrigger: {
      trigger: "#gallery-title",
      start: "top 80%"
    }
  });
</script>
</body>
</html>
