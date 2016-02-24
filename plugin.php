<?php
/**
 * Plugin Name:       TEC Addon: Resolve 4.0.6 template conflicts
 * Plugin URI:        https://github.com/bordoni/tec-forum-support/tree/plugin-ticket-44253
 * Description:       The Events Calendar Addon
 * Version:           0.1.0
 * Author:            Modern Tribe Inc.
 * Author URI:        http://theeventscalendar.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ){
	die;
}

class TEC_Ticket_44253 {

	public static $ID = 44253;

	public static $_instance = null;

	public function __construct() {
		// Check if TEC is active and if the version is 4.0.6
		if ( ! class_exists( 'Tribe__Events__Main' ) || ! version_compare( Tribe__Events__Main::VERSION, '4.0.6', '=' ) ) {
			return;
		}

		add_action( 'template_include', array( $this, 'maybe_redefine_include' ), 5 );
	}

	public static function instance() {
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function maybe_redefine_include() {
		// Vefify the same things TEC does to ensure safety
		if ( tribe_get_option( 'tribeEventsTemplate', 'default' ) != '' ) {
			if ( ! is_single() || ! post_password_required() ) {
				add_action( 'loop_start', array( $this, 'redefine_priority' ), 15 );
			}
		}
	}

	public function redefine_priority( $query ) {
		// Check for the sames things TEC does
		if ( $query->is_main_query() && Tribe__Events__Templates::$wpHeadComplete ) {
			// Re-define the Priorities
			remove_filter( 'the_content', array( 'Tribe__Events__Templates', 'load_ecp_into_page_template' ), 9 );
			add_filter( 'the_content', array( 'Tribe__Events__Templates', 'load_ecp_into_page_template' ) );
		}
	}
}
add_action( 'plugins_loaded', array( 'TEC_Ticket_44253', 'instance' ), 15 );