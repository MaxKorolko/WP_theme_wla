<div class="backdrop">
        <div class="mob-menu">
          <button class="mob-menu__btn-cls" aria-label="mobile menu switch">
            <svg class="mob-menu__icon">
              <use href="<?php bloginfo('template_url'); ?>/assets/img/icon/symbol-defs.svg#icon-mobil-menu-close"></use>
            </svg>
          </button>

          <?php wp_nav_menu( [
            'theme_location'  => 'mobile-navigation',
            'container'       => 'nav',                   
            'menu_class'      => 'mob-menu__list',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 1,                                                       
          ] ); ?>

         
        </div>
      </div>