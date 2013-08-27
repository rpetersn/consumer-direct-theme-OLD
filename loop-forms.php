<?php // check for rows (parent repeater)
if( get_field('forms') ): ?>
	<div id="form-wrap">
	<?php 

	// loop through rows (parent repeater)
	while( has_sub_field('forms') ): ?>
		<div>
			<h3><?php the_sub_field('form_group_title'); ?></h3>
			<?php 

			// check for rows (sub repeater)
			if( get_sub_field('form_group_item') ): ?>
				<ul class="document-forms">
				<?php 

				// loop through rows (sub repeater)
				while( has_sub_field('form_group_item') ): 

						$form_file_id = get_sub_field('form_document');

						if ($form_file_id!='') { 
							$link_url = wp_get_attachment_url( $form_file_id ); 
							$blank = '';
							$icon = "icon-file-alt";
							$filetype = get_filetype_attachment( $form_file_id );
							$size = formatSizeUnits(filesize( get_attached_file( $form_file_id ) ) );
							$formatted_size = " <span>($filetype - $size)</span>";
							$pre_link = '<a href="'.$link_url.'">';
							$post_link = '</a>';
						} 

					// display each item as a list 
					?>
					<?php if (get_sub_field('form_title') != "") { // check for at least a title?>
						<li><?php echo $pre_link;?><i class="<?php echo $icon; ?>"></i><?php the_sub_field('form_title'); ?><?php if ($size!="") { echo $formatted_size; } ?><?php echo $post_link; ?></li>
					<?php } ?>
				<?php endwhile; ?>
				</ul>
			<?php endif; //if( get_sub_field('form_group_item') ): ?>
		</div>	

	<?php endwhile; // while( has_sub_field('forms') ): ?>
	</div>
<?php endif; // if( get_field('forms') ): ?>