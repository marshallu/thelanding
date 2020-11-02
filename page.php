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

get_header( 'basic' );

?>
	<div class="w-full xl:max-w-screen-xl xl:mx-auto px-6 lg:px-0 bg-white mt-24 pt-8 pb-16">
		<div class="w-full lg:w-3/4">
			<?php while (have_posts()) : the_post(); ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<header>
						<?php get_template_part('template-parts/page-title'); ?>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile;?>
		</div>
	</div>

<?php
get_footer();
