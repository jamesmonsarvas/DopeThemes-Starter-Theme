<?php
/**
 * Registers custom image sizes for the theme. 
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_register_image_sizes() {

	/* Sets the 'post-thumbnail' size. */
	//set_post_thumbnail_size( 150, 150, true );
}
add_action( 'init', 'hybrid_base_register_image_sizes', 5 );

/**
 * Registers nav menu locations.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_register_menus() {

	register_nav_menu( 'primary',    _x( 'Primary',    'nav menu location', 'hybrid-base' ) );
	register_nav_menu( 'secondary',  _x( 'Secondary',  'nav menu location', 'hybrid-base' ) );
	register_nav_menu( 'subsidiary', _x( 'Subsidiary', 'nav menu location', 'hybrid-base' ) );
}
add_action( 'init', 'hybrid_base_register_menus', 5 );

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_register_sidebars() {

	hybrid_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => _x( 'Primary', 'sidebar', 'hybrid-base' ),
			'description' => __( 'Add sidebar description.', 'hybrid-base' )
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'subsidiary',
			'name'        => _x( 'Subsidiary', 'sidebar', 'hybrid-base' ),
			'description' => __( 'Add sidebar description.', 'hybrid-base' )
		)
	);
}
add_action( 'widgets_init', 'hybrid_base_register_sidebars', 5 );

/**
 * Load scripts for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_enqueue_scripts() {

	/* Loads jQuery script. */
	wp_enqueue_script( 'jquery' );

	/* Loads modernzr script. */
	wp_enqueue_script( 'modernizr', trailingslashit( get_template_directory_uri() ) . 'js/modernizr.min.js', array(), '1.0.0', true );

	/* Loads plugins script. */
	wp_enqueue_script( 'plugins', trailingslashit( get_template_directory_uri() ) . 'js/plugins.js', array(), '1.0.0', true );

	/* Loads theme script. */
	wp_enqueue_script( 'hybrid-base', trailingslashit( get_template_directory_uri() ) . 'js/script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'hybrid_base_enqueue_scripts', 5 );

/**
 * Load stylesheets for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_enqueue_styles() {

	/* Gets '.min' suffix. */
	$suffix = hybrid_get_min_suffix();

	/* Load font-awesome stylsheet. */
	wp_enqueue_style( 'font-awesome', trailingslashit( get_template_directory_uri() ) . 'css/font-awesome.min.css' );

	/* Load gallery style if 'cleaner-gallery' is active. */
	if ( current_theme_supports( 'cleaner-gallery' ) ) {
		wp_enqueue_style( 'gallery', trailingslashit( HYBRID_CSS ) . 'gallery{$suffix}.css' );
	}

	/* Load active theme stylesheet. */
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	/* Load style for IE. */
	wp_enqueue_style( 'hybrid-base-ie', trailingslashit( get_template_directory_uri() ) . 'css/ie.css' );
	wp_style_add_data( 'hybrid-base-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'hybrid_base_enqueue_styles', 5 );

/**
 * Load stylesheets for the back end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_add_wp_editor_styles() {

	/* Load all WP Editor style.*/
	add_editor_style( array( 'css/editor-style.css' ) );
}
add_action( 'admin_init', 'hybrid_base_add_wp_editor_styles', 5 );
