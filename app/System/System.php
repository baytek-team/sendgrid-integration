<?php

namespace Baytek\Wordpress\SendGrid\System;

use Baytek\Wordpress\SendGrid\Plugin;
use Baytek\Wordpress\SendGrid\ViewHandler;

use WP_Query;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Handles localization of the plugin
 */
abstract class System {

	/**
	 * Main plugin instance
	 */
	protected $plugin;

	/**
	 * Create the System object, setting the main plugin
	 * instance and calling the addHooks() method
	 *
	 * @param  Baytek\Wordpress\SendGrid\Plugin  $instance
	 */
	public function __construct( $instance ) {
		$this->plugin = $instance;
		$this->addHooks();
	}
}
