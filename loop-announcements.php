<?php 
$original_query = $wp_query;  // saving query for later

	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
	else { $paged = 1; }

	$num_posts = get_field('announcement_show_posts');
	if ( !is_numeric($num_posts) || $num_posts == '' || $num_posts == '0' ) { $num_posts = '4'; }

	$wp_query = new WP_Query('post_type=post&posts_per_page='.$num_posts.'&paged=' . $paged); // just posts
	while($wp_query->have_posts()) : $wp_query->the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p class="byline vcard"><?php
				printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
			?></p>
			<?php the_content(); ?>
			<?php get_template_part( 'loop', 'documents' ); ?>
		</div>

	<?php endwhile; ?>

		<?php if (function_exists('bones_page_navi')) { ?>
				<?php bones_page_navi(); ?>
		<?php } else { ?>
				<nav class="wp-prev-next">
						<ul class="clearfix">
							<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
							<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
						</ul>
				</nav>
		<?php } // end check for bones_page_navi ?>

<?php 

$wp_query = $original_query; //returning query 
wp_reset_postdata(); // reset the query 

?>