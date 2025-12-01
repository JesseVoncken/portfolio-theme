// script.js (Simplified for Pure CSS Staggering)

document.addEventListener('DOMContentLoaded', () => {
    // 1. Get all elements that need the scroll-reveal effect
    const revealElements = document.querySelectorAll('.scroll-reveal');

    // 2. Define the callback function for the observer
    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Simply add the class that unpauses the CSS animation
                entry.target.classList.add('is-visible'); 
                
                // Stop observing the element
                observer.unobserve(entry.target);
            }
        });
    };

    // 3. Define the observer options
    const observerOptions = {
        root: null, 
        rootMargin: '0px', 
        threshold: 0.1 
    };

    // 4. Create the observer and start observing
    const observer = new IntersectionObserver(observerCallback, observerOptions);

    revealElements.forEach(element => {
        observer.observe(element);
    });
});