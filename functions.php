<?php


// Remove unnecessary bloats
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


// Disable Embeds
function my_deregister_scripts(){
 wp_dequeue_script( 'wp-embed' );
}

add_action( 'wp_footer', 'my_deregister_scripts' );


// Add meta tags
function head_tags() {   ?>

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Here is a precise description of my awesome webpage.">
      <meta name="robots" content="index, follow" />

<?php

}

add_action('wp_head', 'head_tags');



function sazzypress_styles() {

  // wp_enqueue_style('font-awesome','//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('aos-style', '//unpkg.com/aos@2.3.1/dist/aos.css');
  wp_enqueue_style('main-style', get_stylesheet_uri(), NULL, microtime());

}

add_action('wp_enqueue_scripts', 'sazzypress_styles');

// Theme support

// function add_title_tag() {
//   add_theme_support('title-tag');
// }
// add_action('after_setup_theme', 'add_title_tag');

//Remove Gutenberg Block Library CSS from loading on the frontend
// function smartwp_remove_wp_block_library_css(){
//  wp_dequeue_style( 'wp-block-library' );
//  wp_dequeue_style( 'wp-block-library-theme' );
// }
// add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css' );

