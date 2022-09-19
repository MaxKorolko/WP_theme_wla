<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <?php wp_head(); ?>

    
  </head>
  <body>
    <header>
      <div class="user-wrap">
        <div class="user-menu">

          <?php wp_nav_menu( [
            'theme_location'  => 'social-menu',
            'container'       => 'null',                   
            'menu_class'      => 'social-links',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 1,                                                       
          ] ); ?>

          <ul class="user-menu__list">
            <li class="user-menu__item">
              <a class="user-menu__link" href="">Join</a>
            </li>
            <li class="user-menu__item">
              <a class="user-menu__link" href="">Login</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="site-nav">
        
        <?php the_custom_logo(); ?>

        <?php wp_nav_menu( [
            'theme_location'  => 'main-navigation',
            'container'       => 'nav',                   
            'menu_class'      => 'site-nav__list',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 1,                                                      
        ] ); ?>

        
        <button class="mob-menu-btn-open" aria-label="mobile menu switch">
          <svg class="mob-menu-btn-open__icon">
            <use href="<?php bloginfo('template_url'); ?>/assets/img/icon/symbol-defs.svg#icon-mobil-menu-open"></use>
          </svg>
        </button>
      </div>
    </header>