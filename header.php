<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?php the_field('apple_icon', 'option'); ?>">
		<link rel="icon" href="<?php the_field('favicon_png', 'option'); ?>">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php the_field('favicon_ico', 'option'); ?>">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php the_field('windows_icon', 'option'); ?>">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- Font Awesome -->
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">

					<div id="top-numbers">
						<?php the_field('header_text', 'option'); ?>
					</div>

					<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
					<p id="logo"><a href="/" rel="nofollow"><img src="<?php the_field('site_logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>"></a></p>

					<button class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="title">MAIN MENU</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		            </button>
		           
		            		
					<div class="globalnav nav-collapse collapse clearfix">
						<?php bones_main_nav(); ?>
					</div>

				</div> <!-- end #inner-header -->
				
				<?php if (is_front_page()) { ?>
				
				<div id="banner">
				
					<div id="inner-banner" class="cycle-slideshow" data-cycle-slides="> span">
					
					<?php /* Start home_banners */ ?>
					<?php if(get_field('home_banners')): ?>
					<?php while(has_sub_field('home_banners')): ?>
					
				
					<?php
						 					 
				        $external_link = get_sub_field('banner_external_url'); 
				        $internal_link = get_sub_field('banner_internal_link');
				        
				        if ($external_link!="") { $banner_url = $external_link; }
				        if ($internal_link!=null) { $banner_url = $internal_link; }						
						 
						?>

			            	<span><?php if ($banner_url!="") { ?><a href="<?php echo $banner_url; ?>"<?php if($banner_url==$external_link) { echo ' target="_blank"'; } ?>><?php } ?><img src="<?php the_sub_field('banner_image'); ?>" alt="<?php the_sub_field('banner_alt'); ?>"><?php if ($banner_url!="") { echo '</a>'; } ?></span>
			            		 
						
			        <?php endwhile; ?>
			        <?php endif; /* End home_banners */ ?>
			       	        
										
					</div><!-- inner banner -->		
				
				</div><!-- banner -->

				<?php } else { // not the "Front" page ?>

				<?php 

				if ( is_home() || is_archive() || is_single()) { 
					$posts_id = get_option('page_for_posts'); // getting the ID of the "Posts" page on Settings-->Reading
				} else {
					$posts_id = get_the_ID(); // otherwise, its just the current page ID
				}

				if (get_field('page_banner', $posts_id)!="") { ?>
				
				<div id="banner">
				
					<div id="inner-banner">
				
						<img src="<?php the_field('page_banner', $posts_id); ?>">
				
					</div><!-- inner banner -->		
				
				</div><!-- banner -->	

				<?php } // end 'page_banner' field check ?>			
				
				<?php } // end is_home(), etc. ELSE ?>

			</header> <!-- end header -->
