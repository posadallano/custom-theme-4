<?php
/**
 * The template used for displaying a Blog Section block.
 *
 * @package David Annakie
 */ 

// Set up fields.
$subtitle = get_sub_field( 'subtitle' );
$title = get_sub_field( 'title' );
$button_text = get_sub_field( 'button_text' );
$button_url = get_sub_field( 'button_url' );
$link_target = get_sub_field( 'link_target' );
?>
<?php 
// Start a <container> with possible block options.
david_annakie_display_block_options(
	array(
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => 'content-block row blog-home', // Container class.
	)
);
?>

<div class="cont-blog-home">
	<div class="left col-bh col-lg-6 col-md-6 col-sm-12">
		<div class="cont-left">
			<div class="middleleft middle-vertical">
				<div class="cont-title">
					<?php if ($subtitle): ?>
						<h3 class="aos-item aos-init aos-animate" data-aos="fade" data-aos-delay="100"> <?php echo ( $subtitle ); ?> </h3>
					<?php endif ?>
					<?php if ($title): ?>
						<h2 class="aos-item aos-init aos-animate" data-aos="fade" data-aos-delay="200"> 
							<?php echo ( $title ); ?> 
						</h2>
					<?php endif ?>
				</div>
				<?php if ( ($button_url) ): ?>
					<div class="cont-buttons aos-item aos-init aos-animate" data-aos="fade" data-aos-delay="400">
						<?php if ( $button_url ) : 
							if ( $link_target == "same" ) {
								$target = "_self";
							} elseif ( $link_target == "new" ) {
								$target = "_blank";
							}
							?>
								<?php if ($target == "_self" ) { ?>
									<button type="button" class="transition button-david" style="background-color: <?php echo $button_bg_color; ?>;" onclick="location.href='<?php echo esc_url( $button_url ); ?>'"><?php echo esc_html( $button_text ); ?></button>
								<?php } elseif ($target == "_blank" ) { ?>
									<button type="button" class="transition button-david" style="background-color: <?php echo $button_bg_color; ?>;" onclick="window.open('<?php echo esc_url( $button_url ); ?>')"><?php echo esc_html( $button_text ); ?></button>
								<?php } ?>
						<?php endif; ?>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>

	<div class="right-c col-bh col-lg-6 col-md-6 col-sm-12">
		<?php 
		$n_feat_items = get_sub_field('n_featured_items');
		$args = array(
		    'post_type' => 'post',
		    'posts_per_page' => $n_feat_items,
		    'cat' => 8,
		);
		$query = new WP_Query( $args );  							
		if ( $query->have_posts() ) :  ?>
			<?php while ( $query->have_posts() ) : $query->the_post();
				$secondary_thumb = get_field('secondary_thumb');
				$size = 'medium'; 
				$thumb_blog = $secondary_thumb['sizes'][ $size ];
			?>
				<div class="feat-post-hm">
					<div class="cont-thumbpost">
						<div class="thumbpost" style="background-image: url('<?php echo $thumb_blog; ?>');"> </div>
					</div> 
					<div class="cont-r">
						<div class="cont-infopost">
							<h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h2>
							<div class="datepost"> <?php echo get_the_date('M d, Y'); ?> </div>
						</div>
						<div class="rm-post">
							<a class="transition" href="<?php the_permalink(); ?>">READ MORE ></a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>	
		<?php endif ?>
	</div>
</div><!-- .cont-blog-home --> 
</section><!-- .generic-content -->