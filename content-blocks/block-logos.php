<?php
/**
 * The template used for displaying a Logos block.
 *
 * @package David Annakie
 */ 

// Set up fields.
$title = get_sub_field( 'title' );
$subtitle = get_sub_field( 'subtitle' );
// Start a <container> with possible block options.
david_annakie_display_block_options(
	array(
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => 'content-block row logos', // Container class.
	)
);
?>
	<div class="contentlog">
			<div class="cont-title">
				<?php if ($title): ?>
					<h2 class="aos-item aos-init aos-animate cont-subtitle" data-aos="fade" data-aos-delay="0"> <?php echo $title; ?> </h2>	
				<?php endif ?>
				<?php if ($subtitle): ?>
					<h3 class="aos-item aos-init aos-animate cont-subtitle" data-aos="fade" data-aos-delay="200"> <?php echo $subtitle; ?> </h3>	
				<?php endif ?>
			</div>
			<?php 
			$count = count(get_sub_field('logos')); 
				  if ($count > 5) { ?>
					<div class="cont-logos carousel-logos">	  	
				  <?php 
				  }
				  else { ?>
				  	<div class="cont-logos">	  	
				  <?php 
				  }
			?>
		
			<?php
			// check if the repeater field has rows of data
			if( have_rows('logos') ):
			 	// loop through the rows of data
			    while ( have_rows('logos') ) : the_row();
			        // Set up fields.
					$logo = get_sub_field( 'logo' ); ?>
					<img src="<?php echo $logo; ?>">
				<?php 
			    endwhile;
			endif;
			?>
		</div>
	</div>
</section><!-- .generic-content -->