<?php

/**
 * Gallery block
 *
 * @package      TheLanding
 * @author       Christopher McComas
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

$gallery_title   = get_field( 'gallery_title' );
$gallery_content = get_field( 'gallery_content' );
$photo_1         = get_field( 'photo_1' );
$photo_2         = get_field( 'photo_2' );
$photo_3         = get_field( 'photo_3' );
$photo_4         = get_field( 'photo_4' );
$photo_5         = get_field( 'photo_5' );
$button          = get_field( 'button' );

echo '<div id="gallery" x-ref="gallery" class="w-full bg-blue-light py-24">';
echo '<div class="w-full xl:max-w-screen-xl xl:mx-auto px-8 lg:px-0">';

echo '<div class="flex flex-wrap flex-col-reverse lg:flex-row lg:-mx-4">';
echo '<div class="flex w-full lg:w-2/3 lg:px-4">';
echo '<div class="flex flex-wrap -mx-4">';
echo '<div class="w-full px-4 pb-4"><img loading="lazy" src="' . esc_url( $photo_1['url'] ) . '" /></div>';
echo '<div class="w-1/2 px-4 pt-4"><img loading="lazy" src="' . esc_url( $photo_2['url'] ) . '" /></div>';
echo '<div class="w-1/2 px-4 pt-4"><img loading="lazy" src="' . esc_url( $photo_3['url'] ) . '" /></div>';
echo '</div>';
echo '</div>';
echo '<div class="flex flex-col w-full lg:w-1/3 lg:px-4">';
echo '<div class="text-purple uppercase text-4xl lg:text-6xl font-semibold lg:leading-none">Gallery</div>';
echo '<div class="text-gray leading-loose mb-6">' . $gallery_content . '</div>';
echo '<div class="hidden lg:flex flex-col justify-between h-full">';
echo '<div><img loading="lazy" src="' . esc_url( $photo_4['url'] ) . '" /></div>';
echo '<div><img loading="lazy" src="' . esc_url( $photo_5['url'] ) . '" /></div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '</div>';
if ( $button ) {
    echo '<div class="text-center mt-6 block"><a href="' . esc_url( $button['url'] ) . '" class="inline-block border rounded-md bg-purple text-white px-4 py-4 text-lg uppercase font-semibold hover:bg-purple-bright hover:text-purple transition-colors duration-150">' . esc_attr( $button['title'] ) . '</a></div>';
}
echo '</div>';
