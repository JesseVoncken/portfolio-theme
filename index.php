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

                <div class="home-hero__scene-wrap">
                    <canvas id="hero-three-canvas" aria-hidden="true"></canvas>
                </div>
            </div>
        </section>
    </main><!-- #main -->

<?php
get_footer();
