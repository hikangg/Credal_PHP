<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}


// All Custom Menus
function credal_custom_menus() {
  register_nav_menus(
    array(
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'credal_custom_menus' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jsg_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Social', 'dhaka' ),
		'id'            => 'footer-social',
		'description'   => esc_html__( 'Add widgets here.', 'dhaka' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'jsg_widgets_init' );

function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background-image: url('.get_stylesheet_directory_uri() . '/images/credal_icon_logo.png) !important; width: 100% !important; background-position: center center !important; background-size: 75px auto !important; }
</style>';
}
add_action('login_head', 'custom_loginlogo');

add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    //return 'http://www.jsguae.com';
	return site_url() ;
}

/*###########*/
/*###########*/
// Credal Services Post Type
/*###########*/
/*###########*/
function create_service_posttype() {
    register_post_type( 'credal-services',
        array(
            'labels' => array(
                'name' => __( 'Credal Services' ),
                'singular_name' => __( 'Credal Service' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'credal-services'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_service_posttype' );
 
function post_type_service() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Credal Services', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Service', 'twentythirteen' ),
        'all_items'           => __( 'All Services', 'twentythirteen' ),
        'view_item'           => __( 'View Service', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Service', 'twentythirteen' ),
        'add_new'             => __( 'Add New Service', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Service', 'twentythirteen' ),
        'update_item'         => __( 'Update Service', 'twentythirteen' ),
        'search_items'        => __( 'Search Service', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'credal-services', 'twentythirteen' ),
        'description'         => __( 'Credal Services', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres','services_categories' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'credal-services', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'post_type_service', 0 );

//Add Categories taxonomy for Area of Practice Post Type...
function service_category_taxonomy() {  
    register_taxonomy(  
        'services_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'credal-services',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'service_category', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'service_category_taxonomy');

/*###########*/
/*###########*/
// Credal Team Members Post Type
/*###########*/
/*###########*/
function create_team_posttype() {
    register_post_type( 'credal-team',
        array(
            'labels' => array(
                'name' => __( 'Credal Team' ),
                'singular_name' => __( 'Credal Team Member' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'credal-team'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_team_posttype' );
 
function post_type_team() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Team Members', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Team Member', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Credal Team', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Member', 'twentythirteen' ),
        'all_items'           => __( 'All Members', 'twentythirteen' ),
        'view_item'           => __( 'View Member', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Member', 'twentythirteen' ),
        'add_new'             => __( 'Add New Member', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Member', 'twentythirteen' ),
        'update_item'         => __( 'Update Member', 'twentythirteen' ),
        'search_items'        => __( 'Search Member', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'credal-team', 'twentythirteen' ),
        'description'         => __( 'Credal Team', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 6,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'credal-team', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'post_type_team', 0 );


//Set Excerpt Length for Credal Services
function services_excerpt_length( $length ) {
	global $post;
	if ($post->post_type == 'credal-services') {
		return 10;
	}
}
add_filter( 'excerpt_length', 'services_excerpt_length', 999 );


//All Services Shortcode
function all_related_services() { ?>
	<div class="all_services_list">
        <div class="container-fluid1 clearfix">
            <h2 class="credal_heading" style="margin-bottom:35px;">Related Services</h2>
            <div class="variable related-services row">
                <?php 
				global $post;
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
<?php	}
add_shortcode( 'all_related_services', 'all_related_services' );


//All Team Members Shortcode
function credal_team_members() { ?>
	<div class="credal-teams  board-of-directors">
    	<div class="container-fluid1 clearfix">
            <div class="advisors_list row">
					<?php
                    $args = array( 'post_type' => 'credal-team', 'posts_per_page' => '12' );
                    $the_query = new WP_Query( $args ); 
                    ?>
                    <?php if ( $the_query->have_posts() ) { ?>
                    <?php while ( $the_query->have_posts() )  { $the_query->the_post();  ?>
                    <div class="aop_block col-md-4">
                    	<?php $thumb_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
							  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'thumbnail_size' );
							  $thumb_url = $src[0];
						?>
						<a href="<?php the_permalink(); ?>"><img class="team_member_thumb" src="<?php echo $thumb_url; ?>" /></a>
                        <h6 class="vc_custom_heading member_designation"><?php the_field('member_designation'); ?></h6>
                        <a href="<?php the_permalink(); ?>"><h2 class="block_title"><?php the_title(); ?></h2></a>
                    </div>
                    <?php wp_reset_postdata(); } ?>
                    <?php } else { ?>
                    <p><?php _e( 'Sorry, no advisors found.' ); } ?></p>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
<?php	}
add_shortcode( 'credal_team_members', 'credal_team_members' );