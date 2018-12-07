<?php/* * Template Name: Credal-Team-Post Template * Template Post Type: post */   get_header();  ?>

<?php get_header(); ?>
	
	<div class="single-service board-of-directors">
        <div class="single-team-content">
        	<div class="container-fluid clearfix">
            	<div class="row">
                	<div class="team_member_thumbnail">
                    	<?php $thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
							  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'thumbnail_size' );
							  $thumb_url = $src[0];
						?>
						<img src="<?php echo $thumb_url; ?>" />	
                    </div>
                    <div class="team_page_content">
                    	<?php if( have_posts() ) {
								while( have_posts() ) {
									the_post();  ?>
									<div class="data">
                                    	<h4 class="vc_custom_heading"><?php the_title(); ?></h4>
                                        <h6 class="vc_custom_heading member_designation"><?php the_field('member_designation'); ?></h6>
                                    	<div class="service_content"><?php the_content(); ?></div>
                                    </div>
                                    <div class="clearfix"></div>
								<?php }
							}
						?>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    
<?php get_footer();