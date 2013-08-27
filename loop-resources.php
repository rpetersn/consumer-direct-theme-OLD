<?php if(get_field('resources')): ?>
 
	<ul class="resources">
 
	<?php while(has_sub_field('resources')): ?>

	<?php 

	$resource_url = get_sub_field('resource_url'); 
	$resource_file_id = get_sub_field('resource_file');

	// initially set the link url to the resource URL
	$link_url = $resource_url; 
	$blank = ' target="_blank"';
	$icon = "icon-link";
	$size = '';

	// if there's a file, override the resource URL with that of the attachment
	if ($resource_file_id!='') { 
		$link_url = wp_get_attachment_url( $resource_file_id ); 
		$blank = '';
		$icon = "icon-file-alt";
		$filetype = get_filetype_attachment( $resource_file_id );
		$size = formatSizeUnits(filesize( get_attached_file( $resource_file_id ) ) );
		$formatted_size = " <span>($filetype - $size)</span>";
	} 

	?>
 
		<li><a href="<?php echo $link_url; ?>"<?php echo $blank; ?>><i class="<?php echo $icon; ?>"></i><?php the_sub_field('title'); ?><?php if ($size!="") { echo $formatted_size; } ?></a></li>
 	
	<?php endwhile; ?>
 
	</ul>
 
<?php endif; ?>