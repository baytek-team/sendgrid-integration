<?php

namespace Baytek\Wordpress\SendGrid;

use Baytek\Wordpress\SendGrid\System\Settings;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 */

class Plugin extends BasePlugin {

	/**
	 * Plugin constants
	 */
	const TEXTDOMAIN = 'baytek-dispatch-lattice';
	const VERSION = '1.0.1';

	/**
	 * Plugin properties
	 */
	protected static $apiKey;

	/**
	 * Set the plugin paths
	 *
	 * @param  string  $plugin_path  The path to the main plugin file
	 */
	public function setPaths( $plugin_path ) {

		// Set default paths and URLs in parent
		parent::setPaths( $plugin_path );

		// Set the theme override directory
		$this->paths['theme-override'] = '/baytek/baytek-dispatch-lattice';
	}

	/**
	 * Run the plugin's default tasks
	 */
	public function run() {
		// Set the API Key from saved options
		$this->setApiKey();

		// Init admin pages
		new Settings( static::$instance );

		// Load textdomain
		load_plugin_textdomain( self::TEXTDOMAIN, false, 'baytek-dispatch-lattice/resources/assets/languages/' );
	}

	/**
	 * Set the SendGrid API Key
	 */
	protected function setApiKey() {
		self::$apiKey = get_option('sendgrid-api-key');
	}

	/**
	 * Get the API Key
	 */
	public static function getApiKey() {
		return self::$apiKey;
	}
}
