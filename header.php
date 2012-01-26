<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>BuddyStrap</title>

		<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('stylesheet_url'); ?>">

		<?php 
		wp_enqueue_script("jquery");
		//call Wordpress' header action hook
		wp_head();
		?>

	</head>

	<body>

		<!-- top bar - displays personal menu -->
		<!-- 
		<div class="topbar">
			<div class="fill">
				<div class="container">
					<a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
					<ul class="nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#contact">Contact</a></li>
						<?php //do_action( 'bp_adminbar_menus' ); ?>
					</ul>
				</div>
			</div>
		</div>
		--> 
		<!-- /topbar -->

		<!-- container - wraps content to align in center of page
		     also provides grid structure -->
		<div class="container">

			<!-- Hero unit, displayed at top of page -->
			<div class="hero-unit">
				<h1><?php bloginfo('name'); ?></h1>
				<p><?php bloginfo('description'); ?></p>
			</div> <!-- /herounit -->


			<div class="row">
			<div class="span16">
				<?php wp_nav_menu( array(
					'container' => false,
					'menu_class' => 'pills pull-right',
					'fallback_cb' => 'buddystrap_theme_main_nav',
					//'items_wrap' => '<ul id="%1$s" class="%2$s pills">%3$s</ul>',
					'theme_location' => 'primary'
				) ); ?>
			</div>
			</div>
			

		<!-- container div closed in footer.php -->