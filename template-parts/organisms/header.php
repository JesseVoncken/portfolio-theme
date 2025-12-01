<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page">
	<header id="masthead" class="w-full z-50 top-0 fixed">
	<div class="header_cont">
		<div class="w90 flex items-center mx-auto">
		<a class="font-bold text-2xl items-center"><?php bloginfo( 'name' ); ?></a>
		<nav id="site-navigation" class="flex items-center">
			<?php
			wp_nav_menu();
			?>
			<div class="nav-comp">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-accent-green" data-dyad-id="src\components\Header.tsx:53:16" data-dyad-name="MapPin">
				<path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
				<circle cx="12" cy="10" r="3"></circle>
				</svg>
				<span>Meerssen, Netherlands</span>
			</div>
			<div class="language_cont">
			</div>
		</nav>
		</div>
	</div>
	</header><!-- #masthead -->
