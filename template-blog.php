<?php
/**
 * Template Name: Blog
 *
 * The template for displaying Blog page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package David Annakie
 */
get_header(); ?>
	<section class="archive-blog blog-section">	
		<div class="cont-title">
			<span>My</span>
			<h1> <?php the_title(); ?> </h1>
		</div>
		<div class="blogtop">
			<?php 
			$args = array(
			    'post_type' => 'post',
			    'posts_per_page' => -1,
			    'cat' => 8,
			);
			$loop = new wp_Query($args);
			$count_posts = $loop->post_count; 
			if ($count_posts > 1)  { ?>
			<ul>	
				<?php 
				while($loop->have_posts()) : $loop->the_post(); ?>
 					<?php 
					$id = get_the_ID();
					$ccat = count( get_the_terms( $id, 'category' ) );
					$councat = $ccat - 1;
					?>
					<div class="feat-post">
					    <?php the_post_thumbnail(); ?> 
					    <div class="info-feat-post">
					    	<span class="cat"> 
								<?php foreach((get_the_category()) as $i => $category){
									if( ($category->term_id !== 8) && ($category->term_id !== 1) ) {
										if ($i == ($councat)) { ?>
											<a class="transition" href="<?php echo '../category/' . $category->slug; ?>">
												<?php echo $category->name . ""; ?>
											</a>
										<?php 
										} else { ?>
											<a class="transition" href="<?php echo '../category/' . $category->slug; ?>">
												<?php echo $category->name . " - "; ?>
											</a>
										<?php 
										}
									}
								} ?>
					    	</span>
					    	<a class="titlepost" href="<?php the_permalink(); ?>"> <h2 class="transition"> <?php the_title(); ?> </h2> </a>
					    	<div class="datefeat"> <?php echo get_the_date('M d, Y'); ?> </div>
					    	<?php the_excerpt(); ?>
					    	<a class="rm-bf" href="<?php the_permalink(); ?>" class="btn-feat"> READ MORE </a >
					    </div>
					</div>
				<?php 
				endwhile;
				wp_reset_query(); ?>
			</ul>						
			<?php } else {
				while($loop->have_posts()) : $loop->the_post(); ?>
					<a class="feat-post" href="<?php get_permalink(); ?>">
					    <?php 
					    the_post_thumbnail();
					    the_title( '<h6>', '</h6>' ); 
					    ?>
					</a>
				<?php 
				endwhile;
				wp_reset_query();
			} ?>
		</div>	
		<div class="contpostblog">
			<div class="list-catblog">
			    <?php wp_list_categories( array(
			        'orderby'    => 'name',
			        'title_li'   => 'Categories',
			        'exclude'    => array( 8, 1 )
			    ) ); ?> 	
			</div>		
			<div class="cont-row-blog">
				
				<div class="cont-posts">
					<?php 
					$args = array('post_type' => 'post', 'posts_per_page' => -1, 'orderby' => 'post_date', 'order' => 'DSC' );
					$query = new WP_Query( $args );  							
						
					if ( $query->have_posts() ) :  ?>
						<?php while ( $query->have_posts() ) : $query->the_post(); 
							$secondary_thumb = get_field('secondary_thumb');
							$size = 'large'; 
							$thumb_blog = $secondary_thumb['sizes'][ $size ];
						?>
							
							<article class="blog-article col-lg-12 col-md-12 col-sm-12">
								<?php if ($query->current_post % 2 == 0): ?>
					                <div class="infopost col-lg-6 col-md-6 col-sm-12">
					                	<div class="cont-infpost middle-vertical">
				                    		<span class="categ">
				                    			<?php 
				                    				$id = get_the_ID();
				                    				$ccat = count( get_the_terms( $id, 'category' ) );
				                    				$councat = $ccat - 1;
					                    		?>
					                    		<?php foreach((get_the_category()) as $i => $category){
													if( ($category->term_id !== 8) && ($category->term_id !== 1) ) { 
														if ($i == ($councat)) { ?>
															<a class="transition" href="<?php echo '../category/' . $category->slug; ?>">
																<?php echo $category->name . ""; ?>
															</a>
														<?php 
														} else { ?>
															<a class="transition" href="<?php echo '../category/' . $category->slug; ?>">
																<?php echo $category->name . " - "; ?>
															</a>
														<?php 
														}
													}
												} ?>
											</span>
											<a class="titlepost" href="<?php the_permalink(); ?>"> <h2 class="transition"> <?php the_title(); ?> </h2> </a>
											<div class="datepost"> <?php echo get_the_date('M d, Y'); ?> </div>
											<?php the_excerpt(); ?>
											<a class="rm-b transition" href="<?php the_permalink(); ?>">READ MORE</a>
										</div>
					                </div>
					                <div class="thumbpost transition col-lg-6 col-md-6 col-sm-12" style="background-image: url('<?php echo $thumb_blog; ?>');">
					                </div>
								<?php else: ?>
					                <div class="thumbpost transition col-lg-6 col-md-6 col-sm-12" style="background-image: url('<?php echo $thumb_blog; ?>');">
					                </div>
					                <div class="infopost col-lg-6 col-md-6 col-sm-12">
					                	<div class="cont-infpost middle-vertical">
				                    		<span class="categ">
				                    			<?php 
				                    				$id = get_the_ID();
				                    				$ccat = count( get_the_terms( $id, 'category' ) );
				                    				$councat = $ccat - 1;
					                    		?>
					                    		<?php foreach((get_the_category()) as $i => $category){
													if( ($category->term_id !== 8) && ($category->term_id !== 1) ) { 
														if ($i == ($councat)) { ?>
															<a class="transition" href="<?php echo '../category/' . $category->slug; ?>">
																<?php echo $category->name . ""; ?>
															</a>
														<?php 
														} else { ?>
															<a class="transition" href="<?php echo '../category/' . $category->slug; ?>">
																<?php echo $category->name . " - "; ?>
															</a>
														<?php 
														}
													}
												} ?>
											</span>
											<a class="titlepost" href="<?php the_permalink(); ?>"> <h2 class="transition"> <?php the_title(); ?> </h2> </a>
											<div class="datepost"> <?php echo get_the_date('M d, Y'); ?> </div>
											<?php the_excerpt(); ?>
											<a class="rm-b transition" href="<?php the_permalink(); ?>">READ MORE</a>
										</div>
					                </div>
								<?php endif ?>
							</article>	
						<?php endwhile; ?>
						<?php //wp_reset_postdata(); ?>
			        
			        <?php endif; ?> 	
			        <div class="cont-ld">
			        	<div id="loadMore" class="transition">LOAD MORE POSTS</div>
			        </div>
			       
				</div> 
			</div>
		</div>
	</section>

<?php get_footer(); ?>