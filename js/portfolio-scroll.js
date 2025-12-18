// Ensure GSAP and ScrollTrigger are loaded
gsap.registerPlugin(ScrollTrigger);

const section = document.querySelector('.o-portfolio-scroll');
const cards = gsap.utils.toArray('.m-card-stack__item');

// We create a timeline for the pinned section
const tl = gsap.timeline({
    scrollTrigger: {
        trigger: section,
        start: "top top",         // Starts when the top of the section hits the top of the viewport
        end: () => "+=" + (cards.length * 100) + "%", // Duration depends on number of cards
        pin: true,                // Locks the scroll
        scrub: 1,                 // Smoothly follows the scrollbar (1 = 1s delay for smoothness)
        anticipatePin: 1
    }
});

// We animate each card EXCEPT the last one
cards.forEach((card, i) => {
    if (i < cards.length - 1) {
        tl.to(card, {
            yPercent: -120,       // Moves card up and out (extra 20% for clearing shadows)
            ease: "power1.inOut",
        }, i);                    // The 'i' ensures they animate one after another
    }
});