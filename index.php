<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package portfolio
 */

get_header();
?>

    <main id="primary" class="site-main home-hero-page">
        <section class="home-hero" aria-label="Homepage hero section">
            <div class="home-hero__inner">
                <h1 class="home-hero__title">
                    <span class="home-hero__intro">Hey, ik ben</span>
                    <span class="home-hero__name-wrap">
                        <span class="home-hero__name">Jesse</span>
                        <img class="home-hero__swirl" src="<?php echo esc_url( get_template_directory_uri() . '/assets/swirl.svg' ); ?>" alt="" aria-hidden="true">
                    </span>
                </h1>

                <p class="home-hero__subtitle">
                    Ik ben een <b>webdeveloper</b> gespecialiseerd in het bouwen van <b>snelle, gebruiksvriendelijke</b> websites.
                </p>

                <div class="home-hero__spline-wrap" style="position: relative; width: 100%; height: 550px; display: flex; justify-content: center; align-items: center;">
                    <canvas id="hero-spline-canvas" style="width: 100%; height: 100%; outline: none;"></canvas>
                </div>

                <script type="module">
    import { Application } from 'https://unpkg.com/@splinetool/runtime';

    const canvas = document.getElementById('hero-spline-canvas');
    const app = new Application(canvas);

    try {
        await app.load('https://prod.spline.design/ewmLBQwLX4Wgfr9f/scene.splinecode');
        console.log('Spline scene successfully loaded!');

        const maxAngle = 15; // Max tilt in degrees

        const updateSplineMousePosition = (event) => {
            if (window.scrollY > 600) return;

            // Normalized coordinates (-1 to 1)
            const normX = (event.clientX / window.innerWidth) * 2 - 1;
            const normY = (event.clientY / window.innerHeight) * 2 - 1;

            const mouseX = Number((normX * maxAngle).toFixed(2));
            const mouseY = Number((normY * maxAngle).toFixed(2)); // Flipped to positive

            console.log(`Spline Variables (deg) -> mouseX: ${mouseX}°, mouseY: ${mouseY}°`);

            // Pass values to Spline
            app.setVariable('mouseX', mouseX);
            app.setVariable('mouseY', mouseY);
        };

        window.addEventListener('pointermove', updateSplineMousePosition, { passive: true });

    } catch (error) {
        console.error('Spline failed to load:', error);
    }
</script>
            </div>
        </section>
    </main><!-- #main -->

<?php
get_footer();