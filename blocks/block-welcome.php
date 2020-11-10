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
echo '<div class="text-gray leading-loose text-lg my-6 welcome-content">';
echo $welcome_content;
echo '</div>';
echo '<div class="lg:hidden w-full">';
echo '<div class="w-full"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.contact.offsetTop - 148), left: 0, behavior: \'smooth\' })" class="bg-white border-2 border-black rounded text-orange w-full py-3 text-center block text-lg font-semibold uppercase">Contact Us</a></div>';
echo '<div class="w-full"><a href="https://marshall.az1.qualtrics.com/jfe/form/SV_1zBDMCahIGYB4od" class="bg-white border-2 border-black rounded text-orange w-full py-3 text-center block text-lg font-semibold uppercase mt-4">Apply Now</a></div>';
echo '</div>';
echo '</div>';
