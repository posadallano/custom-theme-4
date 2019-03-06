<?php
/**
 * The template used for displaying an About block.
 *
 * @package David Annakie
 */ 

// Set up fields.
$heading1 = get_sub_field( 'heading_1' );
$heading2 = get_sub_field( 'heading_2' );
$image = get_sub_field( 'image' ); 
$paragraph = get_sub_field( 'paragraph' );
$button_1_button_text = get_sub_field( 'button_1_button_text' );
$button_1_button_url = get_sub_field( 'button_1_button_url' );
$button_1_link_target = get_sub_field( 'button_1_link_target' );
$button_2_button_text = get_sub_field( 'button_2_button_text' );
$button_2_button_url = get_sub_field( 'button_2_button_url' );
$button_2_link_target = get_sub_field( 'button_2_link_target' );
$section_id = get_sub_field( 'section_id' );
?>
<?php 
// Start a <container> with possible block options.
david_annakie_display_block_options(
	array(
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => 'content-block row about', // Container class.
	)
);
?>

<div class="cont-about">
	
	<div class="cont-top">
		<?php if ($heading1): ?>
			<h2 class="aos-item aos-init aos-animate left" data-aos="fade" data-aos-delay="0"> <?php echo ( $heading1 ); ?> </h2>
		<?php endif ?>
		<?php if ($image): ?>
			<img src="<?php echo ( $image ); ?>">
		<?php endif ?>
		<?php if ($heading2): ?>
			<h2 class="aos-item aos-init aos-animate right" data-aos="fade" data-aos-delay="200"> <?php echo ( $heading2 ); ?> </h2>
		<?php endif ?>
	</div>
	<?php if ($paragraph): ?>
		<div class="paragraph">
			<?php echo $paragraph; ?>
		</div>
	<?php endif ?>
	
	<?php if ( ($button_1_button_url) || ($button_2_button_url) ): ?>
		<div class="cont-buttons">
			<?php if ( $button_1_button_url ) : 
				if ( $button_1_link_target == "same" ) {
					$target_1 = "_self";
				} elseif ( $button_1_link_target == "new" ) {
					$target_1 = "_blank";
				}
				?>
				<div class="cont-btn">
						<?php if ($target_1 == "_self" ) { ?>
							<button type="button" class="transition button-david" style="background-color: <?php echo $button_bg_color; ?>;" onclick="location.href='<?php echo esc_url( $button_1_button_url ); ?>'"><?php echo esc_html( $button_1_button_text ); ?></button>
						<?php } elseif ($target_1 == "_blank" ) { ?>
							<button type="button" class="transition button-david" style="background-color: <?php echo $button_bg_color; ?>;" onclick="window.open('<?php echo esc_url( $button_1_button_url ); ?>')"><?php echo esc_html( $button_1_button_text ); ?></button>
						<?php } ?>
				</div>
			<?php endif; ?>
			<?php if ( $button_2_button_url ) : 
				if ( $button_2_link_target == "same" ) {
					$target_2 = "_self";
				} elseif ( $button_2_link_target == "new" ) {
					$target_2 = "_blank";
				}
				?>
				<div class="cont-btn">
					<?php if ($target_2 == "_self" ) { ?>
						<button type="button" class="transition button-david" style="background-color: <?php echo $button_bg_color; ?>;" onclick="location.href='<?php echo esc_url( $button_2_button_url ); ?>'"><?php echo esc_html( $button_2_button_text ); ?></button>
					<?php } elseif ($target_2 == "_blank" ) { ?>
						<button type="button" class="transition button-david" style="background-color: <?php echo $button_bg_color; ?>;" onclick="window.open('<?php echo esc_url( $button_2_button_url ); ?>')"><?php echo esc_html( $button_2_button_text ); ?></button>
					<?php } ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif ?>

</div>
</section><!-- .generic-content -->