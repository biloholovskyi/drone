<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 *
 * Edited by NineTheme
 *
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="section--bg-wrapper-15 vh-178 nt-cart-empty d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="section-heading section-heading_indentg04">
                    <h1 class="title"><?php the_title(); ?></h1>
                </div>
                <div class="nt-cart-empty-info">
                    <i class="fa fa-info-circle nt-info-icon" aria-hidden="true"></i>
                    <?php 
                    /*
                     * @hooked wc_empty_cart_message - 10
                     */
                    do_action( 'woocommerce_cart_is_empty' );  
                    ?>
                </div>
                <?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
                    <p class="return-to-shop mt-30">
                        <a class="btn wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                            <?php esc_html_e( 'Return to shop', 'quadron' ); ?>
                        </a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>