<?php 

  global $post;

  $page_slug    = $post->post_name;
  $header_img   = get_field('header_image', 'option');
  $header_title = get_field('header_title', 'option');
  $header_msg   = get_field('header_msg', 'option');
  $logo_lrg     = get_field('company_logo_large', 'option');

 ?>

<?php get_header(); ?>

  <?php 

  if (is_page('our-services' )) : 
    get_template_part( 'page', 'services' );
  else :
  ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <section id="page">
    <div class="container">
      <div class="row">
        <div class="title">
          <h1><?php the_title( ); ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
         <div class="content">
            <?php the_content( ); ?>
         </div>
        </div>
      </div>
    </div>
  </section>
  <?php endwhile; endif; ?>

<?php endif; ?>
			
<?php get_footer(); ?>