<?php
/**
 * The template for displaying the about page
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>

	<section class="about-page">
		<div class="site-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class='about-hero'>
					<?php the_content(); ?>
				</div>
			<?php endwhile; // end of the loop. ?>
		</div><!-- .site-content -->
	</section><!-- .home-page -->



	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php 
				$args 	= array( 'post_type' => 'about', 'posts_per_page' => 10 );
				$loop 	= new WP_Query( $args );
				$count	= 1;
				while ( $loop->have_posts() ) : $loop->the_post();
				$service_description 	= get_field('service_description');
				$service_title 			= get_field('service_title');
				$image 					= get_field('image');
				$size 					= "full";
			?>

				<?php if ($count %2 != 0) { ?>
				<article class="about-services">
				<div id="our-services">
					<h5>Our Services</h5>
					<p>We take pride in our clients and the content we create for them.</p>
					<p>Here's a brief overview of our offered services.</p>
				</div>
					<aside class="case-study-sidebar">
						<?php if($image) {
							echo wp_get_attachment_image( $image, $size );
						} ?>
						
					</aside>
						
					<div class="case-study-images">
						<h4><?php echo $service_title; ?></h4>
						<p><?php echo $service_description; ?></p>
						<?php the_content(); ?>
						<p><?php echo $count; ?></p>
					</div>
				</article>
				<?php $count++; } else { ?>
					<article class="about-services">
					<div class="case-study-images">
						<h4><?php echo $service_title; ?></h4>
						<p><?php echo $service_description; ?></p>
						<?php the_content(); ?>
					</div>
					<aside class="case-study-sidebar">
						<?php if($image) {
							echo wp_get_attachment_image( $image, $size );
						} ?>
						
					</aside>
					<p><?php echo $count; ?></p>
				</article>
				<?php $count++; } ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>