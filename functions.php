<?php
/**
 *Twenty Twenty Take Two a Twenty Twenty Child theme by Rachel White
 * functions.php
 */
 
 /*action hook*/
 /* function to add parent style link and css as well as child theme stylesheet*/
function my_theme_enqueue_styles() {
 
    $parent_style = 'twentytwenty'; // 'parent-style', This is 'twentytwenty-style' for the Twenty Twenty theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/* action hook*/
/* function to add widget*/
function mynewwidget_widgets_init() {
	register_sidebar( array(
		'name'=> 'My New Widget Area',
		'id' => 'my_new_widget_area',
		'before_widget' => '<aside>',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action('widgets_init','mynewwidget_widgets_init');

/*action hook*/
/*function to add a favicon (the logo)*/
function mynewfavicon(){
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_stylesheet_directory_uri().'/assets/images/logo.ico"/>';
}
/*adds a favicon to admin area*/
add_action('admin_head', 'mynewfavicon');
/*adds a favicon to my site*/
add_action('wp_head', 'mynewfavicon');

/*filter*/
/*always pass and modify and often return data in a filter*/
/*adds "filtered" after my entry content*/
function myfilteredentrycontent( $content ) {
 return $content . 'filtered';
}
add_filter( 'the_content', 'myfilteredentrycontent' );
