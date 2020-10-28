<?php

/**
 * Feature block
 *
 * @package      TheLanding
 * @author       Christopher McComas
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

$feature_id                 = get_field( 'feature_id' );
$top_arrow_color            = get_field( 'top_arrow_color' );
$feature_title              = get_field( 'feature_title' );
$feature_intro              = get_field( 'feature_intro' );
$background_image           = get_field( 'background_image' );
$background_image_position  = get_field( 'background_image_position' );
$container_overlay_color    = get_field( 'container_overlay_color' );
$left_list                  = get_field( 'left_list' );
$right_list                 = get_field( 'right_list' );

$topPadding = ' pt-16 ';
if ($top_arrow_color) {
    $topPadding = ' pt-8 ';
}

echo '<div id="' . esc_attr( $feature_id ) . '" x-ref="' . esc_attr( $feature_id ) . '">';

echo '<div class="w-full" style="background-image: url(' . esc_url( $background_image['url'] ) . '); background-position: ' . esc_attr( $background_image_position  ) . '">';
echo '<div class="bg-' . $container_overlay_color . '-overlay-70">';
if ($top_arrow_color) {
    echo '<div class="arrow-top lg:arrow-top-lg ' . esc_attr( $top_arrow_color ) . '-arrow-top"></div>';
}
echo '<div class="w-full xl:max-w-screen-xl xl:mx-auto px-8 lg:px-0 ' . $topPadding . '">';
echo '<h2 class="font-serif text-4xl lg:text-6xl text-shadow uppercase text-white text-center lg:text-left">' . esc_attr( $feature_title ) . '</h2>';
echo '<div class="flex flex-wrap items-start pt-4 lg:pt-8 pb-16">';
echo '<div class="w-full lg:w-1/3">';
echo '<div class="text-white text-base lg:text-xl leading-loose text-shadow">' . $feature_intro . '</div>';
echo '</div>';
echo '<div class="mt-6 lg:mt-0 lg:flex-1 flex flex-wrap justify-end lg:-mx-6 text-white text-base lg:text-lg text-shadow leading-loose">';
echo '<div class="w-full lg:w-auto lg:px-6">';
echo $left_list;
echo '</div>';
echo '<div class="w-full lg:w-auto lg:px-6">';
echo $right_list;
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
