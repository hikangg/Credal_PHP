<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dhaka
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    
    <div class="credal-news">
    	<div class="container-fluid">
        	<div class="news-wrap">
                <h2 class="credal_heading center-align">News</h2>
                <div class="news_list row">
                        <?php
                        $args = array( 'post_type' => 'post', 'posts_per_page' => '4' );
                        $the_query = new WP_Query( $args ); 
                        ?>
                        <?php if ( $the_query->have_posts() ) { ?>
                        <?php while ( $the_query->have_posts() )  { $the_query->the_post();  ?>
                        <div class="aop_block col-md-3">
                        <?php $thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
                              $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'thumbnail_size' );
                              $thumb_url = $src[0];
                        ?>
                            <div class="news_thumb_wrap">
                                <a href="javascript:void()"><img src="<?php echo $thumb_url; ?>" /></a>
                            </div>
                            <div class="news-category" style="display:none;"><?php echo the_category(); ?></div>
                            <h2 class="block_title"><?php the_title(); ?></h2>
                        </div>
                        <?php wp_reset_postdata(); } ?>
                        <?php } else { ?>
                        <p><?php _e( 'Sorry, no news found.' ); } ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

	<section class="footer-bottom">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
                	<div class="row">
                        <div class="footer-logo col-md-2">
                            <?php if (get_theme_mod('custom_logo') && function_exists('the_custom_logo'))  {
                                    the_custom_logo(); } ?>
                        </div>
                        <div class="footer-nav col-md-10">
                            <?php
                                wp_nav_menu( array( 
                                    'theme_location' => 'footer-menu', 
                                    'container_class' => 'credal-footer-menu' ) );
                            ?>
                        </div>
                    </div>
				</div>
                <div class="col-md-4">
					<div class="site-social">
						<?php dynamic_sidebar('footer-social'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

<?php if (is_user_logged_in()) { ?>
<style type="text/css">
.credal-sticky-header { top:32px;}
</style>
<?php } ?>
<script type="text/javascript">
jQuery(window).scroll(function(){
  var sticky = jQuery('.site-header'),
      scroll = jQuery(window).scrollTop();

  if (scroll >= 1) sticky.addClass('credal-sticky-header');
  else sticky.removeClass('credal-sticky-header');
});

jQuery(document).ready(function(e) {
    jQuery('<div class="clearfix"></div>').insertAfter('.related-services .col-md-4:nth-child(3)');
	jQuery('<div class="clearfix"></div>').insertAfter('.single_service_blocks .col-md-6:nth-child(2)');
	jQuery('<div class="clearfix"></div>').insertAfter('.advisors_list .aop_block:nth-child(3)');
	jQuery('<div class="clearfix"></div>').insertAfter('.advisors_list .aop_block:nth-child(7)');
	jQuery('<div class="clearfix"></div>').insertAfter('.advisors_list .aop_block:nth-child(10)');
	jQuery('.news-category a').bind('click', false);
});

jQuery(window).bind("load", function() {
	jQuery('.vc_gitem-post-data a').each(function(){
		if (jQuery(this).attr('title')=='Fintech') {
			jQuery(this).attr('target','_blank');
		}
	});
});

</script>


<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/html5lightbox.js'; ?>"></script>

</body>
</html>
