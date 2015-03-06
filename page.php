<?php 

  global $post;

  $page_slug    = $post->post_name;
  $header_img   = get_field('header_image', 'option');
  $header_title = get_field('header_title', 'option');
  $header_msg   = get_field('header_msg', 'option');
  $logo_lrg     = get_field('company_logo_large', 'option');

 ?>

<?php get_header(); ?>

  <section id="<?php echo $page_slug ?>_page_header" class="background" style="background-image:url('<?php echo $header_img ?>');">
    <div class="container">
      <div class="row">
        <div class="col-xs-12" >
          <div class="header_logo not_mobile">
            <img src="<?php echo $logo_lrg ?>" alt="">
          </div>
         </div>
        </div>
      </div>
    </div>
  </section>
  <div id="<?php echo $page_slug ?>_page">

      <?php if (is_page('our-services' )) : ?>
        <?php

          global $wp_query;
          
          $args = array( 
                        'post_type' => 'page',
                        'pagename' => 'our-services'
                        );

                  query_posts( $args );  
                     
        ?>

        <section id="our_services_main">

        <?php  if (have_posts()) : while (have_posts()) : the_post(); ?>

          <div class="container">
            <div class="content_container">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 page_title">
                  <h1><?php the_title( ); ?></h1>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 title_container">
                  <div class="image">
                    <img src="<?php the_field('bathroom_image') ?>" alt="">
                  </div>
                  <div class="title">
                    <h1><?php the_field('bathroom_title'); ?></h1>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="col-xs-12 col-md-6">
                    <div class="service_content">
                      <?php the_field('bathroom_description') ?>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <div class="carousel_dir">
                      Click the arrows to view our <?php the_field('bathroom_title') ?> gallery
                    </div>
                    <div class="main_svc_carousel">
                      <div id="mainSvcCarousel" class="carousel slide">
                        <div class="carousel-inner">
                          <div class="active item">
                            <div class="fill" style="background-image:url(http://placehold.it/350x350/449955/FFF)">
                              <div class="container">
                                First Slide
                              </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="fill" style="background-image:url(http://placehold.it/350x350/894823/FFF)"></div>
                          </div>
                          <div class="item">
                            <div class="fill" style="background-image:url(http://placehold.it/350x350/049827/FFF)"></div>
                          </div>
                          <div class="item">
                            <div class="fill" style="background-image:url(http://placehold.it/350x350/192874/FFF)"></div>
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
                        <a class="carousel-control left" href="#mainSvcCarousel" data-slide="prev">‹</a>
                        <a class="carousel-control right" href="#mainSvcCarousel" data-slide="next">›</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
            <div class="content_container">
              <div class="row">
                <div class="col-xs-12 col-md-12 title_container">
                  <div class="image">
                    <img src="<?php the_field('remodel_image') ?>" alt="">
                  </div>
                  <div class="title">
                    <h1><?php the_field('remodel_title'); ?></h1>
                  </div>
                </div>
                <div class="col-xs-12 col-md-12">
                  <div class="col-xs-12 col-md-6">
                    <div class="service_content">
                      <?php the_field('remodel_description') ?>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <div class="carousel_dir">
                      Click the arrows to view our <?php the_field('remodel_title') ?> gallery
                    </div>
                    <div class="main_svc_carousel">
                      <div id="mainSvcCarousel" class="carousel slide">
                        <div class="carousel-inner">
                          <div class="active item">
                            <div class="fill" style="background-image:url(http://placehold.it/350x350/449955/FFF)">
                              <div class="container">
                                First Slide
                              </div>
                            </div>
                          </div>
                          <div class="item">
                            <div class="fill" style="background-image:url(http://placehold.it/350x350/894823/FFF)"></div>
                          </div>
                          <div class="item">
                            <div class="fill" style="background-image:url(http://placehold.it/350x350/049827/FFF)"></div>
                          </div>
                          <div class="item">
                            <div class="fill" style="background-image:url(http://placehold.it/350x350/192874/FFF)"></div>
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
                        <a class="carousel-control left" href="#mainSvcCarousel" data-slide="prev">‹</a>
                        <a class="carousel-control right" href="#mainSvcCarousel" data-slide="next">›</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
            <div class="content_container">
              <div class="row">
                <div class="col-xs-12 col-md-12 title_container">
                  <div class="image">
                    <img src="<?php the_field('financing_image') ?>" alt="">
                  </div>
                  <div class="title">
                    <h1><?php the_field('financing_title'); ?></h1>
                  </div>
                </div>
                <div class="col-xs-12 col-md-12">
                  <div class="col-xs-12 col-md-6">
                    <div class="service_content">
                      <?php the_field('financing_description') ?>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <div class="download">
                      <a href="#"><?php the_field('financing_link_text') ?></a>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>
          
        <?php endwhile; endif; ?>

        <?php wp_reset_query(); rewind_posts();?>
          
        </section>

      <?php endif; ?>
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