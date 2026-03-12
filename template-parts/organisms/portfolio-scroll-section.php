<?php
/**
 * Organism: Portfolio Scroll Section
 * Path: template-parts/organisms/portfolio-scroll-section.php
 */

$portfolio_items = get_sub_field('portfolio_posts'); // Relationship field from ACF

// Safety check
if ( ! $portfolio_items ) {
    return;
}
?>

<section class="o-portfolio-scroll">
    <div class="o-portfolio-scroll__container">
        
        <?php 
        // We now call the Molecule, which handles its own internal 2-column layout
        get_template_part('template-parts/molecules/card-stack', null, [
            'portfolio_items' => $portfolio_items
        ]); 
        ?>

    </div>
</section>

<style>
/* The Stage: This handles the Scroll-Locking area */
.o-portfolio-scroll {
    width: 100%;
    overflow: hidden;
    background-color: #fcfcfc; /* Very light gray to make white cards pop */
}

.o-portfolio-scroll__container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh; /* Critical: This defines the pinning 'window' */
    width: 100%;
    max-width: 1440px;
    margin: 0 auto;
    padding: 0 5%;
}

/* Ensure the molecule inside fills the available space */
.o-portfolio-scroll__container > .m-portfolio-reveal {
    width: 100%;
}
</style>