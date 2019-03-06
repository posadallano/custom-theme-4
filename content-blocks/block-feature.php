<?php
/**
 * The template used for displaying a Feature block.
 *
 * @package David Annakie
 */ 
// Set up fields.
$subtitle = get_sub_field( 'subtitle' );
$title = get_sub_field( 'title' );
?>
<?php 
// Start a <container> with possible block options.
david_annakie_display_block_options(
	array(
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => 'content-block row feature', // Container class.
	)
);
?>
<div class="cont-feature">	
	<div class="cont-title">
		<?php if ($subtitle): ?>
			<h3 class="aos-item aos-init aos-animate" data-aos="fade" data-aos-delay="0"> <?php echo ( $subtitle ); ?> </h3>
		<?php endif ?>
		<?php if ($title): ?>
			<h2 class="aos-item aos-init aos-animate" data-aos="fade" data-aos-delay="200"> 
				<?php echo ( $title ); ?> 
			</h2>
		<?php endif ?>
	</div>

	<?php
	// check if the repeater field has rows of data
	$count_rf = count(get_sub_field('feature'));
	if( have_rows('feature') ): ?>
		<div class="top-blocks">
			<?php 
			$cont_t = 1;
		 	// loop through the rows of data
		    while ( have_rows('feature') ) : the_row();
		        // sub_fields
				$background_image = get_sub_field('background_image');
				$icon = get_sub_field('icon');
				$title = get_sub_field('title');
				$subtitle = get_sub_field('subtitle');
			    ?>	
				<?php if ($background_image): ?>  
		    		<?php if ($count_rf == 2) { ?>
		    			<a rel="relativeanchor" href="#featblock-<?php echo $cont_t; ?>" class="top-block transition image-as-background col-sm-12 col-md-6 col-lg-6" style="background-image: url('<?php echo $background_image; ?>');">	
		    		<?php } elseif ($count_rf == 3) { ?>
		    			<a rel="relativeanchor" href="#featblock-<?php echo $cont_t; ?>" class="top-block transition image-as-background col-sm-12 col-md-4 col-lg-4" style="background-image: url('<?php echo $background_image; ?>');">	
		    		<?php } elseif ($count_rf == 4) { ?>
		    			<a rel="relativeanchor" href="#featblock-<?php echo $cont_t; ?>" class="top-block transition image-as-background col-sm-12 col-md-3 col-lg-3" style="background-image: url('<?php echo $background_image; ?>');">	
		    		<?php } elseif ($count_rf == 5) { ?>
		    			<a rel="relativeanchor" href="#featblock-<?php echo $cont_t; ?>" class="top-block transition image-as-background col5" style="background-image: url('<?php echo $background_image; ?>');">	
		    		<?php } ?>
		    			<div class="content-top">
					    	<?php if ($icon): ?>  
			    				<div class="cont-icon-top">
			    					<img src="<?php echo $icon; ?> "> 
			    				</div>
			    			<?php endif; ?>	
			    			<div class="title transition">
			    			<?php if ($title): ?>  
			    				<h3 class="transition"> <?php echo $title; ?> </h3>
			    			<?php endif; ?>	
			    			<?php if ($subtitle): ?>  
			    				<h4 class="transition"> <?php echo $subtitle; ?> </h4>
			    			<?php endif; ?>	
			    			</div>
		    			</div>
		    		</a> <!-- .top-block -->
	    		<?php endif; ?>
			<?php 
			$cont_t = $cont_t + 1;
		    endwhile;
		    ?>
		</div> <!-- .top-blocks -->
		<div class="content-blocks-feat transition-feat">
			<?php
			if( have_rows('feature') ):
				$cont_b = 1;
			    while ( have_rows('feature') ) : the_row(); 
			    	$bg_appear = get_sub_field('bg_appear');
			    	if ($bg_appear == 'single') { 
			    		$bg_type_single = get_sub_field('bg_type_single');
			    		if ($bg_type_single == 'image') { 
			    			$bg_image_single = get_sub_field('bg_image_single'); 
			    			$bg_image_single_mobile = get_sub_field('bg_image_single_mobile'); ?>
			    			<div id="<?php echo 'featblock-' . $cont_b; ?>" data-aos="" data-aos-delay="400" class="block-feature bg-single image-as-background" style="background-image: url('<?php echo $bg_image_single; ?>');">
			    				<?php if ($bg_image_single_mobile): ?>
			    					<img class="back-mobile-single" src="<?php echo $bg_image_single_mobile; ?>">
			    				<?php endif ?>
			    		<?php
			    		} 
			    		elseif ($bg_type_single == 'color') { 
			    			$bg_color_single = get_sub_field('bg_color_single'); ?>
			    			<div id="<?php echo 'featblock-' . $cont_b; ?>" data-aos="" data-aos-delay="400" class="block-feature bg-single image-as-background" style="background-color: <?php echo $bg_color_single; ?>">
			    		<?php 
			    		} // bg_type_single
			    		
						if( have_rows('column') ):
						    while ( have_rows('column') ) : the_row(); ?>
								<div class="col-feature col-sm-12 col-md-6 col-lg-6">
					    			<?php get_template_part( 'template-parts/content', 'column' ); ?> 
					    		</div>	
					    	<?php 
						    endwhile;  // column
						endif;  // column
						?>
							</div><!-- .bg-single --> 
					<?php 
			    	} // $bg_appear == 'single'
			    	elseif ($bg_appear == 'double') { ?>
			    		<div id="<?php echo 'featblock-' . $cont_b; ?>" class="anchor block-feature bg-double">
				    		<?php 
							if( have_rows('column') ):
								$contcol = 1;
							    while ( have_rows('column') ) : the_row(); 
							    	if ($contcol == 1) {
							    		
										$bg_type_double = get_sub_field('bg_type_double');
							    		if ($bg_type_double == 'image') { 
							    			$bg_image_double = get_sub_field('bg_image_double'); 
							    			$bg_horiz_pos = get_sub_field('bg_horiz_pos'); ?>
							    			<div data-aos="fade-up" data-aos-offset="200" data-aos-delay="200" class="col-feature aos-item aos-init aos-animate col-sm-12 col-md-6 col-lg-6 bg-single back-double" style="background-image: url('<?php echo $bg_image_double; ?>'); background-position-x: <?php echo $bg_horiz_pos; ?>">
							    		<?php
							    		} 
							    		elseif ($bg_type_double == 'color') { 
							    			$bg_color_double = get_sub_field('bg_color_double'); ?>
							    			<div data-aos="fade-up"  data-aos-offset="200" data-aos-delay="200" class="col-feature aos-item aos-init aos-animate col-sm-12 col-md-6 col-lg-6 bg-single image-as-background" style="background-color: <?php echo $bg_color_double; ?>">
							    		<?php 
							    		} // bg_type_double	
							    	}
							    	elseif ($contcol == 2) {
										$bg_type_double = get_sub_field('bg_type_double');
							    		if ($bg_type_double == 'image') { 
							    			$bg_image_double = get_sub_field('bg_image_double'); 
							    			$bg_horiz_pos = get_sub_field('bg_horiz_pos'); ?>
							    			<div data-aos="fade-up" data-aos-offset="200" data-aos-delay="200" class="col-feature aos-item aos-init aos-animate col-sm-12 col-md-6 col-lg-6 bg-single back-double" style="background-image: url('<?php echo $bg_image_double; ?>'); background-position-x: <?php echo $bg_horiz_pos; ?>">
							    		<?php
							    		} 
							    		elseif ($bg_type_double == 'color') { 
							    			$bg_color_double = get_sub_field('bg_color_double'); ?>
							    			<div data-aos="fade-up" data-aos-offset="200" data-aos-delay="200" class="col-feature aos-item aos-init aos-animate col-sm-12 col-md-6 col-lg-6 bg-single image-as-background" style="background-color: <?php echo $bg_color_double; ?>">
							    		<?php 
							    		} // bg_type_double	
							    	} // contcol
						    		?>
							    			<?php get_template_part( 'template-parts/content', 'column' ); ?> 
							    		</div>
							    <?php 
							    $contcol++;
							    endwhile;  // column
							endif;  // column
							?>
						</div><!-- .bg-double --> 
					<?php 
			    	} // $bg_appear == 'double'
			    	$cont_b = $cont_b + 1;
			    endwhile;  // feature
			endif;  // feature
			?>
		</div><!-- .content-blocks-feat --> 
	<?php endif; ?>
</div><!-- .cont-feature --> 
</section><!-- .generic-content -->