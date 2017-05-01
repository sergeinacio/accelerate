<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */
?>

		</div><!-- #main -->


		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
			<?php
			    $output = get_bloginfo('description');
			    $newoutput = preg_replace("/\bAccelerate\b/", "<span style=\"color:#45ac9d;\">Accelerate </span>", $output);
			?>
				<div class="site-description">
				<p><?php echo $newoutput; ?></p>
				<p>&copy; <?php bloginfo('title'); ?>, LLC
				</div>
				
			<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<div id="footer-right" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			<?php endif; ?>

				
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>