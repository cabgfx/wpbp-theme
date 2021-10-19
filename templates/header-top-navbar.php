<header class="navbar navbar-light navbar-expand-lg">
  <div class="container">

    <a class="navbar-brand" href="<?php echo home_url(); ?>/">
      <?php bloginfo('name'); ?>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#wpbp-topnavbar" aria-controls="wpbp-topnavbar" aria-expanded="false" aria-label="<?php _e('Toggle navigation', 'roots'); ?>">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array(
          'depth' => 2,
          'container'       => 'nav',
          'container_class' => 'collapse navbar-collapse',
          'container_id'    => 'wpbp-topnavbar',
          'menu_class'      => 'navbar-nav align-items-center',
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'theme_location' => 'primary_navigation',
          'walker' => new WP_Bootstrap_Navwalker()
        ));
      endif;
    ?>

  </div>
</header>
