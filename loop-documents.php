	<?php if(get_field('doc_attachment')): ?>

		<?php while(has_sub_field('doc_attachment')): ?>

		<?php
				$doc_id = get_sub_field('attachment_doc');
				$link_url = wp_get_attachment_url( $doc_id ); 
				$blank = '';
				$icon = "icon-file-alt";
				$filetype = get_filetype_attachment( $doc_id );
				$size = formatSizeUnits(filesize( get_attached_file( $doc_id ) ) );
				$formatted_size = " <span>($filetype - $size)</span>";
				$pre_link = '<a href="'.$link_url.'">';
				$post_link = '</a>';
			
		?>

			<p class="doc-link"><?php echo $pre_link;?><i class="<?php echo $icon; ?> icon-large"></i> <?php the_sub_field('attachment_title'); ?><?php if ($size!="") { echo $formatted_size; } ?><?php echo $post_link; ?></p>
	 
		<?php endwhile; ?>

	<?php endif; ?>