<?php
/**
 * Molecule: Card Stack
 * This molecule loops through portfolio items and stacks them for the scroll reveal effect.
 * * @param array $args {
 * @var array $portfolio_items  An array of post objects or IDs.
 * }
 */

$portfolio_items = $args['portfolio_items'] ?? [];

if (empty($portfolio_items)) {
    return; // Exit if no items provided
}

$total_items = count($portfolio_items);
?>

<div class="m-card-stack">
    <?php 
    foreach ($portfolio_items as $index => $item_post) : 
        // Calculate z-index so the first card (index 0) is on top.
        // Example: If 4 items, index 0 gets z-index 4, index 3 gets z-index 1.
        $z_index = $total_items - $index;
        
        // Prepare data for the card atom
        $card_data = [
            'image_url' => get_the_post_thumbnail_url($item_post, 'large'),
            'title'     => get_the_title($item_post),
            'category'  => get_field('project_category', $item_post) ?: 'Portfolio', // Change to your field/taxonomy
            'permalink' => get_permalink($item_post),
        ];
    ?>
        <div class="m-card-stack__item" style="z-index: <?php echo $z_index; ?>;">
            <?php get_template_part('parts/atoms/card', null, $card_data); ?>
        </div>
    <?php endforeach; ?>
</div>
