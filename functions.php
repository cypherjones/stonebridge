<?php


// Theme Options

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
      'page_title'  => 'Theme Options',
      'menu_title'  => 'Theme Options',
      'menu_slug'   => 'theme-general-settings',
      'capability'  => 'edit_posts',
      'redirect'    => false
    ));
    
  }
  
// Button shortcode

  //= Button
  function button( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "url" => '',
      "align" => '',
      "size" => '',
    ), $atts));
      
    $output = '<div class="button-link '. $align .' '. $size . '"><a href="'.$url.'">' . do_shortcode($content) .'</a></div>';
    
    return $output;
    
    //remove_filter( 'the_content', 'wpautop' );
  }

  add_shortcode( 'button', 'button' );


// Register CSS 

  function theme_name_scripts() {
  	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'jquery' ); 
  }

  add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


// Register Custom Navigation Walker 

  require_once ('wp_bootstrap_navwalker.php');

// Remove that awkward admin bar 

  function my_filter_head() { remove_action('wp_head', '_admin_bar_bump_cb'); }
  add_action('get_header', 'my_filter_head');

  function my_function_admin_bar(){ return false; }
  add_filter( 'show_admin_bar' , 'my_function_admin_bar');

// This theme uses wp_nav_menu() in one location

	register_nav_menus( array(
		'top-nav' => __( 'Top Navigation', 'top-nav' ),
		'bottom-nav' => __( 'Bottom Navigation', 'bottom-nav' ),
	) );

// Add active functionality to menu

  add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
  function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active';
     }
     return $classes;
  }
  
//Page Slug Body Class

  function add_slug_body_class( $classes ) {
    global $post;
      if ( isset( $post ) ) {
      $classes[] = $post->post_type . '_' . $post->post_name;
    }
      return $classes;
    }

    add_filter( 'body_class', 'add_slug_body_class' );

// More Excerpt Control

  function new_excerpt_more( $more ) {
  	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read more.', 'your-text-domain') . '</a>';
  }

  add_filter( 'excerpt_more', 'new_excerpt_more' );


// Excerpt Limit

  function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      //$excerpt = implode(" ",$excerpt).' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '"><span class="keep-reading">Keep Reading</span></a>';
     $excerpt = implode(" ",$excerpt).'...';    
    } else {
      $excerpt = implode(" ",$excerpt);
    }	
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
  }

// Add Thumbnails to Posts

  add_theme_support('post-thumbnails', array( 'post', 'page', 'music' ) );
  
// Content Limit

  function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
      array_pop($content);
      $content = implode(" ",$content).'...';
    } else {
      $content = implode(" ",$content);
    }	
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
  }	

// Add page slug as nav IDs

  function nav_id_filter( $id, $item ) {
    return 'menu-item-'.sanitize_title_with_dashes($item->title);
  }

  add_filter( 'nav_menu_item_id', 'nav_id_filter', 10, 2 );


// Add Search Filter

  function SearchFilter($query) {
       if ($query->is_search) {
          $query->set('post_type', array('post', 'page'));
          $query->set( 'posts_per_page', '8' );
       }
       return $query;
  }
  add_filter('pre_get_posts','SearchFilter');


// ******************** CUSTOM POST TYPES ************************


//   // Register Custom Post Type

//     function tour_post_type() {

//       $labels = array(
//         'name'                => _x( 'Tour Dates', 'Post Type General Name', 'parkermccullom' ),
//         'singular_name'       => _x( 'Tour Date', 'Post Type Singular Name', 'parkermccullom' ),
//         'menu_name'           => __( 'Tour Dates', 'parkermccullom' ),
//         'parent_item_colon'   => __( 'Parent Tour Dates:', 'parkermccullom' ),
//         'all_items'           => __( 'All Tour Dates', 'parkermccullom' ),
//         'view_item'           => __( 'View Tour Dates', 'parkermccullom' ),
//         'add_new_item'        => __( 'Add New Tour Dates', 'parkermccullom' ),
//         'add_new'             => __( 'Add Tour Dates', 'parkermccullom' ),
//         'edit_item'           => __( 'Edit Tour Dates', 'parkermccullom' ),
//         'update_item'         => __( 'Update Tour Dates', 'parkermccullom' ),
//         'search_items'        => __( 'Search Tour Dates', 'parkermccullom' ),
//         'not_found'           => __( 'Not found', 'parkermccullom' ),
//         'not_found_in_trash'  => __( 'Not found in Trash', 'parkermccullom' ),
//       );
//       $args = array(
//         'label'               => __( 'tour', 'parkermccullom' ),
//         'description'         => __( 'Post Type Description', 'parkermccullom' ),
//         'labels'              => $labels,
//         'supports'            => array( 'title', 'editor', 'custom-fields' ),
//         'taxonomies'          => array( 'category', 'post_tag' ),
//         'hierarchical'        => false,
//         'public'              => true,
//         'show_ui'             => true,
//         'show_in_menu'        => true,
//         'show_in_nav_menus'   => true,
//         'show_in_admin_bar'   => true,
//         'menu_position'       => 10,
//         'can_export'          => true,
//         'has_archive'         => true,
//         'exclude_from_search' => false,
//         'publicly_queryable'  => true,
//         'capability_type'     => 'page',
//         'rewrite'             => array('slug' => 'tour'),
//         'menu_icon'           => 'dashicons-tickets',
//       );
//       register_post_type( 'tour', $args );

//     }

//   // Hook into the 'init' action
  
//     add_action( 'init', 'tour_post_type', 0 );

//   // Register Custom Post Type

//   function music_post_type() {

//     $labels = array(
//       'name'                => _x( 'Music', 'Post Type General Name', 'parkermccullom' ),
//       'singular_name'       => _x( 'Music', 'Post Type Singular Name', 'parkermccullom' ),
//       'menu_name'           => __( 'Music', 'parkermccullom' ),
//       'parent_item_colon'   => __( 'Parent Music:', 'parkermccullom' ),
//       'all_items'           => __( 'All Music', 'parkermccullom' ),
//       'view_item'           => __( 'View Music', 'parkermccullom' ),
//       'add_new_item'        => __( 'Add New Music', 'parkermccullom' ),
//       'add_new'             => __( 'Add Music', 'parkermccullom' ),
//       'edit_item'           => __( 'Edit Music', 'parkermccullom' ),
//       'update_item'         => __( 'Update Music', 'parkermccullom' ),
//       'search_items'        => __( 'Search Music', 'parkermccullom' ),
//       'not_found'           => __( 'Not found', 'parkermccullom' ),
//       'not_found_in_trash'  => __( 'Not found in Trash', 'parkermccullom' ),
//     );
//     $args = array(
//       'label'               => __( 'music', 'parkermccullom' ),
//       'description'         => __( 'Post Type Description', 'parkermccullom' ),
//       'labels'              => $labels,
//       'supports'            => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
//       'taxonomies'          => array( 'category', 'post_tag' ),
//       'hierarchical'        => false,
//       'public'              => true,
//       'show_ui'             => true,
//       'show_in_menu'        => true,
//       'show_in_nav_menus'   => true,
//       'show_in_admin_bar'   => true,
//       'menu_position'       => 10,
//       'can_export'          => true,
//       'has_archive'         => true,
//       'exclude_from_search' => false,
//       'publicly_queryable'  => true,
//       'capability_type'     => 'page',
//       'rewrite'             => array('slug' => 'music'),
//       'menu_icon'           => 'dashicons-format-audio',
//     );
//     register_post_type( 'music', $args );

//   }

// // Hook into the 'init' action

//   add_action( 'init', 'music_post_type', 0 );

// // Register album taxonomy for music post type

//   function album_for_music_posttype_taxonomies() {

//     // album taxonomy

//     $labels = array(
//         'name'              => _x( 'Album', 'taxonomy general name' ),
//         'singular_name'     => _x( 'Album', 'taxonomy singular name' ),
//         'search_items'      => __( 'Search Albums' ),
//         'all_items'         => __( 'All Albums' ),
//         'parent_item'       => __( 'Parent Album' ),
//         'parent_item_colon' => __( 'Parent Album:' ),
//         'edit_item'         => __( 'Edit Album' ),
//         'update_item'       => __( 'Update Album' ),
//         'add_new_item'      => __( 'Add New Album' ),
//         'new_item_name'     => __( 'New Album' ),
//         'menu_name'         => __( 'Album' ),
//     );
//     register_taxonomy(
//         'album',
//         'music',
//         array(
//             'hierarchical' => true,
//             'labels' => $labels,
//             'query_var' => true,
//             'rewrite' => true,
//             'show_admin_column' => true
//         )
//     );

//   }

// // Hook into the 'init' action 

//   add_action( 'init', 'album_for_music_posttype_taxonomies', 0 );

// Add Sidebars

    function my_sidebar() {

    register_sidebar( array(
      'name' => __( 'Sidebar', 'stonebridge construction' ),
      'id' => 'top',
      'description' => __( '' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    ) );
  }

  add_action('widgets_init', 'my_sidebar' );
?>