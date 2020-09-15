<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<div class="w-full xl:max-w-screen-xl px-6 lg:px-10 xl:px-0 xl:mx-auto py-12 bg-white">
    <div>
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

<!-- Footer -->
<?php get_footer(); ?>