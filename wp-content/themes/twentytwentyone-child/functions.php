<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'twenty-twenty-one-style','twenty-twenty-one-style','twenty-twenty-one-print-style' ) );
        wp_enqueue_style( 'bootstrap-css', trailingslashit( get_stylesheet_directory_uri() ) . '/css/bootstrap.min.css',array(), time());

        wp_enqueue_script( 'bootstrap-js', trailingslashit( get_stylesheet_directory_uri() ) . '/js/bootstrap.min.js', array(), time() );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

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
                'order' => 'ASC'
            );
            $cats = get_categories($args);
            $i=2; foreach($cats as $cat) { ?>
                <li data-tab-id='tab<?php echo $i; ?>'><?php echo $cat->name; ?></li>
            <?php $i++; } ?>
        </ul>
    </nav>
    <div class='content-section'>
        <?php
        echo '<div id="tab1" class="contentcustom active" id="all">';
        $the_query = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'ASC',
        )); ?>
        <div class="row">
            <?php while ( $the_query->have_posts() ) : 
            $the_query->the_post();
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
            <div class="col-md-3"> 
                <div class="blog_post">
                    <img src="<?php echo $f_image; ?>">
                    <div class="blog_detail">
                        <p><?php echo $terms_slug_str; ?></p>
                        <h3><?php echo $blog_title; ?></h3>
                        <a href="<?php echo get_the_permalink(); ?>">Continue Reading 🡢</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php echo '</div>';
        $i =2;
        foreach($cats as $cat) { 
            echo '<div id="tab'.$i.'" class="contentcustom" id="' . $cat->slug.'">';
            $the_query = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'category_name' => $cat->slug
            )); ?>
            <div class="row">
                <?php  $totalpost = $the_query->found_posts;
                if($totalpost){
                    while ( $the_query->have_posts() ) : 
                        $the_query->the_post();
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
                        <div class="col-md-3"> 
                            <div class="blog_post">
                                <img src="<?php echo $f_image; ?>">
                                <div class="blog_detail">
                                    <p><?php echo $terms_slug_str; ?></p>
                                    <h3><?php echo $blog_title; ?></h3>
                                    <a href="<?php echo get_the_permalink(); ?>">Continue Reading 🡢</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
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