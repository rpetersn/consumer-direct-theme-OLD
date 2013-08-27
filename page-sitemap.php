<?php
/*
Template Name: Sitemap Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol last clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

								</header> <!-- end article header -->

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <!-- end article section -->

							</article> <!-- end article -->

							<?php endwhile; endif; ?>
							
							<?php get_template_part( 'loop', 'sitemap' ); ?>

						</div> <!-- end #main -->

						<div id="sidebar" class="sidebar fourcol first clearfix" role="complementary">

						<?php get_template_part( 'loop', 'contentboxes' ); ?>

						</div> <!-- end #sidebar -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
