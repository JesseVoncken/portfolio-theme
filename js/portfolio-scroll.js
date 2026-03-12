const tl = gsap.timeline({
    scrollTrigger: {
        trigger: ".o-portfolio-scroll",
        start: "top top",
        end: () => "+=" + (cards.length * 100) + "%",
        pin: true,
        scrub: 1
    }
});

cards.forEach((card, i) => {
    if (i < cards.length - 1) {
        // Slide current card out
        tl.to(card, { 
            y: -200, 
            opacity: 0, 
            rotate: -5,
            duration: 1 
        }, i);

        // Shift the next cards up slightly to "fill the gap"
        tl.to(cards.slice(i + 1), {
            y: "-=8", // Reduces the --offset we set in CSS
            duration: 1
        }, i);

        // Swap Text
        tl.to(texts[i], { opacity: 0, visibility: 'hidden', duration: 0.3 }, i);
        tl.to(texts[i+1], { opacity: 1, visibility: 'visible', duration: 0.3 }, i + 0.3);
    }
});