const tl = gsap.timeline({
    scrollTrigger: {
        trigger: ".o-portfolio-scroll",
        start: "top top",
        end: () => "+=" + (cards.length * 150) + "%", // Longer scroll feel
        pin: true,
        scrub: 1
    }
});

cards.forEach((card, i) => {
    if (i < cards.length - 1) {
        // Slide top card out
        tl.to(card, { yPercent: -120, opacity: 0, ease: "power2.inOut" }, i);
        
        // Switch text visibility
        tl.to(texts[i], { opacity: 0, y: -20, duration: 0.3 }, i);
        tl.to(texts[i+1], { opacity: 1, y: 0, duration: 0.3 }, i + 0.3);
    }
});