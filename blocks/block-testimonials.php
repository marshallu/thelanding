<?php

/**
 * Testimonials block
 *
 * @package      TheLanding
 * @author       Christopher McComas
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

$testimonial         = get_field( 'testimonial' );
$background_image    = get_field( 'background_image');
$background_position = get_field( 'background_position' );

echo '<div id="testimonials" x-ref="testimonials" class="relative bg-no-repeat bg-cover min-h-160 lg:min-h-128" style="background-image: url(' . esc_url( $background_image['url'] ) . '); background-position: ' . esc_attr( $background_position ) . '">';
echo '<div class="absolute inset-0 h-full bg-purple-overlay-80">';
echo '<div class="w-full xl:max-w-screen-xl xl:mx-auto px-8 lg:px-0 h-full">';

echo '<div class="arrow-top lg:arrow-top-lg blue-light-arrow-top"></div>';
echo '<h2 class="sr-only">Testimonial</h2>';

echo '<div class="flex items-center -mx-4 lg:-mx-6 h-full -mt-8 lg:-mt-12" x-data="testimonialsCarousel()">';

// Left arrow, good
echo '<div class="lg:px-6 w-1/12">';
echo '<button :disabled="active === 0" :class="{ \'opacity-50 cursor-not-allowed\' : active === 0 }" x-on:click=" $refs.slider.scrollLeft = $refs.slider.scrollLeft - ($refs.slider.scrollWidth / items.length)" class="inline-block bg-gray text-white py-2"  >';
echo '<svg class="fill-current h-6 w-6 lg:h-8 lg:w-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>';
echo '</button>';
echo '</div>';

// Middle Section, good
echo '<div class="w-5/6 px-4 lg:px-6 lg:-mx-4 my-6">';
echo '<div>';
echo '<div class="snap overflow-auto relative flex-no-wrap flex transition-all" x-ref="slider" x-on:scroll.debounce="active = Math.round($event.target.scrollLeft / ($event.target.scrollWidth / items.length))">';
echo '<template x-for="(item,index) in items" :key="index">';
    echo '<div class="w-full flex-shrink-0 flex flex-wrap">';
    echo '<div class="w-full lg:w-1/3"><img class="h-56 w-56 mx-auto" :src="item.photo.url" :alt="item.name" /></div>';
    echo '<div class="w-full lg:w-2/3 mt-4 lg:mt-0">';
    echo '<div class="text-white text-base lg:text-xl">"<span x-text="item.quote"></span>"</div>';
    echo '<div class="text-white text- mt-3 uppercase" x-text="item.name"></div>';
    echo '</div>';
    echo '</div>';
echo '</template>';
echo '</div>';
echo '</div>';
echo '</div>';

// Right Arrow,
echo '<div class="lg:px-6 w-1/12">';
echo '<button :disabled="active === items.length - 1" :class="{ \'opacity-50 cursor-not-allowed\' : active === items.length - 1 }" x-on:click="$refs.slider.scrollLeft = $refs.slider.scrollLeft + ($refs.slider.scrollWidth / items.length)" class="inline-block bg-gray text-white py-2" >';
echo '<svg class="fill-current h-6 w-6 lg:h-8 lg:w-8 transition-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>';
echo '</button>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<script>';
echo 'function testimonialsCarousel() {';
echo 'return {';
echo 'items: ' . json_encode($testimonial) . ',';
echo 'active: 0';
echo '}';
echo '}';
echo '</script>';
