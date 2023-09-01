<?php

/**
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://usmle-xl.com
 * @since             1.0.0
 * @package           Usmle-XL
 *
 * @wordpress-plugin
 * Plugin Name: Usmle-XL
 * Description: Plugin to Usmle-XL question / answers.
 * Author: Usmle-XL
 * Author URI: https://usmle-xl.com
 * Version: 1.0
 * Plugin URI: https://www.usmle-xl.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_usmle_xl() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-usmle-xl-activator.php';
	Usmle_XL_Activator::activate();
	Usmle_XL_Activator::usmle_xl_dashboard_install();
	Usmle_XL_Activator::create_page('Dashboard','[usmle_xl_dashboard]');
	Usmle_XL_Activator::create_page('CreateTest','[usmle_xl_create_test]');
	Usmle_XL_Activator::create_page('TestHistory','[usmle_xl_test_history]');
	Usmle_XL_Activator::create_page('ViewTest','[usmle_xl_view_test]');
	Usmle_XL_Activator::create_page('MyProfile','[woocommerce_my_account]');
	Usmle_XL_Activator::create_page('Analytics','[usmle_xl_analytics]');
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_usmle_xl() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-usmle-xl-deactivator.php';
	Usmle_XL_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_usmle_xl' );
register_deactivation_hook( __FILE__, 'deactivate_usmle_xl' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-usmle-xl.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_usmle_xl() {

	$plugin = new Usmle_XL();
	$plugin->run();

}
run_usmle_xl();
