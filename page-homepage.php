<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<div class="w-full bg-white pt-12">
    <div>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile;?>
    </div>
</div>

<!-- Footer -->
<?php get_footer(); ?>
