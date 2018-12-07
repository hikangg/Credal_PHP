<?php
/**
 * The template for displaying all single posts.
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
?>

<?php get_header(); ?>
	
	<div class="single-service">
		
        <div class="single-service-content">
        	<div class="container-fluid clearfix">
            	<div class="row">
                	<div class="col-md-7 service_page_thumbnail">
                    	<img class="single_service_thumb" src="<?php the_field('credal_service_image'); ?>" />	
                    </div>
                    <div class="col-md-5 service_page_content">
                    	<?php if( have_posts() ) {
								while( have_posts() ) {
									the_post();  ?>
									<div class="data">
                                    	<div class="vc_custom_heading"><?php the_title(); ?></div>
                                    	<div class="service_content"><?php the_content(); ?></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row single_service_blocks">
                                    	<?php
											if( have_rows('service_key_features') ):
												while ( have_rows('service_key_features') ) : the_row();
												if( get_row_layout() == 'key_feature' ):?>
													<div class="col-md-6">
                                                        <h6 class="vc_custom_heading"><?php the_sub_field('key_feature_title'); ?></h6>
                                                        <div class="block_summary"><?php the_sub_field('key_feature_description'); ?></div>
                                                    </div>
												<?php endif;
												endwhile;
												else :
											endif;
										?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php if(get_field('catalogue_file')) { ?>
                                        <div class="catalogue_file">
                                            <a class="file_link_btn" href="<?php the_field('catalogue_file') ?>" target="_blank" download>Download Catalogue</a>
                                        </div>
                                    <?php } ?>
								<?php }
							}
						?>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        
        <div class="all_services_list">
            <div class="container-fluid clearfix">
            	<h2 class="credal_heading" style="margin-bottom:35px;">Related Services</h2>
                <div class="variable related-services row">
                	<?php 
					$currentID = get_the_ID();
					$aop_cat_id = get_the_terms( $post->ID, 'aop_categories' );     
					foreach ( $aop_cat_id as $cat)
					$args = array( 'post_type' => 'credal-services', 'post__not_in' => array($currentID), 'posts_per_page' => '6' );
					$the_query = new WP_Query( $args ); 
					?>
					<?php if ( $the_query->have_posts() ) { ?>
					<?php while ( $the_query->have_posts() )  { $the_query->the_post();  ?>
                    <div class="aop_block col-md-4">
						<?php $thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
                              $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'thumbnail_size' );
                              $thumb_url = $src[0];
                        ?>
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb_url; ?>" /></a>
                        <h2 class="block_title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    </div>
					<?php wp_reset_postdata(); } ?>
					<?php } else { ?>
					<p style="color:#fff;"><?php _e( 'Sorry, Credal Services found.' ); } ?></p>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri().'/css/slick.css' ?>">
<script src="<?php echo get_stylesheet_directory_uri().'/js/slick.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    jQuery(document).on('ready', function() {
      jQuery(".variable").slick({
        dots: false,
        infinite: true,
        variableWidth: true
      });
    });
</script>
    
<?php get_footer();