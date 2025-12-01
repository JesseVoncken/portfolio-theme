<?php
// Retrieve data passed to this template part. 
// We use $args here because the data comes from 'get_template_part'
$paragraph_text = $args['paragraph_text'] ?? '';

$allowed_html = array(
    'br' => array(),      // Allow line breaks
    'em' => array(),      // Optional: Allow italics
    'strong' => array(),  // Optional: Allow bold text
    'span' => array(      // Optional: Allow spans with class attributes
        'class' => array()
    )
);
?>

<p class="scroll-reveal"> 
    <?php echo wp_kses($paragraph_text, $allowed_html); ?> 
</p>