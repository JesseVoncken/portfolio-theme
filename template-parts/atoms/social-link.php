<?php
/**
 * Atom: Social Icon Link with Conditional SVG
 * Expects $args['url'] and $args['platform'] (e.g., 'instagram', 'linkedin') to be passed.
 */

$url = $args['url'] ?? '';
$platform = strtolower($args['platform'] ?? ''); // Standardize the platform name to lowercase for reliable comparison

// Safety check: Only render if we have a URL and a platform type
if (empty($url) || empty($platform)) {
    return;
}

// --- Conditional Logic for SVG ---
// Use a switch statement for clean conditional rendering of the icon.
switch ($platform) {
    case 'instagram':
        $svg_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>';
        $platform_name = 'Instagram';
        break;
    case 'linkedin':
        $svg_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>';
        $platform_name = 'LinkedIn';
        break;
    case 'youtube':
        $svg_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.5 17.5c0 .35 0 2.25 2.5 2.5h14c2.5 0 2.5-2.15 2.5-2.5 0-4.5-3.5-5.5-3.5-5.5 1 0 3.5.5 3.5 3 0 2-2 3-2 3H5s-2.5-.5-2.5-3.5c0-2 2-3 2-3s-3.5 1-3.5 5.5z"></path><polygon points="12 4 8 13 16 13 12 4"></polygon></svg>';
        $platform_name = 'YouTube';
        break;
    // Add other platforms here (e.g., 'facebook', 'x', 'github')
    default:
        $svg_icon = ''; // No icon found
        $platform_name = 'Social';
        break;
}
// --- End Conditional Logic ---
?>

<a href="<?php echo esc_url($url); ?>" 
   target="_blank" 
   rel="noopener noreferrer" 
   class="atom-social-icon atom-social-icon--<?php echo esc_attr($platform); ?>"
   aria-label="<?php echo esc_attr($platform_name); ?>">
    
    <span class="screen-reader-text"><?php echo esc_html($platform_name) . ' profile'; ?></span>
    
    <span class="icon-svg-wrapper">
        <?php echo $svg_icon; ?>
    </span>
</a>