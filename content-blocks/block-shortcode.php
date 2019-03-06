<?php
/**
 * The template used for displaying a Shortcode block.
 *
 * @package David Annakie
 */ 

// Set up fields.
$shortcode = get_sub_field( 'shortcode' );
$title = get_sub_field( 'title' );
$subtitle = get_sub_field( 'subtitle' );
// Start a <container> with possible block options.
david_annakie_display_block_options(
	array(
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => 'content-block row cont-shortcode', // Container class.
	)
);
?>
	<div class="cont-title">
		<?php if ($title): ?>
			<h2 class="aos-item aos-init aos-animate cont-subtitle" data-aos="fade" data-aos-delay="0"> <?php echo ( $title ); ?> </h2>
		<?php endif ?>
		<?php if ($subtitle): ?>
			<h3 class="aos-item aos-init aos-animate cont-subtitle" data-aos="fade" data-aos-delay="200"> <?php echo ( $subtitle ); ?> </h3>
		<?php endif ?>
	</div>
	<?php if ($shortcode): ?>
		<?php echo do_shortcode( $shortcode ); ?>
	<?php endif ?>
</section><!-- .generic-content -->