<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" user-scalable=no>
  <title><?php wp_title('-', true, 'right'); bloginfo('name'); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?> ?>" type="text/css" media="screen" />
  <?php wp_head(); ?>
</head>

<?php
  if (get_option('custom_site_logo')) {
    if (strpos(get_option('custom_site_logo'), 'svg')) {
      $svg = file_get_contents(get_option('custom_site_logo'));
    }
    elseif (strpos(get_option('custom_site_logo'), 'png') or strpos(get_option('custom_site_logo'), 'jpg')) {
      $img = get_option('custom_site_logo');
    }
  }
?>

<body <?php body_class(); ?>>
  <header class="masthead" role="banner">
    <div class="container">
      <div class="logo">
          <a href="/">
            <?php if ($svg) : ?>
              <?php echo $svg; ?>
            <?php endif; ?>
            <?php if ($img) : ?>
              <img src="<?php echo $img; ?>"/>
            <?php endif; ?>
          </a>
      </div>
      <label for="main-menu-toggle" class="main-menu-icon">
        <div class="vertbar top"></div>
        <div class="vertbar mid"></div>
        <div class="vertbar bot"></div>
      </label>
      <input type="checkbox" id="main-menu-toggle" role="button">
      <nav class="main-menu" role="navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'header-main-menu', 'fallback_cb' => false ) ); ?>
      </nav>
    </div>
  </header>
