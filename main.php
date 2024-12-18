<?php

/*
Plugin Name: Baytek SendGrid Integration
Plugin URI: https://github.com/baytek-team/sendgrid-integration
Description: Use SendGrid for all system emails.
Version: 1.1.2
Author: Baytek
Author URI: https://www.baytek.ca
Text Domain: baytek-sendgrid-integration
Domain Path: /resources/assets/languages/
GitHub Plugin URI: https://github.com/baytek-team/sendgrid-integration
GitHub Branch: main

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

use Baytek\Wordpress\SendGrid\Plugin;

/**
 * Init plugin
 */
function baytek_sendgrid_integration_init() {
	$plugin = Plugin::getInstance();
	$plugin->setPaths( __FILE__ );
	$plugin->run();
}
add_action( 'init', 'baytek_sendgrid_integration_init' );

function baytek_sendgrid_integration_autoupdate() {
	$plugin = Plugin::getInstance();
	$plugin->autoupdate( __FILE__ );
}
add_action( 'init', 'baytek_sendgrid_integration_autoupdate' );