<?php
/** 
 * Eclipse Dot functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Eclipse_Dot
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eclipse_dot_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Eclipse Dot, use a find and replace
		* to change 'eclipse-dot' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'eclipse-dot', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'eclipse-dot' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'eclipse_dot_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'eclipse_dot_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eclipse_dot_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eclipse_dot_content_width', 640 );
}
add_action( 'after_setup_theme', 'eclipse_dot_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eclipse_dot_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'eclipse-dot' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'eclipse-dot' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'eclipse_dot_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eclipse_dot_scripts() {
	//wp_enqueue_style( 'jqueryui-css', get_template_directory_uri() . '/css/jquery-ui.css',array(), time());
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css',array(), time());
	wp_enqueue_style( 'bx-slider-css', trailingslashit( get_stylesheet_directory_uri() ) . '/css/jquery.bxslider.css',array(), time());
	wp_enqueue_style( 'eclipse-dot-style', get_stylesheet_uri(), array(), time() );
	wp_style_add_data( 'eclipse-dot-style', 'rtl', 'replace' );
	
	wp_enqueue_script( 'jquery-min-js', get_template_directory_uri() . '/js/jquery-3.6.3.min.js', array(), time() );
	wp_enqueue_script( 'jquery-validate', get_template_directory_uri() . '/js/jquery.min.js', array(), _S_VERSION, true );
	//wp_enqueue_script( 'jquery-ui-script', get_template_directory_uri() . '/js/jquery-ui.js', array(),time() );
	wp_enqueue_script( 'popper-script', get_template_directory_uri() . '/js/popper.min.js', array(),time() );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array(), time() );
  	//wp_enqueue_script( 'jquery-ui-script', get_template_directory_uri() . '/js/jquery-ui.js', array(),time() );
  	//wp_enqueue_script( 'popper-script', get_template_directory_uri() . '/js/popper.min.js', array(),time() );

	wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), time() );
	wp_enqueue_script( 'masonry-js', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array(), time() );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), time() );
	wp_enqueue_script( 'bxslider-min-js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array(), time() );
	wp_enqueue_script( 'eclipse-dot-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eclipse_dot_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('acf/init', 'eoa_acf_op_init');

function eoa_acf_op_init() {
   
    if( function_exists('acf_add_options_page') ) {

       
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Theme Options'),
            'menu_title'    => __('Theme Options'),
            'menu_slug'     => 'theme-options',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}

// END ENQUEUE PARENT ACTION
add_shortcode('post_tab', 'post_tab_fun');
function post_tab_fun(){ ?>
    <nav>
        <ul class='tabs-custom'>
			<li class='active' data-tab-id='tab1'>ALL</li>
            <?php $args = array(
                /*'taxonomy' => 'category',
                'orderby' => 'name',
                'order'   => 'ASC',
                'hide_empty' => false,*/
                'hide_empty'=> false,
                'orderby' => 'name',
                'order' => 'DESC'
            );
            $cats = get_categories($args);
            $i=2; foreach($cats as $cat) { ?>
                <li data-tab-id='tab<?php echo $i; ?>'><?php echo $cat->name; ?></li>
            <?php $i++; } ?>
        </ul>
    </nav>
    <div class='content-section'>
        <?php
        echo '<div id="tab1" class="contentcustom active" >';
        $the_query = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'DESC',
        )); ?>
        <div class="row">
        	<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post();
	            $blog_title = get_the_title();
	            $blog_content = get_the_content();
	            $post_id = get_the_id(); 
	            $terms = get_the_terms($post_id, 'category' );
	            $f_image = get_the_post_thumbnail_url($post_id);
	            if ($terms && ! is_wp_error($terms)) :
	                $tslugs_arr = array();
	                foreach ($terms as $term) {
	                    $tslugs_arr[] = $term->name;
	                }
	                $terms_slug_str = join( " , ", $tslugs_arr);
	            endif; ?>
	            <div class="col-md-4 col-sm-6 col-12 col-lg-3"> 
	                <div class="blog_post">
	                    <a href="<?php echo get_the_permalink(); ?>">
							<div class="images-block">
	        					<div class="images-container">
									<img src="<?php echo $f_image; ?>">
								</div>
							</div>
						</a>
	                    <div class="blog_detail">
	                        <p><?php echo $terms_slug_str; ?></p>
	                        <a href="<?php echo get_the_permalink(); ?>"><h3><?php echo $blog_title; ?></h3></a>
	                        <a href="<?php echo get_the_permalink(); ?>">Continue Reading 🡢</a>
	                    </div>
	                </div>
	            </div>
	            <?php endwhile; wp_reset_postdata();
	        endif; ?>
        </div>
        <?php echo '</div>';
        $i =2;
        foreach($cats as $cat) { 
        	//echo "<pre>"; print_r($cat);
            echo '<div id="tab'.$i.'" class="contentcustom" >';
            $the_query = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'DESC',
                'category_name' => $cat->slug
            )); ?>
            <div class="row">
                <?php $totalpost = $the_query->found_posts;
                if($totalpost){
                	if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post();
	                        $blog_title = get_the_title();
	                        $post_id = get_the_id(); 
	                        $terms = get_the_terms($post_id, 'category' );
	                        $f_image = get_the_post_thumbnail_url($post_id);
	                        if ($terms && ! is_wp_error($terms)) :
	                            $tslugs_arr = array();
	                            foreach ($terms as $term) {
	                                $tslugs_arr[] = $term->name;
	                            }
	                            $terms_slug_str = join( " , ", $tslugs_arr);
	                        endif; ?>
	                        <div class="col-md-4 col-sm-6 col-12 col-lg-3"> 
	                            <div class="blog_post">
	                                <a href="<?php echo get_the_permalink(); ?>">
										<div class="images-block">
	        								<div class="images-container">
												<img src="<?php echo $f_image; ?>">
											</div>
										</div>
									</a>
	                                <div class="blog_detail">
	                                    <p><?php echo $terms_slug_str; ?></p>
	                                    <a href="<?php echo get_the_permalink(); ?>"><h3><?php echo $blog_title; ?></h3></a>
	                                    <a href="<?php echo get_the_permalink(); ?>">Continue Reading 🡢</a>
	                                </div>
	                            </div>
	                        </div>
	                    <?php endwhile; wp_reset_postdata();
                    endif;
                }else{ ?>
                    <div class="col-md-12">
                        <p>No Record(s) Found!</p>
                    </div>
            <?php } ?>
            </div>
            <?php echo '</div>';
        $i++; } ?>
    </div>
<?php
}


function client_logo(){ ?>
	<style>

    </style>
	<?php if( have_rows('client_images' , 'option') ): ?>
		<div>
	    	<ul class="banner">
			    <?php $i =1; while( have_rows('client_images' , 'option') ): the_row(); 
			        $client_logo = get_sub_field('client_logo');
			        ?>
			        <?php if($i == 1){ ?><li><?php } ?>
			        	<?php if($i == 1){ ?><div class="row gx-2"><?php }else if($i == 7){ ?><div class="row gx-2 mt-2"><?php } ?>
			        	<div class="col-md-4 col-6 mb-2 col-xl-2">
			                <a href="#" class="slider-card-custom">
			                    <img src="<?php echo $client_logo['url']; ?>" alt="">
			                </a>
			            </div>
			        	<?php if( ($i == 6 ) || ($i == 12) ){ ?></div><?php } ?>
			        <?php if($i == 12){ ?></li><?php } ?>
			    <?php $i++; if($i == 13){ $i = 1;}  endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>
	<script>
    $(function(){
	$('.banner').bxSlider({
		minSlides : 1,
		maxSlides : 1,
		
	});
});
</script>
<?php }

add_shortcode('client_image' , 'client_logo');

function pagination_bar( $wp_query, $paged=1, $pages = '', $range = 1 ) {
    $showitems = ($range * 1);  
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
     if(1 != $pages)
     {
         echo "<div class=\"page-link col-md-12 text-center \">";
         if($paged > 1 && $showitems < $pages) echo " <a href=\"javascript:void(0);\" class=\"page-numbers prev paging\" pageno='".($paged - 1)."'> Previous </a> ";
        if($pages > 3){
          for ($i=1; $i < $pages; $i++)
          {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
              echo ($paged == $i)? " <span class=\"page-numbers current\"> ".$i." </span> ":" <a href=\"javascript:void(0);\" pageno='".($i)."' class=\"page-numbers inactive paging\"> ".$i." </a> ";
              }
          }
        }else{
          for ($i=1; $i <= $pages; $i++)
          {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
              echo ($paged == $i)? " <span class=\"page-numbers current\"> ".$i." </span> ":" <a href=\"javascript:void(0);\" pageno='".($i)."' class=\"page-numbers inactive paging\"> ".$i." </a> ";
              }
          }
        }
         if($pages > 3){
          echo ($paged == $pages)? " <span class=\"page-numbers current\"> ".$pages." </span> ":"...<a href=\"javascript:void(0);\" pageno='".($pages)."' class=\"page-numbers inactive paging\"> ".$pages." </a> ";
         }
         if ($paged < $pages && $showitems < $pages) echo " <a href=\"javascript:void(0);\" class=\"page-numbers next paging \" pageno=\"".($paged + 1)."\"> Next </a> ";
         echo "</div>";
     }
}