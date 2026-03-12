<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
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
					Ik ben een <b>webdeveloper</b> gespecialiseerd in het bouwen van  <b>snelle, gebruiksvriendelijke</b>  websites.
				</p>

				<a class="home-hero__button" href="mailto:hello@jesse.nl">Stuur een bericht</a>

				<div class="home-hero__spline-wrap">
					<spline-viewer url="https://prod.spline.design/ewmLBQwLX4Wgfr9f/scene.splinecode"></spline-viewer>
				</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
