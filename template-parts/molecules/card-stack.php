<?php
/**
 * Molecule: Card Stack
 */
$items = $args['portfolio_items'] ?? [];
$total = count($items);
if (empty($items)) return;
?>

<div class="m-portfolio-grid">
    <div class="m-portfolio-grid__left">
        <?php foreach ($items as $index => $item_post) : 
            $desc = get_field('project_description', $item_post->ID);
            $title = get_the_title($item_post);
        ?>
            <div class="m-portfolio-grid__text-item <?php echo $index === 0 ? 'is-active' : ''; ?>">
                <h2 class="a-portfolio-display-title"><?php echo esc_html($title); ?></h2>
                <p class="a-portfolio-description"><?php echo esc_html($desc); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="m-portfolio-grid__right">
        <div class="m-card-stack-container">
            <?php foreach ($items as $index => $item_post) : 
                $z_index = $total - $index;
            ?>
                <div class="m-card-stack-item" style="z-index: <?php echo $z_index; ?>; --offset: <?php echo $index * 8; ?>px;">
                    <?php get_template_part('template-parts/atoms/card', null, [
                        'image_url' => get_the_post_thumbnail_url($item_post, 'large'),
                        'title'     => get_the_title($item_post),
                        'desc'      => get_field('project_description', $item_post->ID)
                    ]); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>