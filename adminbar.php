<?php

/*
 * BuddyStrap Admin Bar
 */

/**
 * Remove the BuddyPress default and replace it with one skinned
 * to fit in with bootstrap
 * A better way of doing this would be to use filters to modify the 
 * html of the BuddyBar, but they dont exist.
 */
function buddystrap_remove_bp_adminbar() {
	remove_action('wp_footer', 'bp_core_admin_bar', 8);
}
add_action('wp_footer', 'buddystrap_remove_bp_adminbar', 1);


remove_action( 'bp_init', 'bp_core_load_buddybar_css' );

function buddystrap_adminbar() { ?>
     	<div class="topbar" data-dropdown="dropdown">
     		<div class="fill">
     			<div class="container">
     				<?php do_action( 'buddystrap_adminbar_logo' ); ?>
     				<ul class="nav">
     					<?php do_action( 'buddystrap_adminbar_primary_menus' ); ?>
     				</ul>

     				<?php wp_nav_menu( array(
     					'theme_location' => 'adminbar_primary',
     					'container' => false,
     					'menu_class' => 'nav',
     					'fallback_cb' => 'buddystrap_theme_main_nav'
     				) ); ?>

     				<?php do_action( 'buddystrap_adminbar_after_primary_menus' ); ?>
     				<ul class="nav secondary-nav">
     					<?php do_action( 'buddystrap_adminbar_secondary_menus' ); ?>
     				</ul>
     			</div>
     		</div>
     	</div>
<?php		
}

function buddystrap_adminbar_logo() {
	echo '<a href="' . bp_get_root_domain() . '" class="brand">' . get_blog_option( bp_get_root_blog_id(), 'blogname' ) . '</a>';
}

function buddystrap_adminbar_search() {
	
}

function buddystrap_adminbar_random_menu() { ?>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle"><?php _e( 'Visit', 'buddypress' ) ?></a>
		<ul class="dropdown-menu">
			<li><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_members_root_slug() ) . '?random-member' ?>" rel="nofollow"><?php _e( 'Random Member', 'buddypress' ) ?></a></li>

			<?php if ( bp_is_active( 'groups' ) ) : ?>

				<li class="alt"><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_groups_root_slug() ) . '?random-group' ?>"  rel="nofollow"><?php _e( 'Random Group', 'buddypress' ) ?></a></li>

			<?php endif; ?>

			<?php if ( is_multisite() && bp_is_active( 'blogs' ) ) : ?>

				<li><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_blogs_root_slug() ) . '?random-blog' ?>"  rel="nofollow"><?php _e( 'Random Site', 'buddypress' ) ?></a></li>

			<?php endif; ?>

			<?php do_action( 'bp_adminbar_random_menu' ) ?>
		</ul>
	</li>
<?php
}

function buddystrap_adminbar_thisblog_menu() {
		
}

function buddystrap_adminbar_account_menu() {
	
}

function buddystrap_adminbar_login_menu() {
	if(is_user_logged_in()) {
		return false;
	}
	echo "<li><a href=\"". bp_get_root_domain() . '/wp-login.php?redirect_to=' . urlencode( bp_get_root_domain() ) ."\">".__( 'Log In', 'buddypress' )."</a></li>";

	if( bp_get_signup_allowed() ) {
		echo '<li><a href="' . bp_get_signup_page(false) . '">' . __( 'Sign Up', 'buddypress' ) . '</a></li>';
	}
}

add_action('wp_footer', 'buddystrap_adminbar', 8);
add_action('buddystrap_adminbar_logo', 'buddystrap_adminbar_logo');
add_action('buddystrap_adminbar_primary_menus', 'buddystrap_adminbar_login_menu');
add_action('buddystrap_adminbar_secondary_menus', 'buddystrap_adminbar_random_menu');