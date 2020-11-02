<?php

/**
 * Floor Plans block
 *
 * @package      TheLanding
 * @author       Christopher McComas
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

$floor_plan = get_field( 'floor_plan' );

echo '<div id="floorPlans" x-ref="floorPlans" class="w-full xl:max-w-screen-xl xl:mx-auto my-16 px-8 lg:px-0">';
echo '<h2 class="font-serif text-4xl lg:text-6xl text-orange text-center uppercase tracking-wide font-medium">Floor Plans</h2>';
echo '<div class="flex items-center -mx-4 lg:-mx-6" x-data="floorPlansCarousel()">';
echo '<div class="lg:px-6 w-1/12">';
echo '<button :disabled="active === 0" :class="{ \'opacity-50 cursor-not-allowed\' : active === 0 }" x-on:click=" $refs.slider.scrollLeft = $refs.slider.scrollLeft - ($refs.slider.scrollWidth / items.length)" class="inline-block bg-orange text-white py-2">';
echo '<svg class="fill-current h-6 w-6 lg:h-8 lg:w-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>';
echo '</button>';
echo '</div>';
echo '<div class="w-5/6 px-4 lg:px-6 lg:-mx-4 my-6">';
echo '<div>';
echo '<div class="snap overflow-auto relative flex-no-wrap flex transition-all" x-ref="slider" x-on:scroll.debounce="active = Math.round($event.target.scrollLeft / ($event.target.scrollWidth / items.length))">';
echo '<template x-for="(item,index) in items" :key="index">';
    echo '<div class="w-full flex-shrink-0 flex flex-wrap">';
    echo '<div class="w-full lg:w-1/2 lg:px-4">';
    echo '<img :src="item.graphic.url" :alt="`${item.title} floor plan layout`" />';
    echo '</div>';
    echo '<div class="w-full lg:w-1/2 lg:px-4">';
    echo '<h3 class="text-gray font-serif text-2xl lg:text-4xl" x-text="item.title"></h3>';
    echo '<div class="text-gray my-4 leading-loose text-lg" x-html="item.content"></div>';
    echo '<div class="block py-6 text-center"><a :href="item.button.url" class="bg-white border rounded-md border-black text-orange px-4 py-4 text-lg uppercase font-semibold hover:bg-orange hover:text-white transition-colors duration-150" x-text="item.button.title"></a></div>';
    echo '</div>';
    echo '</div>';
echo '</div>';
echo '</template>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="lg:px-6 w-1/12">';
echo '<button :disabled="active === items.length - 1" :class="{ \'opacity-50 cursor-not-allowed\' : active === items.length - 1 }" x-on:click="$refs.slider.scrollLeft = $refs.slider.scrollLeft + ($refs.slider.scrollWidth / items.length)" class="inline-block bg-orange text-white py-2">';
echo '<svg class="fill-current h-6 w-6 lg:h-8 lg:w-8" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>';
echo '</button>';
echo '</div>';

echo '</div>';
echo '</div>';

echo '<script>';
echo 'function floorPlansCarousel() {';
echo 'return {';
echo 'items: ' . json_encode($floor_plan) . ',';
echo 'active: 0';
echo '}';
echo '}';
echo '</script>';
