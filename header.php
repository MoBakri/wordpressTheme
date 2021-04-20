<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head charset = <?php bloginfo('charset'); ?>>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <script src="https://kit.fontawesome.com/a906de2166.js" crossorigin="anonymous"></script>
    <title>
        <?php bloginfo('name'); ?>
        <?php wp_title('|', 'true', 'left'); ?>
       
    </title>
     <?php wp_head(); ?>
    </head>
    <body>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">MoBakri Theme </a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <?php mo_nav(); ?>
    </div>
  </nav>
