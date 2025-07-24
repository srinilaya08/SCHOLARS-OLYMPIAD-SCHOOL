document.addEventListener('DOMContentLoaded', function () {
    gsap.registerPlugin(ScrollTrigger);

    initnavbar();
    initfooter();
});

function initnavbar (){
     // GSAP Animations
        gsap.registerPlugin();

        // Initial animations on page load
        gsap.timeline()
            .from("#navbar", {
                y: -100,
                opacity: 0,
                duration: 0.8,
                ease: "power3.out"
            })
            .from("#logo", {
                x: -50,
                opacity: 0,
                duration: 0.6,
                ease: "power2.out"
            }, "-=0.4")
            .from("#desktop-menu .nav-link", {
                y: -20,
                opacity: 0,
                duration: 0.5,
                stagger: 0.1,
                ease: "power2.out"
            }, "-=0.3");

        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerLines = document.querySelectorAll('.hamburger-lines span');
        let mobileMenuOpen = false;

        // Mobile menu toggle animation
        function toggleMobileMenu() {
            if (!mobileMenuOpen) {
                // Open menu
                gsap.timeline()
                    .to(mobileMenu, {
                        opacity: 1,
                        visibility: 'visible',
                        y: 0,
                        duration: 0.4,
                        ease: "power2.out"
                    })
                    .from('.mobile-nav-link', {
                        x: -30,
                        opacity: 0,
                        duration: 0.3,
                        stagger: 0.1,
                        ease: "power2.out"
                    }, "-=0.2");

                // Animate hamburger to X
                gsap.to('.hamburger-line-1', {
                    rotation: 45,
                    y: 6,
                    duration: 0.3,
                    ease: "power2.inOut"
                });
                gsap.to('.hamburger-line-2', {
                    opacity: 0,
                    duration: 0.2,
                    ease: "power2.inOut"
                });
                gsap.to('.hamburger-line-3', {
                    rotation: -45,
                    y: -6,
                    duration: 0.3,
                    ease: "power2.inOut"
                });

                mobileMenuOpen = true;
            } else {
                // Close menu
                gsap.to(mobileMenu, {
                    opacity: 0,
                    visibility: 'hidden',
                    y: -20,
                    duration: 0.3,
                    ease: "power2.in"
                });

                // Animate X back to hamburger
                gsap.to('.hamburger-line-1', {
                    rotation: 0,
                    y: 0,
                    duration: 0.3,
                    ease: "power2.inOut"
                });
                gsap.to('.hamburger-line-2', {
                    opacity: 1,
                    duration: 0.2,
                    delay: 0.1,
                    ease: "power2.inOut"
                });
                gsap.to('.hamburger-line-3', {
                    rotation: 0,
                    y: 0,
                    duration: 0.3,
                    ease: "power2.inOut"
                });

                mobileMenuOpen = false;
            }
        }

        mobileMenuBtn.addEventListener('click', toggleMobileMenu);

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (mobileMenuOpen) {
                    toggleMobileMenu();
                }
            });
        });

        // Navbar scroll effect
        let lastScrollTop = 0;
        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scrolling down - hide navbar
                gsap.to("#navbar", {
                    y: -100,
                    duration: 0.3,
                    ease: "power2.inOut"
                });
            } else {
                // Scrolling up - show navbar
                gsap.to("#navbar", {
                    y: 0,
                    duration: 0.3,
                    ease: "power2.inOut"
                });
            }
            
            lastScrollTop = scrollTop;
        });

        // Hover animations for desktop nav links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('mouseenter', () => {
                gsap.to(link, {
                    scale: 1.05,
                    duration: 0.2,
                    ease: "power2.out"
                });
            });
            
            link.addEventListener('mouseleave', () => {
                gsap.to(link, {
                    scale: 1,
                    duration: 0.2,
                    ease: "power2.out"
                });
            });
        });

        // Logo hover animation
        document.getElementById('logo').addEventListener('mouseenter', () => {
            gsap.to('#logo', {
                scale: 1.02,
                duration: 0.3,
                ease: "power2.out"
            });
        });

        document.getElementById('logo').addEventListener('mouseleave', () => {
            gsap.to('#logo', {
                scale: 1,
                duration: 0.3,
                ease: "power2.out"
            });
        });
}

function initfooter(){
      gsap.from("#footer .footer-about", {
      scrollTrigger: {
        trigger: "#footer",
        start: "top 80%",
      },
      x: -100,
      opacity: 0,
      duration: 1,
    });

    gsap.from("#footer .footer-links", {
      scrollTrigger: {
        trigger: "#footer",
        start: "top 80%",
      },
      y: 100,
      opacity: 0,
      duration: 1,
      delay: 0.2,
    });

    gsap.from("#footer .footer-contact", {
      scrollTrigger: {
        trigger: "#footer",
        start: "top 80%",
      },
      x: 100,
      opacity: 0,
      duration: 1,
      delay: 0.4,
    });
}