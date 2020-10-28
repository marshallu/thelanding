<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TheLanding
 */

get_header();

if ( is_home() ) {
	echo '<img src="<?php echo get_template_directory_uri() ?>/images/Banner_BDS-scaled.jpg">';	}
?>
	<div class="w-full xl:max-w-screen-xl xl:mx-auto bg-white">
		<div>
			<?php while (have_posts()) : the_post(); ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<header>

						<?php if ( ! is_home() ) {
							get_template_part('template-parts/page-title');
						}
						 ?>
					</header>

					<div class="entry-content px-6 py-12 ">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile;?>
		</div>
	</div>

<?php
get_footer();
