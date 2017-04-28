<?php
/**
 * The template for displaying all pages
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

	<div id="page-404" class="site-content">
		<div id="content" role="main">
			<h4>HEY!! Slow down! You just got lost!<br>route:</h4>
			<h1>404</h1>
			<h4>cannot be found!</h4>

			<p class="got-lost-margin">Where do you want to drive to?</p>

			<nav id="404-navigation" class="site-navigation primary-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => '404-nav', 'menu_class' => 'nav-menu' ) ); ?>
			</nav>

			<div class="widget widget_search-form">
				<form role="search" method="get" class="search-form" action="">
					<input type="text" class="input" placeholder="or use your GPS :)" value="" name="s">
					<input type="button" class="input-btn" value="">
				</form>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>