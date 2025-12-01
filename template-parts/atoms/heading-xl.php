<?php
// Retrieve data passed to this template part. 
$h1_text = $args['h1_text'] ?? '';

// Define which tags are allowed
$allowed_html = array(
    'br' => array(),      // Allow line breaks
    'em' => array(),      // Optional: Allow italics
    'strong' => array(),  // Optional: Allow bold text
    'span' => array(      // Optional: Allow spans with class attributes
        'class' => array()
    )
);
?>

<h1 class="scroll-reveal"> 
    <?php echo wp_kses($h1_text, $allowed_html); ?> 
</h1>