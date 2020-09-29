<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Quadron
 * @since Quadron 1.0
 */

if (  is_active_sidebar( 'sidebar-1' )  ) :

	$nt_framework_sidebar_type = ( 'bordered' == quadron_settings( 'sidebar_type', 'default' ) ) ? ' nt-sidebar-type-2' : '';
	$nt_framework_sidebar_bg = ( '' != quadron_settings( 'sdbr_bg') || '' != quadron_settings( 'border') ) ? ' has-fill' : '';

?>

	<div id="nt-sidebar" class="nt-sidebar<?php echo esc_attr($nt_framework_sidebar_type.$nt_framework_sidebar_bg);?> col-md-5 col-lg-4 col-aside-right">
		<div class="nt-sidebar-inner">
			<?php

				if (class_exists( 'WooCommerce' ) && (is_shop() || is_product())) {
					if (is_shop()) {
						if (is_active_sidebar( 'shop-page-sidebar' )) {
							dynamic_sidebar( 'shop-page-sidebar' );
						} else {
							dynamic_sidebar( 'sidebar-1' );
						}
					} elseif (is_product()) {
						if (is_active_sidebar( 'shop-single-sidebar' )) {
							dynamic_sidebar( 'shop-single-sidebar' );
						} elseif (is_active_sidebar( 'shop-page-sidebar' )) {
							dynamic_sidebar( 'shop-page-sidebar' );
						} else {
							dynamic_sidebar( 'sidebar-1' );
						}
					}
				} else {
					dynamic_sidebar( 'sidebar-1' );
				}

			?>
		</div><!-- End nt-sidebar-inner -->
	</div><!-- End nt-sidebar -->

<?php endif; ?>
