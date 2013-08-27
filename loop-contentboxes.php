<?php if (get_field('content_boxes')): ?>

	<?php while (has_sub_field('content_boxes')): ?>

			<?php
			 
			$post_object = get_sub_field('content_box');
			 
			if( $post_object ): 
			 
				// override $post
				$post = $post_object;
				setup_postdata( $post );
				$show_title = get_field('hide_title'); 
			 
				?>
			    <div class="content-box">
			    	<div class="inner-content-box" style="background: url('<?php the_field('background_image'); ?>') no-repeat top right">
				    	<?php // TITLE CODE ?>
				    	<?php if ( $show_title[0] != "yes" ) { ?>
				    	<h3><?php the_title(); ?></h3>
				    	<?php } ?>
				    	
				    	<?php // UPPER IMAGE ?>
				    	<?php 
				    	$upper_link_type = get_field('upper_image_link_type');
				    	$upper_link = get_field('upper_image_link');
				    	$upper_link_ext = get_field('upper_image_external_link');
				    	?>
				    	
				    	<?php if (get_field('upper_image') != "") { // don't do anything unless there's an image?>
				    	
							<?php if ($upper_link != "" && $upper_link_type == "internal") { 
								echo '<a href="'.$upper_link.'">'; 
							} elseif ($upper_link_ext != "" && $upper_link_type == "external") { 
								echo '<a href="'.$upper_link_ext.'" target="_blank">';
							} ?>
							
							<img src="<?php the_field('upper_image'); ?>" alt="<?php (the_field('upper_image_alt')); ?>">
							
							<?php if ($upper_link_type[0] != "none") { echo '</a>'; } // if we're dealing with an internal or exteral link ?>
				    	
				    	<?php } // end upper image check ?>	
				    	
				    	<?php // CONTENT ?>		    	
				    	<?php the_field('box_content'); ?>
				    	
				    	<?php // LOWER IMAGE ?>
				    	<?php 
				    	$lower_link_type = get_field('lower_image_link_type');
				    	$lower_link = get_field('lower_image_link');
				    	$lower_link_ext = get_field('lower_image_external_link');
				    	?>
				    	
				    	<?php if (get_field('lower_image') != "") { // don't do anything unless there's an image?>
				    	
							<?php if ($lower_link != "" && $lower_link_type == "internal") { 
								echo '<a href="'.$lower_link.'">'; 
							} elseif ($lower_link_ext != "" && $upper_link_type == "external") { 
								echo '<a href="'.$lower_link_ext.'" target="_blank">';
							} ?>
							
							<img src="<?php the_field('lower_image'); ?>" alt="<?php (the_field('lower_image_alt')); ?>">
							
							<?php if ($lower_link_type[0] != "none") { echo '</a>'; } // if we're dealing with an internal or exteral link ?>
				    	
				    	<?php } // end lower image check ?>	
				    	
				    	
				    	
			    	</div>
			    </div>
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>

		<?php endwhile; ?>

<?php endif; ?>