<?php

namespace BaytekDispatchLattice\System;

use BaytekDispatchLattice\Plugin;
use BaytekDispatchLattice\ViewHandler;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Handles capabilities of the site
 */

class Settings extends System {

	/**
	 * Options to save
	 */
	protected $options = [
		'api-key',
		'from-email',
		'from-name'
	];

	/**
	 * Add the plugin's actions and filters for existing content
	 */
	public function addHooks() {
		//Add the admin setting page
		add_action( 'admin_menu', [$this, 'settingsPageMenu'] );

		//Init the setting
		add_action( 'admin_init', [$this, 'settings'] );

		//Listen for the settings saving
		add_action( 'admin_notices', [$this, 'adminNotices'] );

		//Filter the email from/name
		add_filter('wp_mail_from', [$this, 'filterMailFrom']);
		add_filter('wp_mail_from_name', [$this, 'filterMailFromName']);
	}

	/**
	 * Output the menu item for the plugin settings page
	 */
	public function settingsPageMenu() {
		//Add the main generator page
		add_menu_page(
			'SendGrid Settings',
			'SendGrid',
			'edit_posts',
			'sendgrid-settings',
			[
				$this,
				'settingsPage'
			],
			'dashicons-email-alt',
			59
		);
	}

	/**
	 * Output the settings page
	 */
	public function settingsPage() {
		//Include the template
		ViewHandler::render( ViewHandler::getView( 'settings-page.php', 'admin' ));
	}

	/**
	 * Create the settings
	 */
	public function settings() {
		//Register normal settings
		foreach ($this->options as $option) :
			register_setting( 'sendgrid', 'sendgrid-'.$option );
		endforeach;
	}

	/**
	 * Output admin notice for settings saving
	 */
	public function adminNotices() {
		//Make sure we're in the right place and the settings were updated
		if (isset($_GET['settings-updated']) && isset($_GET['page']) && $_GET['page'] == 'sendgrid-settings') {

			//Print the notice
			printf(
				'<div class="%s"><p>%s</p></div>',
				'notice notice-success is-dismissible',
				__('Settings saved.', Plugin::TEXTDOMAIN)
			);
		}
	}

	/**
	 * Filter the mail from address
	 *
	 * @param  string  $from  The from address
	 *
	 * @return string  $from  The updated address
	 */
	public function filterMailFrom($form) {
		//Get the option
		$email = trim((string) get_option('sendgrid-from-email'));

		//Basic validation
		//Not sure I want filter_var here, since it can exclude some valid emails
		if (strlen($email)) {
			$from = $email;
		}

		return $from;
	}

	/**
	 * Filter the mail from name
	 *
	 * @param  string  $from  The from name
	 *
	 * @return string  $from  The updated name
	 */
	public function filterMailFromName($form) {
		//Get the option
		$name = trim((string) get_option('sendgrid-from-name'));

		//Basic validation
		if (strlen($name)) {
			$from = $name;
		}

		return $from;
	}
}
