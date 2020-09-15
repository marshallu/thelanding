<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Landing
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo SENTINEL_FONT_URL ?>" />

	<script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
	<script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>


</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<div>

		<header class="bg-repeat pt-8" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/darkbg.png)">
			<div class="w-full xl:max-w-screen-xl px-6 lg:px-10 xl:px-0 xl:mx-auto bg-white flex pt-4">
				<div class="w-full lg:w-2/3 lg:pl-1 lg:pr-12 lg:pb-1"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="Brad D. Smith Foundation Hall logo" /></div>
				<div class="hidden lg:flex lg:w-1/3 text-xs justify-between pr-4">
					<div><a href="#" class="border-t-2 border-green text-gray pt-1">MU Homepage</a></div>
					<div><a href="#" class="border-t-2 border-dark-green text-gray pt-1">MU Alumni Association</a></div>
					<div><a href="#" class="border-t-2 border-light-green text-gray pt-1">MU Alumni Foundation</a></div>
				</div>
			</div>
		</header>

		<div class="bg-dark-brown">
			<div class="w-full xl:max-w-screen-xl xl:mx-auto">
				<?php
					wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu' => 'Primary Navigation', 'menu_class' => 'primary_nav' ) );
				?>
			</div>
		</div>

		<div class="w-full bg-dark-brown">

			<?php
				if ( is_front_page() ) {
					echo '<div class="w-full xl:max-w-screen-xl px-6 lg:px-10 xl:px-0 xl:mx-auto bg-white">';
					echo '<img src="' . get_template_directory_uri() . '/images/Banner_BDS-scaled.jpg" alt="Brad D. Smith Foundation Hall logo" />';
					echo '</div>';
				}

			?>
