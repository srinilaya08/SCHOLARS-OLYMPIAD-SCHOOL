<?php
// Load job openings from jobs.json
$jobsFile = 'jobs.json';
$jobs = [];
if (file_exists($jobsFile)) {
    $jsonData = file_get_contents($jobsFile);
    $jobs = json_decode($jsonData, true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Meta -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./assets/logo.jpg" type="image/x-icon" />

  <link rel="canonical" href="https://gentlekidsplayschool.in/careers.php">

  <!-- SEO Meta -->
  <meta name="keywords"
    content="Gentle Kids Play School Careers, Armoor preschool jobs, teaching jobs in Armoor, preschool teacher jobs, play school openings, daycare staff Armoor" />
  <meta name="description"
    content="Join the Gentle Kids Play School team! Explore fulfilling careers in early childhood education in Armoor. Apply for teacher, caregiver, and admin positions." />

  <title>Careers at Gentle Kids Play School | Join Our Passionate Team</title>

  <!-- Open Graph for Social Sharing -->
  <meta property="og:title" content="Careers at Gentle Kids Play School – Work With Us" />
  <meta property="og:description"
    content="Gentle Kids Play School in Armoor is hiring! Apply now for rewarding positions in preschool education and childcare." />
  <meta property="og:image" content="https://gentlekidsplayschool.in/assets/logo.jpg" />
  <meta property="og:url" content="https://gentlekidsplayschool.in/careers.php" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Gentle Kids Play School" />

  <!-- Schema Markup for JobPosting -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "JobPosting",
    "title": "Preschool Teacher",
    "description": "Gentle Kids Play School is seeking passionate early educators in Armoor who love working with children and nurturing young minds.",
    "identifier": {
      "@type": "PropertyValue",
      "name": "Gentle Kids Play School",
      "value": "GKPS-CAREERS"
    },
    "hiringOrganization": {
      "@type": "Organization",
      "name": "Gentle Kids Play School",
      "sameAs": "https://gentlekidsplayschool.in",
      "logo": "https://gentlekidsplayschool.in/assets/logo.jpg"
    },
    "jobLocation": {
      "@type": "Place",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Near Mamidipally",
        "addressLocality": "Armoor",
        "addressRegion": "Telangana",
        "postalCode": "503224",
        "addressCountry": "IN"
      }
    },
    "datePosted": "2025-07-23",
    "employmentType": "FULL_TIME"
  }
  </script>

  <!-- Robots -->
  <meta name="robots" content="index, follow" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/output.css">
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->

  <!-- GSAP for Animations -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>

<body class="overflow-x-hidden bg-gradient-to-b from-white to-blue-50">
<!-- Navbar -->
    <nav class="bg-white shadow-lg fixed h-20 w-full top-0 z-50" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center" id="logo">
                    <img src="assets/logo.jpg" alt="School Logo" class=" h-16">
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
                            <span
                                class="block w-6 h-0.5 bg-current mb-1 transition-all duration-300 ease-in-out"></span>
                            <span
                                class="block w-6 h-0.5 bg-current mb-1 transition-all duration-300 ease-in-out"></span>
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
            class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">About us</a>
        <a href="contactus.html"
            class="mobile-nav-link text-[#383C3E] block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 hover:glow-on-hover">Contact us</a>
    </div>
        </div>
    </nav>
<!-- Header Section -->
<div class="bg-[#FDE68A] text-[#1E293B] py-24 px-6 relative overflow-hidden">
  <div class="max-w-6xl mx-auto text-center relative z-10">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4 fade-up">
      Join <span class="text-[#DC2626]">Gentle Kids Play School</span>
    </h1>
    <p class="text-lg md:text-xl max-w-2xl mx-auto mb-4 fade-up">
      Be a part of a joyful and nurturing educational environment where children grow and thrive.
    </p>
    <div class="w-24 h-1 bg-[#DC2626] mx-auto rounded-full fade-up"></div>
  </div>
  <div class="absolute bottom-0 left-0 w-full z-0">
    <svg class="w-full h-32" viewBox="0 0 1440 320" preserveAspectRatio="none">
      <path fill="#f5a623" fill-opacity="1" d="M0,192L60,170.7C120,149,240,107,360,90.7C480,75,600,85,720,106.7C840,128,960,160,1080,160C1200,160,1320,128,1380,112L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
  </div>
</div>

<!-- Job Openings -->
<section class="py-16 px-4">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-[#1E293B] mb-10">Current Openings</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 fade-up">
      <?php if (!empty($jobs)) : ?>
        <?php foreach ($jobs as $job) : ?>
          <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-md hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-[#0B1F55] mb-2"><?php echo htmlspecialchars($job['title']); ?></h3>
            <p class="text-gray-600 mb-1"><?php echo htmlspecialchars($job['description']); ?></p>
            <p class="text-sm text-gray-500"><i class="fas fa-map-marker-alt text-[#F59E0B]"></i> <?php echo htmlspecialchars($job['location']); ?></p>
            <p class="text-xs mt-2 text-gray-400">Job ID: <?php echo htmlspecialchars($job['id']); ?></p>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p class="text-center text-gray-500 col-span-2">No job openings currently available.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Application Form -->
<section class="py-16 px-4 bg-[#F9FAFB]">
  <div class="max-w-3xl mx-auto fade-up">
    <h2 class="text-3xl font-bold text-center mb-8 text-[#1E293B]">Apply Now</h2>
    <form action="apply.php" method="POST" enctype="multipart/form-data" class="space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" name="full_name" placeholder="Full Name" required class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#DC2626]">
        <input type="email" name="email" placeholder="Email" required class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#DC2626]">
      </div>
      <input type="text" name="phone" placeholder="Phone Number" required class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#DC2626]">
      <select name="job_id" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#DC2626]">
        <option value="" disabled selected>Select Job Opening</option>
        <?php foreach ($jobs as $job) : ?>
          <option value="<?php echo htmlspecialchars($job['id']); ?>"><?php echo htmlspecialchars($job['title']); ?></option>
        <?php endforeach; ?>
      </select>
      <textarea name="cover_letter" placeholder="Cover Letter (optional)" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#DC2626]"></textarea>
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-600">Upload Resume</label>
        <input type="file" name="resume" accept=".pdf,.doc,.docx" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#DC2626]">
      </div>
      <button type="submit" class="w-full bg-[#DC2626] text-white py-3 rounded-lg font-semibold hover:bg-[#B91C1C] transition">Submit Application</button>
    </form>
  </div>
</section>
<!-- FOOTER -->
<footer class="bg-[#f5a623] text-white pt-14 pb-8 px-6 md:px-20 relative overflow-hidden" id="footer">
  <!-- Cloud Top Design -->

  <!-- Main Footer Grid -->
  <div class="relative z-20 grid grid-cols-1 md:grid-cols-3 gap-10">
    
    <!-- About Section -->
    <div class="footer-about">
      <h4 class="text-xl font-bold mb-4">About Gentle Kids</h4>
      <p class="text-sm leading-relaxed">
        Gentle Kids Play School in Armoor is a nurturing preschool and early education center committed to playful learning. 
        With branches in Yogeshwara Colony and Janda Gally, we focus on building strong foundations through fun, care, and creativity—making us one of the most trusted play schools in Armoor.
      </p>
    </div>

    <!-- Quick Links Section -->
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

    <!-- Contact Info Section -->
    <div class="footer-contact space-y-4">
      <h4 class="text-xl font-bold mb-4">Contact Us</h4>

      <div class="flex items-start gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path d="M17.657 16.657L13.414 12.414a4 4 0 00-5.657 0L6.343 13.828m6.364-6.364a4 4 0 015.657 0l1.414 1.414a4 4 0 010 5.657l-1.414 1.414" />
        </svg>
        <p class="text-sm leading-snug">
          <strong>Our Branches:</strong><br>
          Yogeshwara Colony – Branch 1<br>
          Janda Gally – Branch 2<br>
          Armoor, Telangana
        </p>
      </div>

      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path d="M16 12a4 4 0 01-8 0 4 4 0 018 0zm0 0v1a4 4 0 01-8 0v-1" />
        </svg>
        <a href="mailto:gentlekidsplayschool@gmail.com" class="text-sm hover:underline">gentlekidsplayschool@gmail.com</a>
      </div>

      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path d="M3 5h2l3 10a1 1 0 001 1h10v-2H9.42a1 1 0 01-.98-.804L8.1 12H19a1 1 0 001-1V7a1 1 0 00-1-1H5.42l-.94-2H3v2z" />
        </svg>
        <a href="tel:+918686090806" class="text-sm hover:underline">+91 86860 90806</a>
      </div>

      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <p class="text-sm">Mon – Sat: 9:00 AM – 4:00 PM</p>
      </div>
    </div>
  </div>

  <!-- Divider and Bottom Note -->
<div class="border-t border-white mt-10 pt-4 text-center text-sm">
  &copy; 2025 Gentle Kids Play School, Armoor. All rights reserved. | Trusted preschool and early education center in Telangana.
  <br>
  <span class="block mt-1">Designed & Developed by 
    <a href="https://nexvo.vercel.app/" target="_blank" rel="noopener noreferrer" class="underline hover:text-gray-200">Nexvo Solutions</a>
  </span>
  M Vishnuvardhan
</div>
</footer>
<script>
document.addEventListener('DOMContentLoaded', function () {
  gsap.registerPlugin(ScrollTrigger);

  gsap.utils.toArray('.fade-up').forEach(el => {
    gsap.from(el, {
      opacity: 0,
      y: 50,
      duration: 1,
      ease: "power2.out",
      scrollTrigger: {
        trigger: el,
        start: "top 90%",
        toggleActions: "play none none none"
      }
    });
  });
});
</script>

</body>
</html>
