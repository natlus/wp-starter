<?php
  # Include custom PHP scripts
  include 'includes/shortcodes.php';
  include 'includes/theme-options.php';

	# Load JavaScript files
  wp_deregister_script('jquery');
  wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"), false, '3.1.0');
  wp_enqueue_script('jquery');
	wp_enqueue_script('master', get_template_directory_uri() . '/js/index.js', array(), '0.16.0', true);

	# Hide WP admin bar
	function my_function_admin_bar() {
		return false;
	}
	add_filter( 'show_admin_bar' , 'my_function_admin_bar');

    # Register menus
    function register_menus() {
      register_nav_menus(
        array(
          'header-main-menu' => __( 'Main Menu' ),
          'footer-legal-menu' => __( 'Footer Legal Menu' )
        )
      );
    }
    add_action( 'init', 'register_menus' );

    # Register widgets

    # Logo
    register_sidebar( array(
      'name' => 'Logo Header',
      'id' => 'logo-header-widget',
      'description' => 'Main logo in the site header',
    ));

    # Main Footer Area
    register_sidebar( array(
      'name' => 'Footer Column 1 (1/5)',
      'id' => 'footer-col-1',
      'before_widget' => '<div class="widget">',
      'description' => 'Main area in the site footer',
      'before_title' => '<p class="title">',
      'after_title' => '</p>',
      'after_widget' => '</div>',
    ));
    register_sidebar( array(
      'name' => 'Footer Column 2 (1/5)',
      'id' => 'footer-col-2',
      'before_widget' => '<div class="widget">',
      'description' => 'Main area in the site footer',
      'before_title' => '<p class="title">',
      'after_title' => '</p>',
      'after_widget' => '</div>',
    ));
    register_sidebar( array(
      'name' => 'Footer Column 3 (1/5)',
      'id' => 'footer-col-3',
      'before_widget' => '<div class="widget">',
      'description' => 'Main area in the site footer',
      'before_title' => '<p class="title">',
      'after_title' => '</p>',
      'after_widget' => '</div>',
    ));
    register_sidebar( array(
      'name' => 'Footer Column 4 (2/5)',
      'id' => 'footer-col-4',
      'description' => 'Main area in the site footer',
      'before_title' => '<p class="title">',
      'after_title' => '</p>',
    ));

    # Main Sidebar Area
    register_sidebar( array(
      'name' => 'Sidebar',
      'id' => 'sidebar-widget',
      'before_widget' => '<div class="widget">',
      'description' => 'Main area in the sidebar',
      'before_title' => '<p class="title">',
      'after_title' => '</p>',
      'after_widget' => '</div>',
    ));

    # Footer Social Area
    register_sidebar( array(
      'name' => 'Footer Social',
      'id' => 'footer-social',
      'before_widget' => '<div class="widget">',
      'description' => 'Main area in the sidebar',
      'before_title' => '<p class="title">',
      'after_title' => '</p>',
      'after_widget' => '</div>',
    ));

    // Remove <p> and <br> before and after shortcodes
    function fix_shortcodes($content){
        $array = array (
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']'
        );

        $content = strtr($content, $array);
        return $content;
    }
    add_filter('the_content', 'fix_shortcodes');

    # Allow SVG media files
    function cc_mime_types($mimes) {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');

?>
