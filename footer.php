 <footer class="footer">

        <a href="/" class="footer-logo">
          <?php
          $footer_logo = get_theme_mod('footer_logo');
          $img = wp_get_attachment_image_src($footer_logo, 'full');
          if ($img) :
            ?>
            <img class="footer-logo__img" src="<?php echo $img[0]; ?>" alt="logo icon">
          <?php endif; ?>
        </a>

        <?php wp_nav_menu( [
            'theme_location'  => 'social-menu',
            'container'       => 'null',                   
            'menu_class'      => 'social-links social-links-footer',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 1,                                                       
          ] ); ?>

        <p class="footer__text">
          Press | Contact | Search | Advertising <br />
          Terms & Conditions | Privacy Policy | Cookie Policy
        </p>
        <p class="footer__copy-text">&copy; 1999 Lorem Ipsum</p>
      </footer>

      
      <?php get_template_part('mobMenu'); ?>

      <?php wp_footer() ?>

      
    </main>
  </body>
</html>
