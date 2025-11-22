<body-page>





  <main class="main-sitecontent">

    <nav class="d-headernav">
    <div class="s-header">
      <div class="c-header-container w-container">


	    		<!-- DESKTOP MENU START -->
        <div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="navbar-bop w-nav">


      <div class="c-nppa-navbar w-container">
        <a href="<?php echo get_option("siteurl"); ?>" class="brand-navbar-boplogo w-nav-brand">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/nppa_bop.svg" width="256" alt="NPPA Logo" class="nppa-mmi-logo-desktop">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/nppa_bop.png" width="256" alt="NPPA Logo" class="nppa-mmi-logo-mobile"
    </a>

    <nav role="navigation" class="nav-menu w-nav-menu">

      <?php
      wp_nav_menu( array(
          'theme_location' => 'my-custom-menu',
          'container_class' => 'custom-menu-class' ) );
      ?>

      <div class="menu-button w-nav-button">
        <div class="icon w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
</div>
</div>
</nav>
