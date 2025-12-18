<?php
/**
 * Organism: Portfolio Scroll Section
 * This handles the layout and provides the 'pinning' target for GSAP.
 */

$text_content = get_field('paragraph_text'); // ACF field for the text atom
$portfolio_items = get_field('portfolio_posts'); // ACF Relationship/Post Object field

$block_id = 'o-portfolio-scroll-' . $block['id'];
?>

<section id="<?php echo esc_attr($block_id); ?>" class="o-portfolio-scroll">
    <div class="o-portfolio-scroll__container">
        
        <div class="o-portfolio-scroll__text-column">
            <?php 
            get_template_part('parts/atoms/text', null, [
                'paragraph_text' => $text_content
            ]); 
            ?>
        </div>

        <div class="o-portfolio-scroll__visual-column">
            <?php 
            get_template_part('parts/molecules/card-stack', null, [
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