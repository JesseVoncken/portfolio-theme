<?php
/**
 * Atom: Portfolio Card
 * Path: template-parts/atoms/card.php
 */

$image_url = $args['image_url'] ?? '';
$title     = $args['title'] ?? 'Project Title';
$desc      = $args['desc'] ?? 'Project description goes here...';
?>

<div class="a-portfolio-card">
    <div class="a-portfolio-card__image-container">
        <?php if ( $image_url ) : ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
        <?php else : ?>
            <div class="a-portfolio-card__placeholder">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
            </div>
        <?php endif; ?>
    </div>

    <div class="a-portfolio-card__content">
        <div class="a-portfolio-card__header">
            <div class="a-portfolio-card__icon">
                <span>‹/›</span>
            </div>
            <h3 class="a-portfolio-card__title"><?php echo esc_html($title); ?></h3>
        </div>
        <p class="a-portfolio-card__description">
            <?php echo esc_html($desc); ?>
        </p>
    </div>
</div>