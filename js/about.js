document.addEventListener('DOMContentLoaded', function () {
    gsap.registerPlugin(ScrollTrigger);

    initanimations();
    initMessagefromPrincipalAnimations();
});

function initanimations(){
    gsap.from(".gsap-history-image", {
  scrollTrigger: {
    trigger: ".gsap-history-image",
    start: "top 80%",
    toggleActions: "play none none reverse",
  },
  opacity: 0,
  x: -100,
  duration: 1,
});

gsap.from(".gsap-history-text", {
  scrollTrigger: {
    trigger: ".gsap-history-text",
    start: "top 80%",
    toggleActions: "play none none reverse",
  },
  opacity: 0,
  x: 100,
  duration: 1,
});
  gsap.from(".ethos-card", {
      scrollTrigger: {
        trigger: ".ethos-card",
        start: "top 80%",
        toggleActions: "play none none none"
      },
      opacity: 0,
      y: 60,
      duration: 1,
      ease: "power3.out"
    });

    gsap.from(".philosophy-card", {
      scrollTrigger: {
        trigger: ".philosophy-card",
        start: "top 80%",
        toggleActions: "play none none none"
      },
      opacity: 0,
      y: 60,
      duration: 1,
      delay: 0.2,
      ease: "power3.out"
    });

      gsap.from(".campus-title", {
      y: -50,
      opacity: 0,
      duration: 1,
      ease: "power2.out",
      scrollTrigger: {
        trigger: ".campus-section",
        start: "top 80%",
        toggleActions: "play none none reverse"
      }
    });

    gsap.from(".campus-text", {
      x: -100,
      opacity: 0,
      duration: 1,
      delay: 0.3,
      ease: "power2.out",
      scrollTrigger: {
        trigger: ".campus-wrapper",
        start: "top 80%",
        toggleActions: "play none none reverse"
      }
    });

    gsap.from(".campus-image-placeholder", {
      x: 100,
      opacity: 0,
      duration: 1,
      delay: 0.5,
      ease: "power2.out",
      scrollTrigger: {
        trigger: ".campus-wrapper",
        start: "top 80%",
        toggleActions: "play none none reverse"
      }
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