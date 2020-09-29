<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.0
 *
 * Edited by NineTheme
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
$count = 0;
?>
<div class="col-aside-wrapper">
	<div class="btn-asidecol-close"><i class="icon"><svg><use xlink:href="#remove"></use></svg></i></div>
	<div class="block-aside">
		<div class="block-aside__content">
			<nav class="menu-aside">
				<ul>
					<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
						<?php $active_nav_item = $count == 0 ? ' active' : ''; $count++; ?>
						<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?><?php echo esc_attr( $active_nav_item ); ?>">
							<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
