<?php
/**
 * Add theme page
 */
function gutenify_capital_menu() {
	add_theme_page( esc_html__( 'Gutenify Capital', 'gutenify-capital' ), esc_html__( 'Gutenify Theme', 'gutenify-capital' ), 'edit_theme_options', 'gutenify-capital-info', 'gutenify_capital_theme_page_display' );
}
add_action( 'admin_menu', 'gutenify_capital_menu' );

/**
 * Display About page
 */
function gutenify_capital_theme_page_display() {
	$theme = wp_get_theme();

	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	}

	include_once 'templates/theme-info.php';
}

function gutenify_capital_admin_plugin_notice() {
	$hide_notice_bar = get_user_meta( get_current_user_id(), 'gutenify_capital_hide_theme_info_noticebar', true );
	if ( '1' !== $hide_notice_bar ) {
		wp_enqueue_style( 'gutenify-capital-admin-style' );
		wp_enqueue_script( 'gutenify-capital-admin' );
		include 'templates/admin-plugin-notice.php';
	}
}
add_action( 'admin_notices', 'gutenify_capital_admin_plugin_notice' );


function gutenify_capital_hide_theme_info_noticebar() {
	check_ajax_referer( 'gutenify_capital-nonce', 'gutenify_capital-nonce-name' );
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( -1 );
	}

	update_user_meta( get_current_user_id(), 'gutenify_capital_hide_theme_info_noticebar', 1 );

	wp_die( 1 );
}
add_action( 'wp_ajax_gutenify_capital_hide_theme_info_noticebar', 'gutenify_capital_hide_theme_info_noticebar' );
