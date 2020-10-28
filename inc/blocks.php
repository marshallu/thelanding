<?php

add_filter('block_categories',
	function ( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug'  => 'thelanding-blocks',
					'title' => 'The Landing Blocks',
				),
			)
		);
	},
	10,
	2
);

add_filter( 'allowed_block_types', 'thelanding_allowed_block_types' );

function thelanding_blocks_editor_assets() {
	wp_enqueue_style( 'thelanding', '/wp-content/themes/thelanding/css/thelanding.css' );
	wp_enqueue_style( 'sentinel', '//cloud.typography.com/6507934/7500552/css/fonts.css' );
	wp_enqueue_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' );

	wp_enqueue_script('script', 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v1.9.7/dist/alpine.js');
}

add_action( 'enqueue_block_editor_assets', 'thelanding_blocks_editor_assets' );

function thelanding_allowed_block_types() {
	return array(
		'core/heading',
		'core/paragraph',
		'core/list',
		'core/latest-posts',
		'core/columns',
		'core/classic',
		'core/image',
		'core/shortcode',
		'core/group',
		'core/html',
		'core/freeform',
		'acf/welcome-content',
		'acf/contact-us',
		'acf/floor-plans',
		'acf/gallery',
		'acf/testimonials',
		'acf/feature',
	);
}

if ( ! function_exists( 'acf_register_block_type' ) )
	return;

acf_register_block_type(
	array(
		'name'            => 'welcome-content',
		'title'           => 'Welcome Content',
		'description'     => 'The welcome content section directly below the hero.',
		'render_template' => 'blocks/block-welcome.php',
		'category'        => 'thelanding-blocks',
		'icon'            => 'menu',
		'mode'            => 'auto',
		'supports'        => array( 'align' => false )
	)
);


acf_register_block_type(
	array(
		'name'            => 'contact-us',
		'title'           => 'Contact Us',
		'description'     => 'The contact us section with Facebook feed and contact form.',
		'render_template' => 'blocks/block-contact.php',
		'category'        => 'thelanding-blocks',
		'icon'            => 'email-alt',
		'mode'            => 'auto',
		'supports'        => array( 'align' => false )
	)
);

acf_register_block_type(
	array(
		'name'            => 'floor-plans',
		'title'           => 'Floor Plans',
		'description'     => 'The floor plans slideshow.',
		'render_template' => 'blocks/block-floor-plans.php',
		'category'        => 'thelanding-blocks',
		'icon'            => 'admin-multisite',
		'mode'            => 'auto',
		'supports'        => array( 'align' => false )
	)
);

acf_register_block_type(
	array(
		'name'            => 'gallery',
		'title'           => 'Gallery',
		'description'     => 'The gallery block.',
		'render_template' => 'blocks/block-gallery.php',
		'category'        => 'thelanding-blocks',
		'icon'            => 'images-alt2',
		'mode'            => 'auto',
		'supports'        => array( 'align' => false )
	)
);

acf_register_block_type(
	array(
		'name'            => 'testimonials',
		'title'           => 'Testimonials',
		'description'     => 'The testimonials slideshow block.',
		'render_template' => 'blocks/block-testimonials.php',
		'category'        => 'thelanding-blocks',
		'icon'            => 'format-quote',
		'mode'            => 'auto',
		'supports'        => array( 'align' => false )
	)
);

acf_register_block_type(
	array(
		'name'            => 'feature',
		'title'           => 'Feature',
		'description'     => 'The features block, used for amenities and community features.',
		'render_template' => 'blocks/block-feature.php',
		'category'        => 'thelanding-blocks',
		'icon'            => 'star-filled',
		'mode'            => 'auto',
		'supports'        => array( 'align' => false )
	)
);
