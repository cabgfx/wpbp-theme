<?php
/**
 * Custom functions
 */

// Remove Gutenberg Block Library CSS from loading on the frontend
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

add_action( 'wp_enqueue_scripts', function() {
  // https://github.com/WordPress/gutenberg/issues/36834
  wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
  // https://stackoverflow.com/a/74341697/278272
  wp_dequeue_style( 'classic-theme-styles' );

  // Go deeper: https://fullsiteediting.com/lessons/how-to-remove-default-block-styles
} );

add_filter( 'should_load_separate_core_block_assets', '__return_true' );
