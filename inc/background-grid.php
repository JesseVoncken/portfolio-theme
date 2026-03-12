<?php
/**
 * Injects responsive background grid styling with custom vignette fade. Test 
 */
function my_portfolio_background_grid() {
    ?>
    <style id="portfolio-background-grid">
        body {
            background-color: #ffffff;
            /* Center the 110px grid dynamically */
            background-image: 
                /* 1. White vignette mask that fades grid to edges */
                radial-gradient(circle at center, transparent 20%, #ffffff 90%),
                /* 2. Vertical grid lines */
                linear-gradient(to right, #EBEBEB 1px, transparent 1px),
                /* 3. Horizontal grid lines */
                linear-gradient(to bottom, #EBEBEB 1px, transparent 1px);
            
            /* Set desktop grid size */
            background-size: 100% 100%, 110px 110px, 110px 110px;
            
            /* Center the grid relative to the viewport width/height */
            background-position: center center, center center, center center;
            background-attachment: fixed;
        }

        /* Mobile adjustment */
        @media (max-width: 768px) {
            body {
                /* Downscale grid squares to 70px on smaller screens */
                background-size: 100% 100%, 70px 70px, 70px 70px;
            }
        }
    </style>
    <?php
}
add_action( 'wp_head', 'my_portfolio_background_grid' );