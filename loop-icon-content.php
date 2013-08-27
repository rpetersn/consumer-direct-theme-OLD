	<?php if(get_field('icon_content')): ?>

		<?php while(has_sub_field('icon_content')): ?>

			<div class="block-icon clearfix">
				<img src="<?php the_sub_field('icon_image'); ?>" />
				<?php the_sub_field('icon_text'); ?>
			</div>
	 
		<?php endwhile; ?>

	<?php endif; ?>