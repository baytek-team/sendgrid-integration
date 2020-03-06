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
	const TEXTDOMAIN = 'baytek-sendgrid-integration';
	const VERSION = '1.0.3';

	/**
	 * Plugin properties
	 */
	protected static $apiKey;

	/**
	 * GitHub properties
	 */
	protected $gh_repo = 'sendgrid-integration';
	protected $plugin_folder = 'baytek-sendgrid-integration';

	/**
	 * Set the plugin paths
	 *
	 * @param  string  $plugin_path  The path to the main plugin file
	 */
	public function setPaths( $plugin_path ) {

		// Set default paths and URLs in parent
		parent::setPaths( $plugin_path );

		// Set the theme override directory
		$this->paths['theme-override'] = '/baytek/sendgrid-integration';
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
		load_plugin_textdomain( self::TEXTDOMAIN, false, 'resources/assets/languages/' );
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
