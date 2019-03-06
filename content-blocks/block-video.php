<?php
/**
 * The template used for displaying a Video block.
 *
 * @package David Annakie
 */ 

// Set up fields.
$subtitle_1 = get_sub_field( 'subtitle_1' );
$subtitle_2 = get_sub_field( 'subtitle_2' );
$title = get_sub_field( 'title' );
$place_vid_gif = get_sub_field( 'placeholder_video_gif' );
$youtube_video = get_sub_field( 'youtube_video' );
$text_link = get_sub_field( 'text_link' );
$text_url = get_sub_field( 'text_url' );
$link_target = get_sub_field( 'link_target' );

?>
<?php 
// Start a <container> with possible block options.
david_annakie_display_block_options(
	array(
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => 'content-block row video', // Container class.
	)
);
?>
<div class="cont-video">
	<div class="cont-title">
		<?php if ($subtitle_1): ?>
			<h3 class="aos-item aos-init aos-animate cont-subtitle" data-aos="fade" data-aos-delay="0"> <?php echo $subtitle_1; ?> </h3>
		<?php endif ?>
		<?php if ($title): ?>
			<h2 class="aos-item aos-init aos-animate cont-subtitle" data-aos="fade" data-aos-delay="200"> <?php echo $title; ?> </h2>
		<?php endif ?>
		<?php if ($subtitle_2): ?>
			<h3 class="aos-item aos-init aos-animate cont-subtitle" data-aos="fade" data-aos-delay="400"> <?php echo $subtitle_2; ?> </h3>
		<?php endif ?>
	</div>
	<div class="cont-iframe">
		<?php if ( ($youtube_video) || ($place_vid_gif) ): ?>
			<a data-fancybox data-width="640" data-height="360" href="<?php echo $youtube_video; ?>">
				<div class="contimg-vid">
					<div class="overlayvid"></div>
	        		<img class="card-img-top img-fluid" src="<?php echo $place_vid_gif; ?>">
	        		<div class="videoicon"></div>
	        	</div>
	      	</a>		
		  <?php endif ?>
		  
		<div class="cont-cta">
			<?php if ($text_url):
				if ( $link_target == "same" ) {
					$target = "_self";
				} elseif ( $link_target == "new" ) {
					$target = "_blank";
				}
			?>				
				<a class="cta-link" target="<?php echo $target; ?>" href="<?php echo $text_url; ?> "> <?php echo $text_link . ' >'; ?> </a> 
			<?php endif ?>
		</div>
	</div>
</div>
</section><!-- .generic-content -->