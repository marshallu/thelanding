<?php

/**
 * Contact Us block
 *
 * @package      TheLanding
 * @author       Christopher McComas
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

$left_column  = get_field( 'left_column' );
$right_column = get_field( 'right_column' );

echo '<div id="contact" x-ref="contact" class="flex flex-wrap">';

echo '<div class="w-full lg:w-1/2 bg-gray-light pb-12">';
echo '<div class="text-white uppercase text-lg text-center bg-green py-4 font-semibold">Follow Us</div>';
echo '<div class="arrow-top green-arrow-top"></div>';
echo '<div class="py-6">';
echo '<iframe class="mx-auto" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fthelandingatmarshall&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>';
echo '</div>';
echo '</div>';

echo '<div class="w-full lg:w-1/2 bg-blue-light pb-12">';
echo '<div class="text-white uppercase text-lg text-center bg-teal py-4 font-semibold">Contact Us</div>';
echo '<div class="arrow-top teal-arrow-top"></div>';
echo '<div class="py-6">';
echo $right_column;
echo '</div>';
echo '</div>';

echo '</div>';
