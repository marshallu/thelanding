<?php

/**
 * Welcome Content block
 *
 * @package      TheLanding
 * @author       Christopher McComas
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

$welcome_title            = get_field( 'welcome_title' );
$welcome_subtitle         = get_field( 'welcome_subtitle' );
$welcome_content          = get_field( 'welcome_content' );
$welcome_primary_button   = get_field( 'welcome_primary_button' );
$welcome_secondary_button = get_field( 'welcome_secondary_button' );

echo '<div class="w-full xl:max-w-screen-xl xl:mx-auto px-8 lg:px-0">';
echo '<h2 class="font-serif text-4xl lg:text-6xl text-green-bright uppercase tracking-wide font-medium">' . esc_attr( $welcome_title ) . '</h2>';
if ( $welcome_subtitle ) {
    echo '<div class="uppercase font-semibold text-gray mt-3 text-xl lg:text-3xl">' . esc_attr( $welcome_subtitle ) . '</div>';
}
echo '<div class="text-gray leading-loose text-lg my-6">';
echo $welcome_content;
echo '</div>';
echo '</div>';
