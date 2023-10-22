<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eclipse_Dot
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'eclipse-dot' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'eclipse-dot' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'eclipse-dot' ), 'eclipse-dot', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script type="text/javascript" >
var EhAPI = EhAPI || {}; EhAPI.after_load = function(){EhAPI.set_account('hm43sehd7om9ulqmalibrlgms9', 'eclipse');
	EhAPI.execute('rules');};(function(d,s,f) {var sc=document.createElement(s);sc.type='text/javascript';sc.async=true;sc.src=f;var m=document.getElementsByTagName(s)[0];
	m.parentNode.insertBefore(sc,m);})(document, 'script', '//d2p078bqz5urf7.cloudfront.net/jsapi/ehform.js?v' + new Date().getHours());
	</script> 	
</body>
</html>
