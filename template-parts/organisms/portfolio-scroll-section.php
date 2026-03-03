<?php
/**
 * Organism: Portfolio Scroll Section
 * Path: template-parts/organisms/portfolio-scroll-section.php
 */

// Fetch data from the current Flexible Content row
$text_content    = get_sub_field('paragraph_text');
$portfolio_items = get_sub_field('portfolio_posts'); // Relationship field

?>

<section class="o-portfolio-scroll">
    <div class="o-portfolio-scroll__container">
        
        <div class="o-portfolio-scroll__text-column">
            <?php 
            // Pass data to the Text Atom
            get_template_part('template-parts/atoms/text', null, [
                'paragraph_text' => $text_content
            ]); 
            ?>
        </div>

        <div class="o-portfolio-scroll__visual-column">
            <?php 
            // Pass data to the Card Stack Molecule
            get_template_part('template-parts/molecules/card-stack', null, [
                'portfolio_items' => $portfolio_items
            ]); 
            ?>
        </div>

    </div>
</section>

<style>
/* Essential Layout for Pinning */
.o-portfolio-scroll {
    width: 100%;
    overflow: hidden;
}

.o-portfolio-scroll__container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100vh; /* Ensures the section fills the screen while pinned */
    padding: 0 5%;
    gap: 40px;
}

.o-portfolio-scroll__text-column {
    flex: 1;
    max-width: 400px;
}

.o-portfolio-scroll__visual-column {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>