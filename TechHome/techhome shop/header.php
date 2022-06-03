<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Techhome</title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/logotyp.png" type="image/png" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class('test'); ?>>

    <!--<header class="header-main">
      <nav class="navbar navbar-dark navbar-expand-md d-flex align-items-center justify-content-between">
        <a href="<?php //bloginfo("url"); ?>" class="navbar-brand"><img src="<?php //echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" class="img-fluid logo"></a>
        <button class="navbar-toggler" id="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Przełącznik nawigacji">
             <span class="navbar-toggler-icon"></span>
        </button>

      </nav>
    </header>-->
    <header class="header-main">
      <div id="tlo" class="tlo cover"></div>
      <nav>
        <div class="logo2">
          <a href="<?php bloginfo("url"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo"/></a>
          <div id="burger-btn" class="cover-big">
              <div id="switch-icon" class="close">
                  <span></span>
                  <span></span>
                  <span></span>
              </div>
          </div>
        </div>


        <div class="menucont">
          <div id="menu" class="menu cover">
            <?php wp_nav_menu(
                array(
                  'theme_location' => 'top-menu'
                )
              ); ?>
          </div>

        </div>
      </nav>
    </header>
