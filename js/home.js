document.addEventListener('DOMContentLoaded', function () {
    gsap.registerPlugin(ScrollTrigger);
    initHeroAnimations();
    initWelcomeAnimations();
    initCurriculumAnimations();
    initMessagefromPrincipalAnimations();
    initWhyChose();
    initBookYourSeatAnimations();
});
function initHeroAnimations() {
    // Setup: hide hero elements initially
    const heroElements = [
        "#hero-welcome-badge",
        "#hero-title-line1",
        "#hero-title-line2",
        "#hero-title-line3",
        "#hero-subtitle",
        "#hero-cta-button"
    ];
    gsap.set(heroElements, { opacity: 0, y: 50 });

    // Entrance animation timeline
    const heroTL = gsap.timeline({ delay: 0.2 });

    heroTL
        .to("#hero-gradient-overlay", {
            opacity: 0.75,
            duration: 1,
            ease: "power2.out"
        })
        .to("#hero-welcome-badge", {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: "power3.out"
        }, "-=0.5")
        .to(["#hero-title-line1", "#hero-title-line2", "#hero-title-line3"], {
            opacity: 1,
            y: 0,
            duration: 1,
            ease: "power3.out",
            stagger: 0.15
        }, "-=0.5")
        .to("#hero-subtitle", {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: "power2.out"
        }, "-=0.3")
        .to("#hero-cta-button", {
            opacity: 1,
            y: 0,
            duration: 0.6,
            ease: "back.out(1.7)"
        }, "-=0.2");

    // Scroll parallax effect
    gsap.to("#hero", {
        yPercent: -20,
        ease: "none",
        scrollTrigger: {
            trigger: "#hero",
            start: "top+=80 top", // Adjusted for margin-top
            end: "bottom top",
            scrub: true
        }
    });

    // Hover animation for CTA button
    const ctaButton = document.querySelector('#hero-cta-button button');
    if (ctaButton) {
        ctaButton.addEventListener('mouseenter', () => {
            gsap.to(ctaButton, {
                scale: 1.05,
                boxShadow: "0 20px 40px rgba(0,0,0,0.3)",
                duration: 0.3,
                ease: "power2.out"
            });
        });

        ctaButton.addEventListener('mouseleave', () => {
            gsap.to(ctaButton, {
                scale: 1,
                boxShadow: "0 10px 25px rgba(0,0,0,0.15)",
                duration: 0.3,
                ease: "power2.out"
            });
        });
    }

    // Mouse parallax for floating elements
    document.addEventListener('mousemove', (e) => {
        const xRatio = (e.clientX / window.innerWidth - 0.5) * 2;
        const yRatio = (e.clientY / window.innerHeight - 0.5) * 2;

        gsap.to('.floating-element', {
            x: xRatio * 20,
            y: yRatio * 20,
            duration: 0.5,
            ease: "power2.out",
            stagger: 0.1
        });
    });
}


function initWelcomeAnimations() {
   // Initial setup - hide all elements
        gsap.set(['.gkps-header-section', '.gkps-safe-section', '.gkps-play-section'], {
            opacity: 0,
            y: 50
        });

        // Header animation
        gsap.timeline()
            .to('.gkps-header-section', {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: 'back.out(1.7)'
            })
            .to('.gkps-safe-section', {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: 'back.out(1.7)'
            }, '-=0.5')
            .to('.gkps-play-section', {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: 'back.out(1.7)'
            }, '-=0.5');

        // Hover animations for cards
        const gkpsCards = document.querySelectorAll('.gkps-section-card');
        
        gkpsCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                gsap.to(card, {
                    scale: 1.02,
                    y: -5,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
            
            card.addEventListener('mouseleave', () => {
                gsap.to(card, {
                    scale: 1,
                    y: 0,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
        });

      

        // Image placeholder hover effects
        const gkpsImagePlaceholders = document.querySelectorAll('.gkps-image-placeholder');
        
        gkpsImagePlaceholders.forEach(placeholder => {
            placeholder.addEventListener('mouseenter', () => {
                gsap.to(placeholder, {
                    scale: 1.05,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
            
            placeholder.addEventListener('mouseleave', () => {
                gsap.to(placeholder, {
                    scale: 1,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
        });

        
}


function initCurriculumAnimations() {
    // Title Animation
        gsap.fromTo('.curriculum-main-title', 
            { 
                opacity: 0, 
                y: 50,
                scale: 0.9
            },
            { 
                opacity: 1, 
                y: 0,
                scale: 1,
                duration: 1.2,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: '.curriculum-title-section',
                    start: 'top 80%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Top Cards Animation (staggered)
        gsap.fromTo('.curriculum-cards-grid .curriculum-card-lang, .curriculum-cards-grid .curriculum-card-numeracy, .curriculum-cards-grid .curriculum-card-science', 
            { 
                opacity: 0, 
                y: 80,
                rotateX: 15,
                scale: 0.8
            },
            { 
                opacity: 1, 
                y: 0,
                rotateX: 0,
                scale: 1,
                duration: 1,
                stagger: 0.2,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: '.curriculum-cards-grid',
                    start: 'top 70%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Bottom Cards Animation
        gsap.fromTo('.curriculum-bottom-section .curriculum-card-social, .curriculum-bottom-section .curriculum-card-arts', 
            { 
                opacity: 0, 
                y: 60,
                x: function(index) { return index === 0 ? -50 : 50; },
                scale: 0.9
            },
            { 
                opacity: 1, 
                y: 0,
                x: 0,
                scale: 1,
                duration: 1.2,
                stagger: 0.15,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: '.curriculum-bottom-section',
                    start: 'top 75%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Icon Animations
        gsap.fromTo('.curriculum-icon-lang, .curriculum-icon-numeracy, .curriculum-icon-science, .curriculum-icon-social, .curriculum-icon-arts', 
            { 
                scale: 0,
                rotation: -180
            },
            { 
                scale: 1,
                rotation: 0,
                duration: 0.8,
                stagger: 0.1,
                ease: "back.out(1.7)",
                scrollTrigger: {
                    trigger: '.curriculum-cards-grid',
                    start: 'top 65%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Floating decorations animation
        gsap.to('.curriculum-heart-decoration', {
            y: -20,
            duration: 2,
            repeat: -1,
            yoyo: true,
            ease: "power2.inOut"
        });

        gsap.to('.curriculum-pencil-decoration', {
            y: -15,
            rotation: 25,
            duration: 3,
            repeat: -1,
            yoyo: true,
            ease: "power2.inOut"
        });

    

        // Hover animations for cards
        document.querySelectorAll('[class*="curriculum-card-"]').forEach(card => {
            card.addEventListener('mouseenter', () => {
                gsap.to(card, {
                    y: -10,
                    scale: 1.05,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });

            card.addEventListener('mouseleave', () => {
                gsap.to(card, {
                    y: 0,
                    scale: 1,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });
        });

       
}

function initMessagefromPrincipalAnimations() {
   
        // Main container entrance
        gsap.fromTo('.leadership-main-container', 
            { 
                opacity: 0,
                y: 30
            },
            { 
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: '.leadership-main-container',
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Principal image animation
        gsap.fromTo('.leadership-principal-image', 
            { 
                opacity: 0, 
                x: -60,
                scale: 0.9
            },
            { 
                opacity: 1, 
                x: 0,
                scale: 1,
                duration: 1.2,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: '.leadership-image-section',
                    start: 'top 80%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Title animation
        gsap.fromTo('.leadership-main-title', 
            { 
                opacity: 0, 
                y: 40,
                scale: 0.95
            },
            { 
                opacity: 1, 
                y: 0,
                scale: 1,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: '.leadership-main-title',
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Message paragraphs staggered animation
        gsap.fromTo('.leadership-message-paragraph', 
            { 
                opacity: 0, 
                y: 30,
                x: 20
            },
            { 
                opacity: 1, 
                y: 0,
                x: 0,
                duration: 0.8,
                stagger: 0.3,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: '.leadership-message-content',
                    start: 'top 75%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Principal card animation
        gsap.fromTo('.leadership-principal-card', 
            { 
                opacity: 0, 
                y: 25,
                scale: 0.95
            },
            { 
                opacity: 1, 
                y: 0,
                scale: 1,
                duration: 0.8,
                ease: "back.out(1.7)",
                scrollTrigger: {
                    trigger: '.leadership-principal-card',
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

         // Hover effect for principal card
        const principalCard = document.querySelector('.leadership-principal-card');
        
        principalCard.addEventListener('mouseenter', () => {
            gsap.to(principalCard, {
                scale: 1.05,
                y: -5,
                duration: 0.3,
                ease: "power2.out"
            });
        });

        principalCard.addEventListener('mouseleave', () => {
            gsap.to(principalCard, {
                scale: 1,
                y: 0,
                duration: 0.3,
                ease: "power2.out"
            });
        });
}

function initWhyChose(){
     // Main container entrance
        gsap.fromTo('.gentleplay-main-wrapper', 
            { 
                opacity: 0,
                y: 40
            },
            { 
                opacity: 1,
                y: 0,
                duration: 1.2,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: '.gentleplay-main-wrapper',
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Image placeholder animation
        gsap.fromTo('.gentleplay-main-image', 
            { 
                opacity: 0, 
                x: -80,
                scale: 0.9,
                rotateY: 15
            },
            { 
                opacity: 1, 
                x: 0,
                scale: 1,
                rotateY: 0,
                duration: 1.5,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: '.gentleplay-image-container',
                    start: 'top 80%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Title animation with underline
        gsap.fromTo('.gentleplay-main-title', 
            { 
                opacity: 0, 
                y: 50,
                scale: 0.95
            },
            { 
                opacity: 1, 
                y: 0,
                scale: 1,
                duration: 1.2,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: '.gentleplay-title-container',
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Underline animation
        gsap.fromTo('.gentleplay-underline', 
            { 
                opacity: 0
            },
            { 
                opacity: 1,
                duration: 0.8,
                ease: "power2.out",
                delay: 0.3,
                scrollTrigger: {
                    trigger: '.gentleplay-title-container',
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Paragraphs staggered animation
        gsap.fromTo('.gentleplay-paragraph', 
            { 
                opacity: 0, 
                y: 30,
                x: 20
            },
            { 
                opacity: 1, 
                y: 0,
                x: 0,
                duration: 1,
                stagger: 0.3,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: '.gentleplay-content-text',
                    start: 'top 80%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Sun decoration animation
        gsap.fromTo('.gentleplay-sun-container', 
            { 
                opacity: 0,
                scale: 0,
                rotation: -90
            },
            { 
                opacity: 1,
                scale: 1,
                rotation: 0,
                duration: 1,
                ease: "back.out(1.7)",
                scrollTrigger: {
                    trigger: '.gentleplay-main-wrapper',
                    start: 'top 90%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Book decoration animation
        gsap.fromTo('.gentleplay-book-decoration', 
            { 
                opacity: 0,
                scale: 0,
                rotation: 45
            },
            { 
                opacity: 1,
                scale: 1,
                rotation: 0,
                duration: 0.8,
                ease: "back.out(1.7)",
                delay: 0.5,
                scrollTrigger: {
                    trigger: '.gentleplay-text-section',
                    start: 'top 75%',
                    toggleActions: 'play none none reverse'
                }
            }
        );

        // Continuous animations for decorative elements
        gsap.to('.gentleplay-sun-rays', {
            rotation: 360,
            duration: 20,
            repeat: -1,
            ease: "none"
        });

        gsap.to('.gentleplay-sun-container', {
            y: -5,
            duration: 3,
            repeat: -1,
            yoyo: true,
            ease: "power2.inOut"
        });

        gsap.to('.gentleplay-book-decoration', {
            y: -8,
            rotation: 10,
            duration: 4,
            repeat: -1,
            yoyo: true,
            ease: "power2.inOut"
        });

        

        // Hover effect for the main image
        const mainImage = document.querySelector('.gentleplay-main-image');
        
        mainImage.addEventListener('mouseenter', () => {
            gsap.to(mainImage, {
                scale: 1.05,
                y: -5,
                duration: 0.4,
                ease: "power2.out"
            });
        });

        mainImage.addEventListener('mouseleave', () => {
            gsap.to(mainImage, {
                scale: 1,
                y: 0,
                duration: 0.4,
                ease: "power2.out"
            });
        });

        // Text reveal effect on scroll
        gsap.fromTo('.gentleplay-paragraph', {
            backgroundPosition: "200% 0"
        }, {
            backgroundPosition: "0% 0",
            duration: 1.5,
            stagger: 0.2,
            scrollTrigger: {
                trigger: '.gentleplay-content-text',
                start: 'top 70%',
                toggleActions: 'play none none reverse'
            }
        });
}

function initBookYourSeatAnimations() {
     gsap.from(".gkps-heading", { y: 50, opacity: 0, duration: 1 });
    // gsap.from(".gkps-contact-btn", { scale: 0, opacity: 0, delay: 0.4, duration: 1 });
    gsap.from(".gkps-book-icon", { x: -100, opacity: 0, duration: 1, delay: 0.2 });
    gsap.from(".gkps-plane-icon", { x: 100, opacity: 0, duration: 1, delay: 0.2 });
    gsap.from(".gkps-underline", { width: 0, duration: 0.6, delay: 0.6 });
       
}