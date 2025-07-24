document.addEventListener('DOMContentLoaded', function () {
    gsap.registerPlugin(ScrollTrigger);
    initOurcirriculumAnimations();
    initCurriculumAnimations();
     new EnhancedCarousel();
    initEnhancedCarouselAnimations();
    
});

function initOurcirriculumAnimations() {
   gsap.from(".curriculum-image", {
    scrollTrigger: {
      trigger: ".curriculum-section",
      start: "top 80%",
      toggleActions: "play none none none"
    },
    opacity: 0,
    x: -100,
    duration: 1
  });

  gsap.from(".curriculum-text", {
    scrollTrigger: {
      trigger: ".curriculum-section",
      start: "top 80%",
      toggleActions: "play none none none"
    },
    opacity: 0,
    x: 100,
    duration: 1
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

       gsap.from(".play-image", {
    scrollTrigger: {
      trigger: ".play-approach-section",
      start: "top 80%",
      toggleActions: "play none none none"
    },
    opacity: 0,
    x: -80,
    duration: 1
  });

  gsap.from(".play-text", {
    scrollTrigger: {
      trigger: ".play-approach-section",
      start: "top 80%",
      toggleActions: "play none none none"
    },
    opacity: 0,
    x: 80,
    duration: 1
  });
}

class EnhancedCarousel {
    constructor() {
        this.carousel = document.getElementById("enhanced-carousel-track");
        this.slides = document.querySelectorAll(".carousel-slide");
        this.prevBtn = document.getElementById("enhanced-prev-btn");
        this.nextBtn = document.getElementById("enhanced-next-btn");
        this.playPauseBtn = document.getElementById("play-pause-btn");
        this.playIcon = document.getElementById("play-icon");
        this.pauseIcon = document.getElementById("pause-icon");
        this.currentSlideSpan = document.getElementById("current-slide");
        this.totalSlidesSpan = document.getElementById("total-slides");
        this.progressBar = document.getElementById("progress-bar");
        this.indicatorsWrapper = document.getElementById("indicators-wrapper");
        
        this.currentIndex = 0;
        this.isAutoPlaying = true;
        this.autoPlayInterval = null;
        this.autoPlayDelay = 4000;
        this.isTransitioning = false;
        this.touchStartX = 0;
        this.touchEndX = 0;
        
        this.init();
    }
    
    init() {
        this.createIndicators();
        this.setupEventListeners();
        this.setupTouchEvents();
        this.updateCarousel();
        this.startAutoPlay();
        this.updateProgressBar();
    }
    
    getVisibleSlides() {
        return window.innerWidth < 768 ? 1 : 3;
    }
    
    createIndicators() {
        this.indicatorsWrapper.innerHTML = '';
        const maxIndex = this.slides.length - this.getVisibleSlides();
        
        for (let i = 0; i <= maxIndex; i++) {
            const indicator = document.createElement('button');
            indicator.className = 'carousel-indicator w-3 h-3 rounded-full bg-gray-300 transition-all duration-300';
            indicator.dataset.index = i;
            indicator.addEventListener('click', () => this.goToSlide(i));
            this.indicatorsWrapper.appendChild(indicator);
        }
        
        this.updateIndicators();
    }
    
    setupEventListeners() {
        this.prevBtn.addEventListener('click', () => this.previousSlide());
        this.nextBtn.addEventListener('click', () => this.nextSlide());
        this.playPauseBtn.addEventListener('click', () => this.toggleAutoPlay());
        
        window.addEventListener('resize', () => {
            this.createIndicators();
            this.updateCarousel();
        });
        
        // Pause on hover
        this.carousel.addEventListener('mouseenter', () => this.pauseAutoPlay());
        this.carousel.addEventListener('mouseleave', () => this.resumeAutoPlay());
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.previousSlide();
            if (e.key === 'ArrowRight') this.nextSlide();
            if (e.key === ' ') {
                e.preventDefault();
                this.toggleAutoPlay();
            }
        });
    }
    
    setupTouchEvents() {
        this.carousel.addEventListener('touchstart', (e) => {
            this.touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        
        this.carousel.addEventListener('touchend', (e) => {
            this.touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe();
        }, { passive: true });
    }
    
    handleSwipe() {
        const swipeThreshold = 50;
        const diff = this.touchStartX - this.touchEndX;
        
        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                this.nextSlide();
            } else {
                this.previousSlide();
            }
        }
    }
    
    goToSlide(index) {
        if (this.isTransitioning) return;
        
        const maxIndex = this.slides.length - this.getVisibleSlides();
        this.currentIndex = Math.max(0, Math.min(index, maxIndex));
        this.updateCarousel();
        this.resetAutoPlay();
    }
    
    nextSlide() {
        if (this.isTransitioning) return;
        
        const maxIndex = this.slides.length - this.getVisibleSlides();
        this.currentIndex = this.currentIndex >= maxIndex ? 0 : this.currentIndex + 1;
        this.updateCarousel();
        this.resetAutoPlay();
    }
    
    previousSlide() {
        if (this.isTransitioning) return;
        
        const maxIndex = this.slides.length - this.getVisibleSlides();
        this.currentIndex = this.currentIndex <= 0 ? maxIndex : this.currentIndex - 1;
        this.updateCarousel();
        this.resetAutoPlay();
    }
    
    updateCarousel() {
        this.isTransitioning = true;
        const visibleSlides = this.getVisibleSlides();
        const slideWidth = 100 / visibleSlides;
        const translateX = -this.currentIndex * slideWidth;
        
        gsap.to(this.carousel, {
            x: `${translateX}%`,
            duration: 0.6,
            ease: "power2.out",
            onComplete: () => {
                this.isTransitioning = false;
            }
        });
        
        this.updateIndicators();
        this.updateSlideCounter();
        this.updateNavigationButtons();
        this.animateCurrentSlides();
    }
    
    animateCurrentSlides() {
        const visibleSlides = this.getVisibleSlides();
        const startIndex = this.currentIndex;
        const endIndex = Math.min(startIndex + visibleSlides, this.slides.length);
        
        // Reset all slides
        gsap.set(this.slides, { scale: 1, opacity: 0.8 });
        
        // Animate visible slides
        for (let i = startIndex; i < endIndex; i++) {
            gsap.to(this.slides[i], {
                scale: 1,
                opacity: 1,
                duration: 0.4,
                ease: "back.out(1.7)",
                delay: (i - startIndex) * 0.1
            });
        }
    }
    
    updateIndicators() {
        const indicators = this.indicatorsWrapper.querySelectorAll('.carousel-indicator');
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === this.currentIndex);
        });
    }
    
    updateSlideCounter() {
        this.currentSlideSpan.textContent = this.currentIndex + 1;
        this.totalSlidesSpan.textContent = this.slides.length - this.getVisibleSlides() + 1;
    }
    
    updateNavigationButtons() {
        const maxIndex = this.slides.length - this.getVisibleSlides();
        this.prevBtn.disabled = this.currentIndex === 0;
        this.nextBtn.disabled = this.currentIndex === maxIndex;
    }
    
    startAutoPlay() {
        if (!this.isAutoPlaying) return;
        
        this.autoPlayInterval = setInterval(() => {
            this.nextSlide();
        }, this.autoPlayDelay);
        
        this.updateProgressBar();
    }
    
    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
    }
    
    toggleAutoPlay() {
        this.isAutoPlaying = !this.isAutoPlaying;
        
        if (this.isAutoPlaying) {
            this.startAutoPlay();
            this.playIcon.classList.add('hidden');
            this.pauseIcon.classList.remove('hidden');
        } else {
            this.stopAutoPlay();
            this.playIcon.classList.remove('hidden');
            this.pauseIcon.classList.add('hidden');
        }
    }
    
    pauseAutoPlay() {
        this.stopAutoPlay();
    }
    
    resumeAutoPlay() {
        if (this.isAutoPlaying) {
            this.startAutoPlay();
        }
    }
    
    resetAutoPlay() {
        if (this.isAutoPlaying) {
            this.stopAutoPlay();
            this.startAutoPlay();
        }
    }
    
    updateProgressBar() {
        if (!this.isAutoPlaying || !this.autoPlayInterval) return;
        
        let progress = 0;
        const progressInterval = setInterval(() => {
            progress += (100 / (this.autoPlayDelay / 50));
            this.progressBar.style.width = `${Math.min(progress, 100)}%`;
            
            if (progress >= 100) {
                clearInterval(progressInterval);
                this.progressBar.style.width = '0%';
                if (this.isAutoPlaying) {
                    setTimeout(() => this.updateProgressBar(), 100);
                }
            }
        }, 50);
    }
}

// Initialize enhanced animations
function initEnhancedCarouselAnimations() {
    // Header animations
    gsap.from("#carousel-title", {
        opacity: 0,
        y: 50,
        duration: 1.2,
        ease: "power3.out",
        scrollTrigger: {
            trigger: "#enhanced-carousel-section",
            start: "top 80%",
            toggleActions: "play none none reverse"
        }
    });
    
    gsap.from("#carousel-subtitle", {
        opacity: 0,
        y: 30,
        duration: 1,
        delay: 0.3,
        ease: "power2.out",
        scrollTrigger: {
            trigger: "#enhanced-carousel-section",
            start: "top 75%",
            toggleActions: "play none none reverse"
        }
    });
    
    // Carousel container animation
    gsap.from("#enhanced-carousel-container", {
        opacity: 0,
        scale: 0.9,
        duration: 1.2,
        delay: 0.5,
        ease: "back.out(1.7)",
        scrollTrigger: {
            trigger: "#enhanced-carousel-container",
            start: "top 85%",
            toggleActions: "play none none reverse"
        }
    });
    
    // Controls animation
    gsap.from("#carousel-indicators-container", {
        opacity: 0,
        y: 20,
        duration: 0.8,
        delay: 0.8,
        ease: "power2.out",
        scrollTrigger: {
            trigger: "#carousel-indicators-container",
            start: "top 90%",
            toggleActions: "play none none reverse"
        }
    });
}