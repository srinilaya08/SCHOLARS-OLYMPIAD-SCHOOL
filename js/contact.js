document.addEventListener('DOMContentLoaded', function () {
    gsap.registerPlugin(ScrollTrigger);

    initanimations();
});

function initanimations(){

 gsap.from(".contact-title", {
    scrollTrigger: {
      trigger: ".contact-banner",
      start: "top 80%",
    },
    y: 50,
    opacity: 0,
    duration: 1,
    ease: "power3.out"
  });

  gsap.from(".contact-subtitle", {
    scrollTrigger: {
      trigger: ".contact-banner",
      start: "top 80%",
    },
    y: 60,
    opacity: 0,
    delay: 0.3,
    duration: 1,
    ease: "power3.out"
  });
    gsap.from(".get-in-touch-title", {
      scrollTrigger: {
        trigger: ".get-in-touch-section",
        start: "top 80%",
        toggleActions: "play none none reverse"
      },
      y: 50,
      opacity: 0,
      duration: 1
    });

    gsap.from(".get-in-touch-card", {
      scrollTrigger: {
        trigger: ".get-in-touch-grid",
        start: "top 90%",
        toggleActions: "play none none reverse"
      },
      y: 50,
      opacity: 0,
      duration: 1,
      stagger: 0.2
    });

     gsap.from(".connect-form-title", {
      scrollTrigger: {
        trigger: ".connect-form-section",
        start: "top 85%",
        toggleActions: "play none none reverse"
      },
      y: 40,
      opacity: 0,
      duration: 1
    });

    gsap.from(".connect-form-wrapper", {
      scrollTrigger: {
        trigger: ".connect-form-wrapper",
        start: "top 90%",
        toggleActions: "play none none reverse"
      },
      y: 60,
      opacity: 0,
      duration: 1.2
    });
}