<!doctype html>
<html lang="ru" class="wide wow-animation smoothscroll scrollTo">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="<?php bloginfo('template_url')?>/dist/images/favicon.ico" type="image/x-icon" rel="shortcut icon">
  <?php wp_head(); ?>
</head>
<body>
<header class="slider-menu-position">
  <div class="rd-navbar-wrap">
    <nav data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-md-stick-up-offset="50px" data-lg-stick-up-offset="1px" class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fullwidth" data-lg-layout="rd-navbar-static">
      <div class="rd-navbar-inner">
        <div class="rd-navbar-panel">
          <button data-rd-navbar-toggle=".rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span></button>
          <div class="rd-navbar-brand veil reveal-md-block"><a href="<?php bloginfo('url')?>" class="brand-name"><img class="logo-header" src='<?php bloginfo('template_url')?>/dist/images/logo-new.png' alt=''/></a></div>
          <div class="rd-navbar-brand veil-md"><a href="<?php bloginfo('url')?>" class="brand-name"><img class="logo-header" src='<?php bloginfo('template_url')?>/dist/images/logo-new-m.png' alt=''/></a></div>
          <button data-rd-navbar-toggle=".rd-navbar-collapse-wrap" class="rd-navbar-collapse"><span></span></button>
        </div>
        <div class="rd-navbar-right-side">
          <div class="rd-navbar-nav-wrap reveal-md-inline-block">
            <?php /* Primary navigation */
            wp_nav_menu( array(
                'menu' => 'top_menu',
                'depth' => 2,
                'container' => false,
                'menu_class' => 'rd-navbar-nav',
                //Process nav menu using our custom nav walker
                'walker' => new wp_bootstrap_navwalker())
            );
            ?>
          </div>
          <div class="rd-navbar-collapse-wrap reveal-md-inline-block">
            <ul class="list-inline list-inline-0 list-primary flag-wrapper">
              <li class="text-center"><a href="#" class="flag-united" data-toggle="tooltip" data-placement="top" title="United States"></a></li>
              <li class="text-center"><a href="#" class="flag-france" data-toggle="tooltip" data-placement="top" title="France"></a></li>
              <li class="text-center"><a href="#" class="flag-russia" data-toggle="tooltip" data-placement="top" title="Russia"></a></li>
              <li class="text-center"><a href="#" class="flag-united"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>