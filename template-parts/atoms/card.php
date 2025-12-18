<?php
/**
 * Atom: Portfolio Card
 * * @param array $args {
 * @var string $image_url    The URL of the featured image.
 * @var string $title        The project title.
 * @var string $category     The project category or tag.
 * @var string $permalink    The link to the single portfolio page.
 * }
 */

$image_url = $args['image_url'] ?? '';
$title     = $args['title'] ?? 'Project Title';
$category  = $args['category'] ?? 'Category';
$permalink = $args['permalink'] ?? '#';

// Ensure we have a placeholder if no image exists
if (empty($image_url)) {
    $image_url = get_template_directory_uri() . '/assets/images/placeholder.jpg';
}
?>

<div class="a-portfolio-card">
    <a href="<?php echo esc_url($permalink); ?>" class="a-portfolio-card__link">
        <div class="a-portfolio-card__image-wrapper">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="a-portfolio-card__image">
        </div>
        
        <div class="a-portfolio-card__meta">
            <span class="a-portfolio-card__category"><?php echo esc_html($category); ?></span>
            <h3 class="a-portfolio-card__title"><?php echo esc_html($title); ?></h3>
        </div>
    </a>
</div>