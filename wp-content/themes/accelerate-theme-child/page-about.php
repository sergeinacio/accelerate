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
			<section class="about-content">
				<div id="our-services">
					<h5>Our Services</h5>
					<p>We take pride in our clients and the content we create for them. Here's a brief overview of our offered services.</p>

				</div>
				<?php 
					$args 	= array( 'post_type' => 'services', 'posts_per_page' => 10 );
					$loop 	= new WP_Query( $args );
					$count	= 1;
					while ( $loop->have_posts() ) : $loop->the_post();
					$service_description 	= get_field('service_description');
					$image 					= get_field('image');
					$size 					= "full";
				?>

					<?php if ($count %2 != 0) { ?>
					<article class="about-services">
						<div class="service-image" style="margin-right: 35px">
							<?php if($image) {
								echo wp_get_attachment_image( $image, $size );
							} ?>
							
						</div>
							
						<div class="service-description">
							<h2><?php the_title(); ?></h2>
							<p><?php echo $service_description; ?></p>
							<?php the_content(); ?>
						</div>
					</article>
					<?php $count++; } else { ?>
						<article class="about-services">
							<div class="service-description">
								<h2><?php the_title(); ?></h2>
								<p><?php echo $service_description; ?></p>
								<?php the_content(); ?>
							</div>
						<div class="service-image" style="margin-left: 35px">
							<?php if($image) {
								echo wp_get_attachment_image( $image, $size );
							} ?>
							
						</div>
					</article>
					<?php $count++; } ?>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</section>
	</div><!-- #primary -->
	<div class="site-content">
		<div class="contact-bottom">
			<h2>Interested in working with us?</h2><a class="button" href="<?php echo home_url(); ?>/contact/">Contact Us</a>
		</div><!-- .site-info -->
	</div>
<?php get_footer(); ?>