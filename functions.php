<?php 



add_action( 'wp_enqueue_scripts', function() {

    // wp_enqueue_style( 'pre-fonts', 'https://fonts.googleapis.com' );
    // wp_enqueue_style( 'gstatic-fonts', 'https://fonts.gstatic.com' );
    wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' );      
    wp_enqueue_style( 'modern-normalize', 'https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );
    wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css' );

    

    wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array('jquery'), 'null', true );  
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), 'null', true );
    wp_enqueue_script( 'mobMenu', get_template_directory_uri() . '/assets/js/mobMenu.js', array(), 'null', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), 'null', true );
});

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');


register_nav_menus([	
	'main-navigation' => 'Main navigation',
	'mobile-navigation' => 'Mobile navigation',
	'social-menu' => 'Social links menu'
]);

remove_filter( 'the_excerpt', 'wpautop' );

add_action( 'init', 'marketplace_custom_post_type' );

function marketplace_custom_post_type(){

	register_post_type( 'marketplaces', [
		'label'  => null,
		'labels' => [
			'name'               => 'Marketplaces',
			'singular_name'      => 'Marketplace',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New Marketplace',
			'edit_item'          => 'Edit Marketplace',
			'new_item'           => 'New Marketplace',
			'view_item'          => 'View Marketplace',
			'search_items'       => 'Search Marketplaces',
			'not_found'          => 'No marketplaces found.',
			'not_found_in_trash' => 'No marketplaces found in Trash.',
			'parent_item_colon'  => '',
			'menu_name'          => 'Marketplaces',
		],
		
		'public'              => true,
		'publicly_queryable'  => true, 
		'show_ui'             => true,
		'show_in_menu'        => true,
        'menu_position'       => null,
		'menu_icon'           => 'dashicons-editor-expand',
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}

add_action( 'customize_register', 'my_customize_register' );

function my_customize_register( $wp_customize ) {
    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
        'section' => 'title_tagline',
        'label' => 'Logo footer'
    )));

    $wp_customize->selective_refresh->add_partial('footer_logo', array(
        'selector' => '.footer-logo',
        'render_callback' => function() {
            $logo = get_theme_mod('footer_logo');
            $img = wp_get_attachment_image_src($logo, 'full');
            if ($img) {
                return '<img src="' . $img[0] . '" alt="">';
            } else {
                return '';
            }
        }
    ));
}


add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}

?>











