<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-3.3.1.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-3.5.0.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function roots_scripts() {
  wp_enqueue_style('roots_main', get_stylesheet_directory_uri() . '/assets/css/theme.css', false, '64c2848549edf90cef42796141ccce4c3e');

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, false);
    add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.5.0.min.js', array(), null, false);
  wp_register_script('roots_scripts', get_template_directory_uri() . '/assets/js/main.js', array(), '0fc6af96786d8f267c8686338a34cd38', true);
  wp_register_script('bs-popper', get_template_directory_uri() . '/assets/js/vendor/popper.min.js', array(), '0fc6af96786d8f267c8686338a34cd38', true);
  wp_register_script('bs-util', get_template_directory_uri() . '/assets/js/vendor/bootstrap/util.js', array(), '0fc6af96786d8f267c8686338a34cd38', true);
  wp_register_script('bs-collapse', get_template_directory_uri() . '/assets/js/vendor/bootstrap/collapse.js', array(), '0fc6af96786d8f267c8686338a34cd38', true);
  wp_register_script('bs-dropdown', get_template_directory_uri() . '/assets/js/vendor/bootstrap/dropdown.js', array(), '0fc6af96786d8f267c8686338a34cd38', true);

  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script('roots_scripts');
  wp_enqueue_script('bs-popper');
  wp_enqueue_script('bs-util');
  wp_enqueue_script('bs-collapse');
  wp_enqueue_script('bs-dropdown');
}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-3.3.1.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'roots_jquery_local_fallback');

function roots_google_analytics() { ?>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && (defined('WPBP_ENV') && (WPBP_ENV == 'production')) && !(is_user_logged_in())) {
  add_action('wp_footer', 'roots_google_analytics', 20);
}
