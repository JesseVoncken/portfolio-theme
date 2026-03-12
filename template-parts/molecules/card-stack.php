<?php
/**
 * Molecule: Card Stack
 * Path: template-parts/molecules/card-stack.php
 */
$items = $args['portfolio_items'] ?? [];
$total = count($items);

if (empty($items)) return;
?>

<div class="m-portfolio-reveal">
    <div class="m-portfolio-reveal__text-pane">
        <?php foreach ($items as $index => $item_post) : 
            $description = get_field('project_description', $item_post->ID);
            $title = get_the_title($item_post);
        ?>
            <div class="m-portfolio-reveal__text-item <?php echo $index === 0 ? 'is-active' : ''; ?>" data-index="<?php echo $index; ?>">
                <h2 class="a-portfolio-title"><?php echo esc_html($title); ?></h2>
                <?php get_template_part('template-parts/atoms/text', null, ['paragraph_text' => $description]); ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="m-portfolio-reveal__card-pane">
        <div class="m-card-stack">
            <?php foreach ($items as $index => $item_post) : 
                $z_index = $total - $index;
                $card_args = [
                    'image_url' => get_the_post_thumbnail_url($item_post, 'large'),
                    'title'     => get_the_title($item_post),
                    'permalink' => get_permalink($item_post)
                ];
            ?>
                <div class="m-card-stack__item" style="z-index: <?php echo $z_index; ?>;">
                    <?php get_template_part('template-parts/atoms/card', null, $card_args); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>