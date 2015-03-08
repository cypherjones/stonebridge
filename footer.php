		<footer>
			<div class="container .footer_meta">
        <div class="row footer_top_row">
          <div class="col-xs-12 col-sm-6 footer_menu">

            <?php wp_nav_menu( array( 'theme_location' => 'bottom-nav')); ?>   <!-- menu start --> 

          </div>
          <div class="col-xs-12 col-sm-6 footer_contact yes_mobile">
              

            <div class="footer_phone_email">
                <div class="footer_phone ">
                <?php if(get_field('phone_number', 'option')) { ?>

                  <p><a href="tel:1<?php the_field('phone_number', 'option' ) ?>"><?php the_field('phone_number', 'option') ?></a></p>

                <?php } ?>

                </div>
                <div class="footer_email">

                <?php if(get_field('main_email', 'option')) { ?>

                  <p><a href="mailto:<?php the_field('main_email', 'option') ?>"><?php the_field('main_email', 'option') ?></a></p>
                  
                <?php } ?>

                </div>
            </div>
            
            <?php if(get_field('facebook_url', 'option')) : ?>

            <div class="footer_social_icons">
              <a target="_blank" class="fa fa-facebook circle" href="<?php the_field('facebook_url', 'option'); ?>"></a>
            </div>

              <?php endif; ?> 
          </div>  
        </div>
        <div class="row footer_bottom">   
          <div class="col-xs-12 copyright_designedby">  
            <div class="col-xs-12 col-md-6 copyright">
              <p>Site Copyright &copy; 2015 <!-- &#8226; --> <?php the_field('company_name', 'option') ?></p>
            </div>
            <div class="col-xs-12 col-md-6 designedby">
              <p>Site Designed by <a href="http://www.daycreative.net" target="_blank">Daycreative</a></p>
            </div>   
          </div> 
        </div>
      </div>
		</footer>

    <script>
      $('#ourServiceCarousel').carousel({
        interval: false      });
      $('#ourWorkCarousel').carousel({
        interval: false,
        pause: "false"
      });
      $('#mainSvcCarousel', '#mainSvcCarousel2').carousel({
        interval: false
      }));
      $(".carousel-inner .item:first").addClass("active");
      
    </script>
    <script>
    $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
    </script>

	</body>
</html>