<?php
/* 
 * Functions file for BuddyStrap
 */
// define( 'BP_DISABLE_ADMIN_BAR', true );
require_once "adminbar.php";

function bacon($input) {
	return "bacon";
}

function buddystrap_register_menus() {
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu' ),
			'adminbar_primary' => __( 'Adminbar Primary Menu' ),
			'adminbar_secondary' => __( 'Adminbar Secondary Menu' )
		)
	);
}
add_action( 'init', 'buddystrap_register_menus' );

function buddystrap_append_javascript() { ?>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/js/bootstrap-alerts.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/js/bootstrap-buttons.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/js/bootstrap-dropdown.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/js/bootstrap-modal.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/js/bootstrap-scrollspy.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/js/bootstrap-tabs.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/js/bootstrap-twipsy.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/js/bootstrap-popover.js"></script>
<?php
}
add_action( "wp_footer", "buddystrap_append_javascript" );

function buddystrap_add_html5shiv() { ?>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php
}
add_action("wp_head", "buddystrap_add_html5shiv");

function buddystrap_theme_filter_current_menu_item($item) {
	return str_replace("current_page_item", "active", $item);
}
add_filter('wp_page_menu', 'buddystrap_theme_filter_current_menu_item');

function buddystrap_theme_main_nav( $args ) {

	$pages_args = array(
		'depth'      => 0,
		'echo'       => false,
		'exclude'    => '',
		'title_li'   => ''
	);
	$menu = wp_page_menu( $pages_args );
	$menu = str_replace( array( '<div class="menu"><ul>', '</ul></div>' ), array( '<ul class="pills pull-right">', '</ul><!-- #nav -->' ), $menu );
	echo $menu;

	do_action( 'bp_nav_items' );
}