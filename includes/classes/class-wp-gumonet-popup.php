<?php

class WP_GUMONET_POPUP {

	public function __construct() {
		//add_action( $this, 'init' );
		add_action( 'admin_menu', array( $this, 'wpgm_add_options_submenus' ) );
		//create table on database
		//empty tables on databases
		// Save settings
		add_action( 'admin_init', array( $this, 'wpgm_save_settings' ) );
	}

	public function wpgm_save_settings() {
		$nonce = filter_input( INPUT_POST, 'wpgm_nounce', FILTER_SANITIZE_STRING );
		if ( wp_verify_nonce( $nonce, 'mindsize_nr_settings' ) ) {
			echo '<h1>Si se guarda</h1>';
		}
	}

	public function wpgm_add_options_submenus() {
		add_menu_page(
			'Pop Up Configuración',
			'WGM Popup',
			'manage_options',
			'wgm-popup',
			array( $this, 'wpgm_show_admin_view' ),
			'dashicons-editor-expand',
			'3',
		);
	}

	public function wpgm_show_admin_view() {
		echo wpgm_view( WPGM_PLUGIN_PATH . 'admin/views/wp-gumonet-popup.php' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
