<!-- Footer -->
<footer>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
</footer>

<script>
// Mobile Navigation Toggle
const hamburger = document.getElementById("hamburger");
const navLinks = document.getElementById("navLinks");
const navOverlay = document.getElementById("navOverlay");

function toggleMobileMenu() {
    navLinks.classList.toggle("active");
    hamburger.classList.toggle("active");
    navOverlay.classList.toggle("active");
    if (navLinks.classList.contains("active")) {
        document.body.style.overflow = "hidden";
    } else {
        document.body.style.overflow = "auto";
    }
}

function closeMobileMenu() {
    navLinks.classList.remove("active");
    hamburger.classList.remove("active");
    navOverlay.classList.remove("active");
    document.body.style.overflow = "auto";
}

hamburger.addEventListener("click", toggleMobileMenu);
navOverlay.addEventListener("click", closeMobileMenu");

// Close mobile menu when clicking a link
document.querySelectorAll(".nav-links a").forEach((link) => {
    link.addEventListener("click", () => {
        closeMobileMenu();
    });
});

// Navbar scroll effect and scroll progress
const navbar = document.getElementById("navbar");
const scrollProgress = document.getElementById("scrollProgress");

window.addEventListener("scroll", () => {
    // Navbar scroll effect
    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }

    // Scroll progress indicator
    const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (window.scrollY / windowHeight) * 100;
    scrollProgress.style.width = scrolled + "%";

    // Parallax effect on hero slides
    const heroSlides = document.querySelectorAll(".hero-slide");
    const scrollPosition = window.scrollY;
    heroSlides.forEach((slide) => {
        slide.style.transform = `translateY(${scrollPosition * 0.5}px)`;
    });
});

// Intersection Observer for fade-in animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add("visible");
        }
    });
}, observerOptions);

// Observe all elements with fade-in class
document.querySelectorAll(".fade-in").forEach((el) => {
    observer.observe(el);
});

// Observe about gallery images
document.querySelectorAll(".about-gallery-image").forEach((el) => {
    observer.observe(el);
});

// Observe portfolio gallery images
document.querySelectorAll(".gallery-image").forEach((el) => {
    observer.observe(el);
});

// Form submission handler (if contact form exists)
const contactForm = document.getElementById("contactForm");
if (contactForm) {
    contactForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const name = document.getElementById("name").value;
        alert(`Thank you, ${name}! We've received your message and will get back to you soon.`);
        contactForm.reset();
    });
}

// Smooth scroll with offset for fixed navbar
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            const offsetTop = target.offsetTop - 70;
            window.scrollTo({
                top: offsetTop,
                behavior: "smooth",
            });
        }
    });
});

// Hero Carousel
let currentHeroSlide = 0;
const heroSlides = document.querySelectorAll(".hero-slide");
const totalHeroSlides = heroSlides.length;
let heroInterval;

function showHeroSlide(index) {
    heroSlides.forEach((slide) => slide.classList.remove("active"));
    if (heroSlides[index]) {
        heroSlides[index].classList.add("active");
    }
}

function nextHeroSlide() {
    currentHeroSlide = (currentHeroSlide + 1) % totalHeroSlides;
    showHeroSlide(currentHeroSlide);
}

function startHeroCarousel() {
    if (totalHeroSlides > 0) {
        heroInterval = setInterval(nextHeroSlide, 5000);
    }
}

// Start hero carousel on page load
startHeroCarousel();

// Brands Carousel
let currentSlide = 0;
const slides = document.querySelectorAll(".carousel-slide");
const dots = document.querySelectorAll(".dot");
const totalSlides = slides.length;
let carouselInterval;

function showSlide(index) {
    slides.forEach((slide) => slide.classList.remove("active"));
    dots.forEach((dot) => dot.classList.remove("active"));

    if (slides[index]) {
        slides[index].classList.add("active");
    }
    if (dots[index]) {
        dots[index].classList.add("active");
    }
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

function startCarousel() {
    if (totalSlides > 0) {
        carouselInterval = setInterval(nextSlide, 3000);
    }
}

function stopCarousel() {
    clearInterval(carouselInterval);
}

// Dot click functionality
dots.forEach((dot) => {
    dot.addEventListener("click", function () {
        stopCarousel();
        currentSlide = parseInt(this.getAttribute("data-slide"));
        showSlide(currentSlide);
        startCarousel();
    });
});

// Start the carousel on page load
startCarousel();

// Pause carousel on hover
const carouselWrapper = document.querySelector(".carousel-wrapper");
if (carouselWrapper) {
    carouselWrapper.addEventListener("mouseenter", stopCarousel);
    carouselWrapper.addEventListener("mouseleave", startCarousel);
}

// Lightbox functionality
const lightbox = document.getElementById("lightbox");
const lightboxImg = document.getElementById("lightbox-img");
const lightboxClose = document.querySelector(".lightbox-close");
const galleryImages = document.querySelectorAll(".gallery-image img");

// Open lightbox when clicking on gallery images
galleryImages.forEach((img) => {
    img.addEventListener("click", function () {
        lightbox.classList.add("active");
        lightboxImg.src = this.src;
        lightboxImg.alt = this.alt;
        document.body.style.overflow = "hidden";
    });
});

// Close lightbox when clicking the close button
if (lightboxClose) {
    lightboxClose.addEventListener("click", function () {
        lightbox.classList.remove("active");
        document.body.style.overflow = "auto";
    });
}

// Close lightbox when clicking outside the image
if (lightbox) {
    lightbox.addEventListener("click", function (e) {
        if (e.target === lightbox) {
            lightbox.classList.remove("active");
            document.body.style.overflow = "auto";
        }
    });
}

// Close lightbox with Escape key
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && lightbox && lightbox.classList.contains("active")) {
        lightbox.classList.remove("active");
        document.body.style.overflow = "auto";
    }
});
</script>

<?php wp_footer(); ?>

</body>
</html>
