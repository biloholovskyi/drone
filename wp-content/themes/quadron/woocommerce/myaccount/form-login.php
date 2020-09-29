<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 *
 * Edited by NineTheme
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
					<div class="" id="customer_login">
				<?php endif; ?>

					<h2><?php esc_html_e( 'Login', 'quadron' ); ?></h2>

					<form class="form-default woocommerce-form woocommerce-form-login login" method="post">

						<?php do_action( 'woocommerce_login_form_start' ); ?>

						<div class="form-group">
							<label class="placeholder-labelll" for="username"><?php esc_html_e( 'Username or email address', 'quadron' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="text" class="form-control" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
						</div>
						<div class="form-group">
							<label class="placeholder-labell" for="password"><?php esc_html_e( 'Password', 'quadron' ); ?>&nbsp;<span class="required">*</span></label>
							<input class="form-control" type="password" name="password" id="password" autocomplete="current-password" />
						</div>

						<?php do_action( 'woocommerce_login_form' ); ?>

						<div class="form-group">
							<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
								<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'quadron' ); ?></span>
							</label>
						</div>
						<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
						<button type="submit" class="btn" name="login" value="<?php esc_attr_e( 'Log in', 'quadron' ); ?>"><?php esc_html_e( 'Log in', 'quadron' ); ?></button>
						
						<p class="woocommerce-LostPassword lost_password mb-0">
							<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'quadron' ); ?></a>
						</p>

						<?php do_action( 'woocommerce_login_form_end' ); ?>

					</form>

				<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>


					<h2><?php esc_html_e( 'Register', 'quadron' ); ?></h2>

					<form method="post" class="form-default woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

						<?php do_action( 'woocommerce_register_form_start' ); ?>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

							<div class="form-group">
								<label class="placeholder-labell" for="reg_username"><?php esc_html_e( 'Username', 'quadron' ); ?>&nbsp;<span class="required">*</span></label>
								<input type="text" class="form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
							</div>

						<?php endif; ?>

						<div class="form-group">
							<label class="placeholder-labell" for="reg_email"><?php esc_html_e( 'Email address', 'quadron' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="email" class="form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
						</div>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

							<div class="form-group">
								<label class="placeholder-labell" for="reg_password"><?php esc_html_e( 'Password', 'quadron' ); ?>&nbsp;<span class="required">*</span></label>
								<input type="password" class="form-control" name="password" id="reg_password" autocomplete="new-password" />
							</div>

						<?php else : ?>

							<p><?php esc_html_e( 'A password will be sent to your email address.', 'quadron' ); ?></p>

						<?php endif; ?>

						<?php do_action( 'woocommerce_register_form' ); ?>

						<p class="woocommerce-FormRow form-row">
							<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
							<button type="submit" class="woocommerce-Button woocommerce-button btn woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'quadron' ); ?>"><?php esc_html_e( 'Register', 'quadron' ); ?></button>
						</p>

						<?php do_action( 'woocommerce_register_form_end' ); ?>

					</form>

					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
