<?php
/**
 * Template Name: Flex Content
 *
 * The template for displaying pages with ACF components.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package David Annakie
 */
	if ( is_home() ) :
		get_header( 'home' );
	else :
		get_header();
	endif;

	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post(); ?>
				<div class="content-area flex-content">
					<main id="main" class="site-main">
					<?php david_annakie_display_content_blocks(); ?>
					<div class="content-elementor">
						<?php the_content(); ?>
					</div>	
					</main><!-- #main -->
				</div><!-- .primary --> 
<?php	endwhile;
	endif; 
	get_footer(); 
?>
