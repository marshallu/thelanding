<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TheLanding
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/thelanding.css">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo SENTINEL_FONT_URL ?>" />

    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
    <script async src="//www.googletagmanager.com/gtag/js?id=UA-2931131-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-2931131-1');
    </script>
    <style>
        x-cloak { display: none }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <div x-data="navigation()" x-on:scroll.window.debounce.100="scrollWatch()">
        <header>
            <div class="relative bg-no-repeat bg-cover min-h-128 lg:min-h-248" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/thelanding-hero-2.jpg); background-position: 40% 100%">
                <div class="absolute inset-0 h-full flex justify-between flex-col pb-40 bg-gradient-to-t from-black-50 to-black-10">
                    <nav class="fixed top-0 w-full z-50">
                        <div class="w-full bg-gray-overlay-95">
                            <div class="block w-full xl:max-w-screen-xl xl:mx-auto">
                                <div class="flex items-center lg:space-x-6 justify-between transition-colors duration-75">
                                    <div class="hidden lg:inline-block text-center"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.gallery.offsetTop - 104), left: 0, behavior: 'smooth' })" :class="{ 'text-teal-bright hover:text-teal-bright' : active === 'gallery' }" class="py-5 block text-lg font-semibold text-white uppercase hover:text-green-brighter">Gallery</a></div>
                                    <div class="hidden lg:inline-block text-center"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.community.offsetTop - 104), left: 0, behavior: 'smooth' })" :class="{ 'text-teal-bright hover:text-teal-bright' : active === 'community' }" class="py-5 block text-lg font-semibold text-white uppercase hover:text-green-brighter">Community Features</a></div>
                                    <div class="hidden lg:inline-block text-center"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.amenities.offsetTop - 104), left: 0, behavior: 'smooth' })" :class="{ 'text-teal-bright hover:text-teal-bright' : active === 'amenities' }" class="py-5 block text-lg font-semibold text-white uppercase hover:text-green-brighter">Amenities</a></div>
                                    <div class="hidden lg:inline-block text-center"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.floorPlans.offsetTop - 152), left: 0, behavior: 'smooth' })" :class="{ 'text-teal-bright hover:text-teal-bright' : active === 'floorPlans' }" class="py-5 block text-lg font-semibold text-white uppercase hover:text-green-brighter">Floor Plans</a></div>
                                    <div class="flex-1 lg:px-4 py-5 lg:mx-4 cursor-pointer" x-on:click="window.scrollTo(0,0)"><img src="<?php echo get_template_directory_uri() ?>/images/thelanding-logo-white.svg" class="h-16 mx-auto" alt="The Landing logo" /></div>
                                    <div class="hidden lg:inline-block text-center"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.map.offsetTop - 100), left: 0, behavior: 'smooth' })" :class="{ 'text-teal-bright hover:text-teal-bright' : active === 'map' }" class="py-5 block text-lg font-semibold text-white uppercase hover:text-green-brighter">Neighborhood</a></div>
                                    <div class="hidden lg:inline-block text-center"><a href="/thelanding/faqs/" class="py-5 block text-lg font-semibold text-white uppercase hover:text-green-brighter">FAQs</a></div>
                                    <div class="hidden lg:inline-block text-center"><a href="/thelanding/short-term-stay/" class="py-5 block text-lg font-semibold text-white uppercase hover:text-green-brighter">Short-Term Stay</a></div>
                                    <div class="hidden lg:inline-block text-center relative z-50 h-full" x-data="{ open: false }" x-on:mouseover="open = true" x-on:mouseleave="open = false">
                                        <span class="py-5 block text-lg font-semibold text-white uppercase hover:text-green-brighter cursor-pointer" x-on:mouseover="open = true" x-on:mouseleave="open = false">Residents</span>
                                        <div x-show="open" class="w-64 absolute right-0 bg-gray-overlay-95 text-left" x-cloak>
                                            <a href="http://mymu.marshall.edu" class="w-full px-4 py-3 flex items-start text-white hover:text-green-brighter group">
                                                <span class="h-5 w-1 bg-green-brighter mr-3 mt-1"></span>
                                                <span class="text-lg uppercase">Pay Rent</span>
                                            </a>
                                            <a href="https://www.maintenancecare.com/maintenancecare/portal/action/RequestAction/form/mcrequestpage?buildingkey=612-P-161f6ebc5d8-14b8b&buildingid=1300&user=marshall001" class="w-full px-4 py-3 flex items-start text-white hover:text-green-brighter group">
                                                <span class="h-5 w-1 bg-green-brighter mr-3 mt-1"></span>
                                                <span class="text-lg uppercase">Submit Work Order</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="arrow-top lg:arrow-top-lg gray-95-arrow-top"></div>
                        <div class="relative">
                            <div class="lg:-mt-12 lg:hidden bg-orange px-2 py-2 text-white inline-block absolute z-10 top-0 right-0" :class="{ '-mt-8' : !mobileMenuOpen }">
                                <svg x-show="mobileMenuOpen == false" x-on:click="mobileMenuOpen = true" class="fill-current w-8 h-8 lg:hidden cursor-pointer text-white" role="button" aria-label="show mobile menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                                </svg>
                                <svg x-show="mobileMenuOpen" x-on:click="mobileMenuOpen = false" x-cloak class="fill-current w-8 h-8 lg:hidden cursor-pointer text-white" role="button" aria-label="hide mobile menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z" />
                                </svg>
                            </div>
                            <div x-show="mobileMenuOpen" class="relative -mt-8 bg-orange-overlay-90" x-cloak>
                                <div class="border-b border-orange"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.gallery.offsetTop - 104), left: 0, behavior: 'smooth' }); mobileMenuOpen = false" :class="{ 'tex-white' : active === 'gallery' }" class="block py-4 px-6 text-white">Gallery</a></div>
                                <div class="border-b border-orange"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.community.offsetTop - 104), left: 0, behavior: 'smooth' }); mobileMenuOpen = false" :class="{ 'tex-white' : active === 'community' }" class="block py-4 px-6 text-white">Community Features</a></div>
                                <div class="border-b border-orange"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.amenities.offsetTop - 104), left: 0, behavior: 'smooth' }); mobileMenuOpen = false" :class="{ 'tex-white' : active === 'amenities' }" class="block py-4 px-6 text-white">Amenities</a></div>
                                <div class="border-b border-orange"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.floorPlans.offsetTop - 152), left: 0, behavior: 'smooth' }); mobileMenuOpen = false" :class="{ 'tex-white' : active === 'floorPlans' }" class="block py-4 px-6 text-white">Floor Plans</a></div>
                                <div class="border-b border-orange"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.map.offsetTop - 100), left: 0, behavior: 'smooth' }); mobileMenuOpen = false" :class="{ 'tex-white' : active === 'map' }" class="block py-4 px-6 text-white">Neighborhood</a></div>
                                <div class="border-b border-orange"><a href="/thelanding/faqs/" class="block py-4 px-6 text-white">FAQs</a></div>
                                <div class="border-b border-orange"><a href="/thelanding/short-term-stay/" class="block py-4 px-6 text-white">Short-Term Stay</a></div>
                                <div class="border-b border-orange" x-data="{ open: false }">
                                        <a href="#" class="block py-4 px-6 text-white flex items-center" x-on:click="open = !open">
                                            <span>Residents</span>
                                            <svg x-show="open" class="ml-4 text-white fill-current h-3 w-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-up" class="svg-inline--fa fa-chevron-up fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg>
                                            <svg x-show="!open" class="ml-4 text-white fill-current h-3 w-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                                        </a>
                                        <div x-show="open" class="bg-orange absolute w-full left-0 text-left" x-cloak>
                                            <div class="w-full border-b border-orange-dark"><a href="http://mymu.marshall.edu" class="block py-3 pl-8 pr-6 text-white">Pay Rent</a></div>
                                            <div class="w-full border-b border-orange-dark"><a href="https://www.maintenancecare.com/maintenancecare/portal/action/RequestAction/form/mcrequestpage?buildingkey=612-P-161f6ebc5d8-14b8b&buildingid=1300&user=marshall001" class="block py-3 pl-8 pr-6 text-white">Submit Work Order</a></div>
                                        </div>
                                    </div>
                                    <div class="border-b border-orange"><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.contact.offsetTop - 148), left: 0, behavior: 'smooth' }); mobileMenuOpen = false" class="block py-4 px-6 text-white">Contact Us</a></div>
                                    <div class="border-b border-orange"><a href="https://marshall.az1.qualtrics.com/jfe/form/SV_1zBDMCahIGYB4od" class="block py-4 px-6 text-white">Apply Now</a></div>
                                </div>
                        </div>
                    </nav>
                    <div class="hidden lg:inline-block fixed right-0 z-40" style="top: 12rem;">
                        <div class="inline-flex flex-col">
                            <div><a href="#" x-on:click.prevent="window.scroll({ top: ($refs.contact.offsetTop - 100), left: 0, behavior: 'smooth' })" class="block py-3 px-16 text-lg uppercase font-semibold border border-black rounded-tl-md border-r-0 text-white bg-orange hover:bg-orange-dark transition-colors duration-100">Contact Us</a></div>
                            <div><a href="https://marshall.az1.qualtrics.com/jfe/form/SV_1zBDMCahIGYB4od" class="block py-3 px-16 text-lg uppercase font-semibold border border-black rounded-bl-md border-t-0 border-r-0 text-white bg-orange hover:bg-orange-dark transition-colors duration-100">Apply Now</a></div>
                        </div>
                    </div>

                    <div class="h-full flex flex-col justify-end">
                        <?php
                            if( get_field('display_page_title_and_subtitle') ) { ?>
                                <div class="w-full xl:max-w-screen-xl xl:mx-auto px-6 lg:px-0">
                                    <div class="font-serif text-4xl lg:text-6xl text-white font-bold text-shadow-lg"><?php the_field('page_title'); ?></div>
                                    <div class="text-white uppercase text-shadow textxl lg:text-3xl"><?php the_field('page_subtitle'); ?></div>
                                </div>
                            <?php } ?>
                    </div>
                </div>
                <div class="absolute bottom-0 right-0 left-0 w-full flex justify-between h-8 lg:h-12">
                    <div class="bg-white w-full"></div>
                    <div class="arrow-bottom lg:arrow-bottom-lg white-arrow-bottom"></div>
                    <div class="bg-white w-full "></div>
                </div>
            </div>
        </header>
        <div class="">
