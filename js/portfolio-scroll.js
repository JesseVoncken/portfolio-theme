const sections = document.querySelectorAll('.o-portfolio-scroll');

sections.forEach((section) => {
    const cards = gsap.utils.toArray(section.querySelectorAll('.m-card-stack__item'));
    const texts = gsap.utils.toArray(section.querySelectorAll('.m-portfolio-reveal__text-item'));

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: "top top",
            end: () => "+=" + (cards.length * 100) + "%",
            pin: true,
            scrub: 1
        }
    });

    cards.forEach((card, i) => {
        if (i < cards.length - 1) {
            // Slide card up
            tl.to(card, { 
                yPercent: -120, 
                ease: "power1.inOut" 
            }, i);

            // Toggle Text active states
            // We use a callback to swap classes for CSS transitions
            tl.call(() => {
                texts.forEach(t => t.classList.remove('is-active'));
                texts[i + 1].classList.add('is-active');
            }, null, i + 0.5); 
        }
    });
});