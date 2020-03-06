<?php

namespace Baytek\Wordpress\SendGrid;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Base plugin class to extend
 */

abstract class BasePlugin {

	/**
	 * Plugin instance
	 */
	protected static $instance = null;

	/**
	 * Plugin properties
	 */
	protected $paths = [];
	protected $urls = [];
	protected $postTypes = [];
	protected $metaBoxes = [];
	protected $taxonomies = [];
	protected $shortcodes = [];
	protected $system = [];

	/**
	 * GitHub properties
	 */
	protected $gh_username = 'baytek-team';
	protected $gh_repo = 'repo';
	protected $plugin_folder = 'plugin-folder';
	protected $wp_requires = '5.0';
	protected $wp_tested = '5.0';

	/**
	 * Prevent direct access to the constructor
	 */
	protected function __construct() {}

	/**
	 * Prevent direct access to cloning
	 */
	protected function __clone() {}

	/**
	 * Get the instance of this class
	 */
	public static function getInstance() {
		if ( !isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	/**
	 * Set the plugin paths
	 *
	 * @param  string  $plugin_path  The path to the main plugin file
	 */
	public function setPaths( $plugin_path ) {
		// Set all pertinent directory paths
		$this->paths['plugin'] = WP_PLUGIN_DIR . '/' . basename( dirname( $plugin_path ) );
		$this->paths['views'] = trailingslashit( $this->paths['plugin'] ) . 'resources/views';
		$this->paths['theme-override'] = '';

		// Set all pertinent URLs
		$this->urls['plugin'] = plugins_url() . '/' . basename( dirname( $plugin_path ) );
		$this->urls['assets'] = trailingslashit( $this->urls['plugin'] ) . 'resources/assets';

		// Configure auto-updates
		$this->autoupdate($plugin_path);
	}

	/**
	 * Configure the plugin's auto updates from its repo
	 *
	 * @param  string  $plugin_path  The path to the main plugin file
	 */
	protected function autoupdate($plugin_path) {

		if (!class_exists('WPGitHubUpdater') || !is_admin()) return;

		$config = [
			'slug' => plugin_basename($plugin_path), // this is the slug of your plugin
			'proper_folder_name' => $this->plugin_folder, // this is the name of the folder your plugin lives in
			'api_url' => sprintf('https://api.github.com/repos/%s/%s', $this->gh_username, $this->gh_repo), // the github API url of your github repo
			'raw_url' => sprintf('https://raw.github.com/%s/%s/master', $this->gh_username, $this->gh_repo), // the github raw url of your github repo
			'github_url' => sprintf('https://github.com/%s/%s', $this->gh_username, $this->gh_repo), // the github url of your github repo
			'zip_url' => sprintf('https://github.com/%s/%s/zipball/master', $this->gh_username, $this->gh_repo), // the zip url of the github repo
			'sslverify' => true // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
			'requires' => $this->wp_requires, // which version of WordPress does your plugin require?
			'tested' => $this->wp_tested, // which version of WordPress is your plugin tested up to?
			'readme' => 'README.md' // which file to use as the readme for the version number
		];

		new WPGitHubUpdater($config);
	}

	/**
	 * Get the plugin directory path
	 *
	 * @return string  The plugin directory
	 */
	public function getPluginDir() {

		return $this->paths['plugin'];
	}

	/**
	 * Get the plugin views directory path
	 *
	 * @return string  The view directory within the plugin
	 */
	public function getViewsDir() {

		return $this->paths['views'];
	}

	/**
	 * Get the theme override directory for plugin views
	 *
	 * @return string  The theme override directory (not full path)
	 */
	public function getThemeOverrideDir() {

		return $this->paths['theme-override'];
	}

	/**
	 * Get the plugin directory url
	 *
	 * @return string  The plugin URL
	 */
	public function getPluginUrl() {

		return $this->urls['plugin'];
	}

	/**
	 * Get the plugin assets directory url
	 *
	 * @return string  The assets URL within the plugin
	 */
	public function getAssetsUrl() {

		return $this->urls['assets'];
	}

	/**
	 * Abstract run function to be overwritten in each plugin.
	 * Responsible for governing primary plugin functionality
	 */
	abstract public function run();
}
