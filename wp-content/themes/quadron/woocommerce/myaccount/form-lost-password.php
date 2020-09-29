<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 *
 * Edited by NineTheme
 *
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form method="post" class="form-default woocommerce-ResetPassword lost_reset_password">

					<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'quadron' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

					<div class="form-group">
						<label class="placeholder-label" for="user_login"><?php esc_html_e( 'Username or email', 'quadron' ); ?></label>
						<input class="form-control" type="text" name="user_login" id="user_login" autocomplete="username" />
					</p>

					<?php do_action( 'woocommerce_lostpassword_form' ); ?>

					<p class="woocommerce-form-row form-row">
						<input type="hidden" name="wc_reset_password" value="true" />
						<button type="submit" class="woocommerce-Button btn mt-30" value="<?php esc_attr_e( 'Reset password', 'quadron' ); ?>"><?php esc_html_e( 'Reset password', 'quadron' ); ?></button>
					</p>

					<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

				</form>
			</div>
		</div>
	</div>
</div>
<?php
do_action( 'woocommerce_after_lost_password_form' );
