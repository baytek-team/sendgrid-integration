<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
Plugin Name: Baytek SendGrid Integration
Description: Use SendGrid for all system emails.
Version: 1.0.0
Author: Baytek
Author URI: http://www.baytek.ca
Text Domain: baytek-dispatch-lattice
Domain Path: /resources/assets/languages/

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

use BaytekDispatchLattice\Plugin;

/**
 * Init plugin
 */
function baytek_dispatch_lattice_init() {
	$plugin = Plugin::getInstance();
	$plugin->setPaths( __FILE__ );
	$plugin->run();
}
add_action( 'plugins_loaded', 'baytek_dispatch_lattice_init' );
