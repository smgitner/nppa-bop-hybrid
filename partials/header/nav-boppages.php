<body class="body-winners">



<div class="section">
    <div class="nppa-header w-container">
      <a href="<?php echo get_option("siteurl"); ?>" class="header-brand-nppa w-nav-brand"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/nppa_logo_bop2.png" loading="lazy" width="209" alt="" class="nppa-brand-logo-desktop"></a>
    </div>
  </div>

  <div data-collapse="none" data-animation="default" data-duration="400" role="banner" class="bop-navbar w-nav">
    <div class="c-navbop w-container">
      <div class="c-bopbrand w-container">
        <div class="d-bopbrand">
          <a href="<?php echo get_option("siteurl"); ?>" class="brand-bop w-nav-brand"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/bop_logo_white.png" loading="lazy" width="92" alt="" class="image-boplogo"></a>
        </div>
      </div>
      <div class="c-bopnavigation w-container">
        <div id="megamenu" class="megamenu">
        <?php ubermenu( 'main' , array( 'menu' => 9 ) ); ?>
        </div>

        <nav role="navigation" class="d-nav-menu w-nav-menu">

        </nav>
      </div>
      <div class="menubutton-bop w-nav-button">
        <div class="bop-icon w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
