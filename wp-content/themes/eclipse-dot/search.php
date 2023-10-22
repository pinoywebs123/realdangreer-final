<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Eclipse_Dot
 */

get_header();
?>
<div class="elementor new-search-bg">
	<div class="custom-container container">
		<div class="otherpost newsearch-page">
			<?php echo do_shortcode('[elementor-template id="4155"]'); ?>
			<div class='content-section'>
				<?php $search = trim($_GET['s']);
			        echo '<div class="contentcustom" >';
			        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
			        $wp_query = new WP_Query(array(
			            'post_type' => 'post',
			            'post_status' => 'publish',
			            'posts_per_page' => 12,
			            'order' => 'ASC',
			            's' => $search,
			                'paged' => $paged,
			        )); ?>
			        <?php if ( $wp_query->have_posts() ) : ?>
			        	<div class="row">
							<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
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
								<div class="images-block">
									   <div class="images-container">
									      <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo $f_image; ?>"></a>
									   </div>
									</div>
				                    <div class="blog_detail">
				                        <p><?php echo $terms_slug_str; ?></p>
				                        <a href="<?php echo get_the_permalink(); ?>"><h3><?php echo $blog_title; ?></h3></a>
				                        <a href="<?php echo get_the_permalink(); ?>">Continue Reading 🡢</a>
				                    </div>
				                </div>
				            </div>
				            <?php endwhile; ?>
			        	</div>
			        	<div class="row">
			        		<div class="col-md-12 text-center">
					            <div class="custom-pagination">
						            <?php
									    $big = 999999999; // need an unlikely integer
									     
									    echo paginate_links( array(
									        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									        'format'    => '?paged=%#%',
									        'current'   => max( 1, get_query_var('paged') ),
									        'total'     => $wp_query->max_num_pages
									    ) );
									?>
								</div>
							</div>
							<?php //pagination_bar($wp_query, $paged);
							wp_reset_postdata(); ?>
						</div>
				    <?php endif; ?>
			        <?php echo '</div>'; ?>
			</div>
		</div>
	</div>
</div>
<?php
//get_sidebar();
get_footer();
