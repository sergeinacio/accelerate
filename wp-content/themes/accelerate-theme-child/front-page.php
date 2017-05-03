<?php
/**
 * The template for displaying the homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>

<section class="home-page">
	<div class="site-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class='homepage-hero'>
				<?php the_content(); ?>
				<a class="button" href="<?php echo home_url(); ?>/case_studies/">View Our Work</a>
			</div>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .site-content -->
</section><!-- .home-page -->

<section class="featured-work">
	<div class="site-content">

		<h4>Featured Work</h4>

		<ul class="homepage-featured-work">
		<?php query_posts('posts_per_page=3&post_type=case_studies'); ?>
			
			<?php while ( have_posts() ) : the_post();
				$image_1 	= get_field('image_1');
				$size 		= "medium";
			?>
			<li class="individual-feature-work">
				<figure>
					<a href="<?php the_permalink(); ?>">
						<?php if($image_1) {
							echo wp_get_attachment_image( $image_1, $size );
						} ?>
					</a>
				</figure>

				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

				<?php endwhile; ?>
			</li>
		<?php wp_reset_query(); ?>
		</ul>

	</div><!-- .site-conten -->
</section><!-- .featured-work -->

<section class="home-our-services">
	<div class="site-content">

		<h4><a href="<?php echo home_url(); ?>/about/">Our Services</a></h4>

		<ul class="homepage-our-services">
		<?php query_posts('posts_per_page=4&post_type=about'); ?>
			
			<?php while ( have_posts() ) : the_post();
				$image 	= get_field('image');
				$size 		= "medium";
			?>
			<li class="individual-feature-work">
				<figure>
					<a href="<?php echo home_url(); ?>/about/">
						<?php if($image) {
							echo wp_get_attachment_image( $image, $size );
						} ?>
					</a>
				</figure>

				<h5><a href="<?php echo home_url(); ?>/about/"><?php the_title(); ?></a></h5>

				<?php endwhile; ?>
			</li>
		<?php wp_reset_query(); ?>
		</ul>

	</div><!-- .site-conten -->
</section><!-- .featured-work -->

<section class="recent-posts">
	<div class="site-content">
		<div class="blog-post">

		<h4>From the Blog</h4>
		<?php query_posts('posts_per_page=1'); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<?php the_excerpt(); ?> 
				<a class="read-more-link" href="<?php the_permalink(); ?>">Read More <span>&rsaquo;</span></a>
			<?php endwhile; ?> 
		<?php wp_reset_query(); ?>

		</div><!-- .blog-post -->
		<div class="blog-post">
		<h4>Recent Tweets</h4>
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div id="secondary" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		<?php endif; ?>
		<!-- <a class="read-more-link" href="https://twitter.com/sergeinacio">Follow Us <span>&rsaquo;</span></a> -->
		</div>
	</div><!-- .site-content -->
</section><!-- .recent-posts -->

<?php get_footer(); ?>