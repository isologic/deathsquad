<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.10.2.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.7.0.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function roots_scripts() {
  //enqueuing modernizr
  wp_register_script('modernizr', get_template_directory_uri() . '/assets/bower_components/modernizr/modernizr.js', false, null, false);

  wp_enqueue_script('modernizr');
}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

function roots_footer_includes() {
  //If using the Assembly RequireJS Plugin deregister loading of jQuery
  if (!is_admin() && current_theme_supports('requireJS')) {
    wp_deregister_script('jquery');
    wp_enqueue_script('require', get_template_directory_uri() . '/assets/bower_components/requirejs/require.js', false, null, true);
  } else {
     wp_deregister_script('jquery');
     wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, null, true);
     add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  }

  wp_enqueue_script('roots_scripts');
}

/*
Add on 'data-main' to load the main file asynchronously
*/
function fix_requirejs_script($url) {
  if (strpos ($url, 'bower_components/requirejs')){
      return "$url' data-main='".get_template_directory_uri()."/assets/js/main";
  } else {
    return $url;
  }
}

add_action('wp_enqueue_scripts', 'roots_footer_includes', 100, true);
add_filter('clean_url', 'fix_requirejs_script', 11, 1);

// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/bower_components/jquery/jquery.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_footer', 'roots_jquery_local_fallback');

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
if (GOOGLE_ANALYTICS_ID && !current_user_can('manage_options')) {
  add_action('wp_footer', 'roots_google_analytics', 20);
}
