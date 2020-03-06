<?php

//Template for the admin page

use Baytek\Wordpress\SendGrid\Plugin;

?>

<div class="wrap">
	<h1><?php _e( 'SendGrid Settings', Plugin::TEXTDOMAIN ); ?></h1>

	<form method="post" action="options.php" id="sendgrid-settings">

		<?php settings_fields( 'sendgrid' ); ?>
    	<?php do_settings_sections( 'sendgrid' ); ?>

		<h2><?php _e('General', Plugin::TEXTDOMAIN); ?></h2>
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="sendgrid-api-key"><?php _e('API Key*', Plugin::TEXTDOMAIN); ?></label>
				</th>
				<td>
					<input type="text" id="sendgrid-api-key" name="sendgrid-api-key" value="<?php echo esc_attr( get_option( 'sendgrid-api-key' ) ); ?>" class="regular-text code" required="required">
				</td>
			</tr>
		</table>

		<h2><?php _e('Email Settings', Plugin::TEXTDOMAIN); ?></h2>
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="sendgrid-from-email"><?php _e('From Email*', Plugin::TEXTDOMAIN); ?></label>
				</th>
				<td>
					<input type="email" placeholder="<?php _e('email@example.com', Plugin::TEXTDOMAIN); ?>" id="sendgrid-from-email" name="sendgrid-from-email" value="<?php echo esc_attr( get_option( 'sendgrid-from-email' ) ); ?>" class="regular-text" required="required">
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="sendgrid-from-name"><?php _e('From Name*', Plugin::TEXTDOMAIN); ?></label>
				</th>
				<td>
					<input type="text" placeholder="John Doe" id="sendgrid-from-name" name="sendgrid-from-name" value="<?php echo esc_attr( get_option( 'sendgrid-from-name' ) ); ?>" class="regular-text" required="required">
				</td>
			</tr>
		</table>

		<p><?php _e('* required fields', Plugin::TEXTDOMAIN); ?></p>

		<?php submit_button(); ?>
	</form>

</div>
