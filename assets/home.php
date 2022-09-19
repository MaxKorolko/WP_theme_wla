<?php
/*
Template Name: home

*/
?>


  <?php get_header(); ?>

    <main>
      <section class="carousel" id="about">

        <?php
        global $post;

        $myposts = get_posts([ 
          'numberposts' => -1,
          'category_name' => 'slider'
        ]);

        $content = apply_filters( 'the_content', get_the_content() );

        if( $myposts ){
          foreach( $myposts as $post ){
            setup_postdata( $post );
        ?>

        <div class="carousel__item">
          <div class="carousel__wrapp">
            
            <?php the_post_thumbnail(
              array(1280, 544), 
              array('class' => 'carousel__img')
            ); ?>

            <div class="carousel__text-box">
              <h2 class="carousel__tittle">
                <?php the_title(); ?>
              </h2>
              <?php the_content();?>
              <!-- <p class="carousel__text"><?php echo the_excerpt(); ?></p> -->
            </div>
          </div>
        </div>

        <?php } } wp_reset_postdata();

        ?>
        
      </section>
      <section class="occupation" id="services">
        <div class="container">
          <h2 class="visually-hidden">
            <?php echo get_category( 5, ARRAY_A )['name']; ?>
          </h2>
          <ul class="occupation__list">

            <?php
              global $post;

              $myposts = get_posts([ 
                'numberposts' => -1,
                'category_name' => 'occupation'
              ]);

              $content = apply_filters( 'the_content', get_the_content() );

              if( $myposts ){
                foreach( $myposts as $post ){
                  setup_postdata( $post );
              ?>

              <li class="occupation__item">
                <?php the_post_thumbnail(
                    array(120, 120), 
                    array('class' => 'occupation__img')
                  ); ?>
                <p class="occupation__text"><?php the_title(); ?></p>
              </li>
             
              <?php } } wp_reset_postdata();

              ?>
                        
          </ul>
          <p class="occupation__description"><?php the_field('description'); ?></p>
        </div>
      </section>
      <section class="news" id="news">
        <div class="container">
          <h2 class="news__tittle tittle"><?php echo get_category( 6, ARRAY_A )['name']; ?></h2>
          <ul class="news__list">

            <?php
              global $post;

              $myposts = get_posts([ 
                'numberposts' => 3,
                'category_name' => 'news'
              ]);

              $content = apply_filters( 'the_content', get_the_content() );

              if( $myposts ){
                foreach( $myposts as $post ){
                  setup_postdata( $post );
              ?>

              <li class="news__item">
                <article class="news__article"> 
                  <div>
                    <h3 class="news__item-tattle"><?php the_title(); ?></h3>
                    <p class="news__text"><?php echo the_excerpt(); ?></p>
                  </div>
                  <a class="news__link" href=""
                    >READ MORE
                    <svg class="news__icon">
                      <use href="<?php bloginfo('template_url'); ?>/assets/img/icon/symbol-defs.svg#icon-subscription"></use>
                    </svg>
                  </a>
                </article>
              </li>
                          
              <?php } } wp_reset_postdata();

            ?>
                     
          </ul>
          <a class="news__link-more btn" href="">View MORE</a>
          <img class="news__bg-img" src="<?php bloginfo('template_url'); ?>/assets/img/marketplace-bg.png" alt="icon" />
        </div>
      </section>
      <section class="marketplace" id="marketplace">
        <div class="container">
          <h2 class="marketplace__tittle tittle">MARKETPLACE</h2>
          <ul class="marketplace__list">

            <?php
              $args = array(  
                'post_type'     =>  'marketplaces',
                'posts_per_page' =>  2,
              );
              $p = get_posts( $args );
              foreach( $p as $post )  { 
                setup_postdata( $post );
              ?>

              <li class="marketplace__item">
                <article class="marketplace__article">
                  <div class="marketplace__wrapp">

                    <?php the_post_thumbnail(
                        array(523, 335), 
                        array('class' => 'marketplace__img')
                      ); ?>
                    
                    <a
                      href="<?php echo get_the_post_thumbnail_url( $post, 'full' ); ?>"
                      data-fancybox="gallery"
                      data-caption="<?php echo the_excerpt(); ?>"
                    >
                      <svg class="marketplace__icon">
                        <use href="<?php bloginfo('template_url'); ?>/assets/img/icon/symbol-defs.svg#circle"></use>
                      </svg>
                    </a>
                  </div>
                  <div class="marketplace__box">
                    <h3 class="marketplace__item-tittle"><?php the_title(); ?></h3>
                    <p class="marketplace__text"><?php echo the_excerpt(); ?></p>
                    <a class="marketplace__link btn" href="">FIND OUT MORE</a>
                  </div>
                </article>
              </li>

              <?php } wp_reset_postdata();?>      
                       
          </ul>
          <img class="marketplace__bg-img" src="<?php bloginfo('template_url'); ?>/assets/img/news-bg.png" alt="icon" />
        </div>
      </section>
      <section class="regulations" id="policy">
        <div class="container">
          <h2 class="regulations__tittle tittle">

            <?php echo get_category( 4, ARRAY_A )['name']; ?>

          </h2>
          <ul class="regulations__list">

            <?php
              global $post;

              $myposts = get_posts([ 
                'numberposts' => -1,
                'category_name' => 'regulation'
              ]);

              if( $myposts ){
                foreach( $myposts as $post ){
                  setup_postdata( $post );
                  ?>
                  
                  <li class="regulations__item">
                    <?php the_post_thumbnail(
                      array(120, 120), 
                      array('class' => 'regulations__img')
                    ); ?>
                    <h3 class="regulations__item-tittle"><?php the_title(); ?></h3>
                    <p class="regulations__text"><?php echo the_excerpt(); ?></p>
                  </li>

                  <?php 
                }
              }
              wp_reset_postdata();
            ?>

          </ul>
        </div>
      </section>
      <section
        class="singup"
        id="events"
        style="
          background-image: linear-gradient(to right, rgba(47, 48, 58, 1.5), rgba(47, 48, 58, -0.5)),
            url(<?php the_field('background_image'); ?>);
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
        "
      >
        <div class="container">
          <h2 class="singup__tittle"><?php the_field('subscription_title'); ?></h2>
          <p class="singup__text"><?php the_field('subscription_appeal'); ?></p>
          <form class="singup__form">
            
            <?php echo do_shortcode('[contact-form-7 id="51" title="Contact form"]') ?>
            
          </form>
        </div>
      </section>
     
      <?php get_footer(); ?>