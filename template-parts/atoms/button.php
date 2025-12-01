<?php
// Retrieve data passed to this template part. 
// We use $args here because the data comes from 'get_template_part'
$button_text = $args['text'] ?? '';
$button_url  = $args['url'] ?? '#';
$button_style = $args['style'] ?? 'primary'; // <--- ADDED: Must retrieve the style class
?>

<a href="<?php echo esc_url($button_url); ?>" 
   class="scroll-reveal atom-button atom-button--<?php echo esc_attr($button_style); ?>"> <?php echo esc_html($button_text); ?> 
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-5 w-5" data-dyad-id="src\components\Hero.tsx:85:29" data-dyad-name="ArrowRight">
        <path d="M5 12h14"/>
        <path d="m12 5 7 7-7 7"/>
    </svg>
</a>