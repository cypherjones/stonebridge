<?php 

  global $post;

  $page_slug    = $post->post_name;
  $header_img   = get_field('header_image', 'option');
  $header_title = get_field('header_title', 'option');
  $header_msg   = get_field('header_msg', 'option');
  $logo_lrg     = get_field('company_logo_large', 'option');

 ?>

<?php get_header(); ?>

  <div id="page">
    
      <section id="page_header" class="background" style="background-image:url('<?php echo $header_img ?>');">
        <div class="container">
          <div class="row">
            <div class="col-xs-12" >
              <div class="header_logo not_mobile">
                <img src="<?php echo $logo_lrg ?>" alt="">
              </div>
              <div class="header_title">
                <h3>
                  <?php 

                    if(! empty($header_title)) : 

                    echo $header_title;

                    endif;

                  ?>
                </h3>
              </div>
              <div class="header_msg">
                <?php 

                  if(! empty($header_msg)) :

                  echo $header_msg;

                  endif;

                 ?>
              </div>
              <div class=""> 
                <div class="page_down">
                  <a href="#our_work"><i class="fa fa-angle-down"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php 
      
      global $wp_query;
      
      $args = array( 
                    'post_type' => 'page',
                    'pagename' => 'our-services'
                    );

              query_posts( $args );  
                   
      ?>
      <section id="our_services">
      <?php if( have_posts() ) : while (have_posts() ) : the_post(); ?>
        <div class="container">
          <div class="content_container">
            <div class="row title">
              <div class="col-xs-12">
                <h1><?php the_title( ); ?></h1>
              </div>
            </div>
            <div class="row content">
              <div class="col-xs-12">

              <?php if (is_mobile()) : ?>

                <div id="ourServiceCarousel" class="carousel slide">
                  <div class="carousel-inner">

                    <?php if(have_rows('services')) : while (have_rows('services')) : the_row(); ?>

                    <?php 

                      $service     = get_sub_field('service');
                      $icon        = get_sub_field('icon');
                      $description = get_sub_field('description');

                    ?>

                    <div class="item">

                      <div class="icon">

                        <?php if(! empty($icon)) : ?>
                          <img src="<?php echo $icon ?>" alt="">
                        <?php endif; ?>
                        
                      </div>
                      <div class="services">

                        <?php if(! empty($service)) : ?>
                          <h3><?php echo $service ?></h3>
                        <?php endif; ?>
                        
                      </div>
                      <div class="description">

                        <?php if(! empty($description)) : ?>
                          <p><?php echo $description ?></p>
                        <?php endif; ?>
                        
                      </div>
                      <div class="btn services">
                        <a href="<?php bloginfo('template_directory' ); ?>/our-services">View Gallery</a>
                      </div>

                    </div>
                    <?php endwhile; endif; ?>
                  
                  </div>

                  <div class="pull-center">
                    <a class="carousel-control left" href="#ourServiceCarousel" data-slide="prev">‹</a>
                    <a class="carousel-control right" href="#ourServiceCarousel" data-slide="next">›</a>
                  </div>
                </div>

              <?php else : ?>

                <ul>
                 
                  <?php if(have_rows('services')) : while (have_rows('services')) : the_row(); ?>

                   <?php 

                      $service     = get_sub_field('service');
                      $icon        = get_sub_field('icon');
                      $description = get_sub_field('description');

                     ?>
                    
                    <li>
                      <div class="icon">

                        <?php if(! empty($icon)) : ?>
                          <img src="<?php echo $icon ?>" alt="">
                        <?php endif; ?>
                        
                      </div>
                      <div class="services">

                        <?php if(! empty($service)) : ?>
                          <h3><?php echo $service ?></h3>
                        <?php endif; ?>
                        
                      </div>
                      <div class="description">

                        <?php if(! empty($description)) : ?>
                          <p><?php echo $description ?></p>
                        <?php endif; ?>
                        
                      </div>
                      <div class="btn services">
                        <a href="<?php bloginfo('url' ); ?>/our-services">View Gallery</a>
                      </div>
                    </li>

                  <?php endwhile; endif; ?>
                  
                </ul>
              
              <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
      <?php endwhile; endif; ?>
      <?php wp_reset_query(); rewind_posts(); ?>
      </section>
      <?php 
      
      global $wp_query;
      
      $args = array( 
                    'post_type' => 'page',
                    'pagename' => 'our-work'
                    );

              query_posts( $args );  
                 
      ?>
      <section id="our_work">
      
      <?php if( have_posts() ) : while (have_posts()) : the_post(); ?>
        <div class="container">
          <div class="content_container">
            <div class="row title">
              <div class="col-xs-12">
                <h1><?php the_title( ); ?></h1>
              </div>
            </div>
            <div class="row content">
              <div class="col-xs-12 nopad">

                <div id="ourWorkCarousel" class="carousel slide">
                  <div class="carousel-inner">
                    <div class="active item">
                      <div class="fill" style="background-image:url(http://placehold.it/1200x700/449955/FFF)">
                        <div class="container">
                          First Slide
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="fill" style="background-image:url(http://placehold.it/1200x700/894823/FFF)"></div>
                    </div>
                    <div class="item">
                      <div class="fill" style="background-image:url(http://placehold.it/1200x700/049827/FFF)"></div>
                    </div>
                    <div class="item">
                      <div class="fill" style="background-image:url(http://placehold.it/1200x700/192874/FFF)"></div>
                    </div>
                    
                    

                    <!-- <div class="fill" style="background-image:url('<?php the_field('first_slide') ?>');">
                      </div>
                    </div>
                    <?php  if( have_rows('slider_images') ) : while ( have_rows('slider_images') ) : the_row(); ?>
                    
                    <div class="item">
                    <div class="fill" style="background-image:url('<?php the_sub_field('image') ?>')"></div>
                    </div>

                    <?php endwhile; endif; ?> -->
                      
                    
                  </div>
                  <div class="pull-center">
                  <a class="carousel-control left" href="#ourWorkCarousel" data-slide="prev">‹</a>
                  <a class="carousel-control right" href="#ourWorkCarousel" data-slide="next">›</a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <?php endwhile; endif; ?>

        <?php wp_reset_query(); rewind_posts(); ?>
      </section>
      <?php 
      
      global $wp_query;
      
      $args = array( 
                    'post_type' => 'page',
                    'pagename' => 'our-story'
                    );

              query_posts( $args );  
                 
      ?>
      <section id="our_story">
        
        <?php if( have_posts() ) : while (have_posts()) : the_post(); ?>
          <div class="container">
            <div class="content_container">
              <div class="row title">
                <div class="col-xs-12">
                  <h1><?php the_title( ); ?></h1>
                </div>
              </div>
              <div class="row content">
                <div class="col-xs-12">
                  <?php the_content( ); ?>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>

        <?php wp_reset_query(); rewind_posts(); ?>
        
      </section>
      <?php 
      
      global $wp_query;
      
      $args = array( 
                    'post_type' => 'page',
                    'pagename' => 'contact-us'
                    );

              query_posts( $args );  
                 
      ?>
      <section id="contact_us">

      <?php if( have_posts() ) : while (have_posts()) : the_post(); ?>

        <div class="form">
          <div class="container title">
          <h1><?php the_title( ); ?></h1>
          <?php

            $form = get_field('form');

            if(! empty($form) ):

            echo do_shortcode($form );

           endif; 

          ?>
          <div class="contact_meta not_mobile">
            <div class="number">
              <?php if(get_field('phone_number', 'option')) { ?>

                <p><a href="tel:1<?php the_field('phone_number', 'option' ) ?>"><?php the_field('phone_number', 'option') ?></a></p>

              <?php } ?>
            </div>
            <div class="email">
                <?php if(get_field('main_email', 'option')) { ?>

                  <p><a href="mailto:<?php the_field('main_email', 'option') ?>"><?php the_field('main_email', 'option') ?></a></p>
                  
                <?php } ?>
            </div>
          </div>
          </div> 
        </div>

      <?php endwhile; endif; ?>

      <?php wp_reset_query(); rewind_posts(); ?>
        
      </section>

  </div>
      
<?php get_footer(); ?>