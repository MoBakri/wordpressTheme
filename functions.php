<?php


if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_theme_support('post-thumbnails'); // add post featured to the theme


function mo_location($length) {
  if (is_author()) {
    return 12;
  }
  return 40;
}
add_filter( 'excerpt_length', 'mo_location');


/*
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {   // To add Read more link to the article us a link
    if ( ! is_single() ) {
        $more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink( get_the_ID() ),
            __( ' Read More..', 'textdomain' )
        );
    }

    return $more;
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


function mo_add_styles() {

    wp_enqueue_style('wp-styles', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome-styles', get_template_directory_uri().'/css/fontawesome.min.css');
    wp_enqueue_style('main-styles', get_template_directory_uri().'/css/main.css');

}

function mo_add_script() {
     wp_deregister_script('jquery');
     wp_register_script('jquery', includes_url('/js/jquery/jquery.js'),false, '', true);
     wp_enqueue_script('jquery');
     wp_enqueue_script('main-script', get_template_directory_uri().'/js/main.js', array(), false, true);
     wp_enqueue_script('wp-script', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true);
     wp_enqueue_script('font-awesome-script', get_template_directory_uri().'/js/fontawesome.min.js', array(), "5.15.3", true);

     wp_enqueue_script('html5siv', get_template_directory_uri().'/js/html5siv.js');
     wp_script_add_data('html5siv', 'conditional', 'lt IE 9');   // this is run if the script less than IE 9;
     wp_enqueue_script('handle', get_template_directory_uri().'/js/respond.min.js');
     wp_script_add_data('handle', 'conditional', 'lt IE 9');     // this is run if the script less than IE 9;
}


    /*-- Navigation Bar --*/
function mo_nav_bar() {
    register_nav_menus(array('Primary' =>'Navigation Bar', 'secondery' => 'Mobile Bar'));
}

function mo_nav() {
  wp_nav_menu(array('theme_location' => 'Primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),));
}

add_action('wp_enqueue_scripts', 'mo_add_styles');
add_action('wp_enqueue_scripts', 'mo_add_script');


add_action('init', 'mo_nav_bar'); // action for adding Navigation bar




// pagenation function for adding page number 

function pagenation_function() {
 global $wp_query;
$all_page = $wp_query->max_num_pages;
$current_page = max(1, get_query_var('paged'));
if ($all_page > 1) {
return paginate_links(array(
         'base'    => get_pagenum_link().'#_#',
         'format'  => 'paged/%#%',
         'current' => $current_page,
         'total'   => $all_page
));
}
}


 // Add sidebar for your theme
function add_register_sidebar() {
    register_sidebar(array(
   
        'name'              =>'Main SideBar',
        'id'                =>'main-sidebar',
        'description'       =>'The main sidebar for MoBakri theme',
        'class'             =>'SideMain',
        'before_widget'     =>'<div class="class-widget">',
        'after_widget'      =>'</div>',
        'before_title'      =>'<div class="class-title-widget">',
        'after_title'       =>'</div>'
     
    ));
}
add_action('widgets_init','add_register_sidebar');



// filter to modify the paragraph without <p></p> in everyline

//function paragraph_filter($content) {
//    remove_filter('the_content', 'wpautop');
//    return $content;
//};
//
//add_action('the_content', 'paragraph_filter', 0);
//












