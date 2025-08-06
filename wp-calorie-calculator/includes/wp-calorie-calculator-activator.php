<?php

/**
 * Fired during plugin activation
 *
 * @link       https://belovdigital.agency
 * @since      1.0.0
 *
 * @package    WP_Calorie_Calculator
 * @subpackage WP_Calorie_Calculator/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    WP_Calorie_Calculator
 * @subpackage WP_Calorie_Calculator/includes
 */
class WP_Calorie_Calculator_Activator {

	/**
	 * Main activation method
	 *
	 * @since    1.0.0
	 * @version  2.0.0
	 */
	public static function activate() {
		// Include the plugin functions file if not already loaded.
		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		// Possible paths for the pro version.
		$pro_plugin_paths = array(
			'wp-calorie-calculator-pro/wp-calorie-calculator-pro.php',
			'calorie-calculator-pro/wp-calorie-calculator-pro.php',
		);

		foreach ( $pro_plugin_paths as $pro_plugin_path ) {
			if ( is_plugin_active( $pro_plugin_path ) ) {
				deactivate_plugins( $pro_plugin_path );
				break;
			}
		}

		set_transient( 'wp_calorie_calculator_activation_notice', true, 5 );
	}

}
