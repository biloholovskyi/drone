<?php

    /*
    ** WooCommerce shop/product listing page
    */

	get_header();

	do_action("quadron_before_woo_shop_page");

	$quadron_justify = (stripos(quadron_sidebar_control('shop_layout'), 'nt-no-sidebar') !== false) ? ' justify-content-center' : '';
    $layout  = quadron_settings( 'shop_layout', 'full-width' );
    $layout  = $layout != 'full-width' ? 'col-md-7 col-lg-8 nt-has-sidebar' : 'col-12 col-lg-12 nt-no-sidebar';

?>

<div id="nt-shop-page" class="section section__indent-16 section--bg-wrapper-03">

	<div class="section">
		<div class="container">
            <?php
                if ( woocommerce_product_loop() ) {
                	woocommerce_output_all_notices();
                }
            ?>

		    <div class="filters-options">
				<div class="filters-options__title">
                    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                        <?php woocommerce_page_title(); ?>
                    <?php endif; ?>
				</div>
				<div class="filters-options__value">
					<?php if( 'full-width' != quadron_settings( 'shop_layout' ) && is_active_sidebar( 'shop-page-sidebar' )) { ?>
					<div class="filters-options__mobile">
						<a class="filters-aside-btn" id="js-toggle-aside" href="#"><svg><use xlink:href="#filter"></use></svg></a>
					</div>
					<?php } ?>
					<div class="filters-options__sort">

                        <?php
                            if ( woocommerce_product_loop() ) {
                            	woocommerce_catalog_ordering();
                            }
                        ?>

				    </div>
			    </div>
		    </div>
			<div class="row<?php echo esc_attr($quadron_justify); ?>">
                <!-- left sidebar -->
                <?php if( 'left-sidebar' == quadron_settings( 'shop_layout', 'full-width' ) ) { ?>
                    <div id="nt-sidebar" class="nt-sidebarx col-md-5 col-lg-4 col-aside-right">
                		<div class="nt-sidebar-inner">
    						<?php
                            /**
                             * Hook: woocommerce_sidebar.
                             *
                             * @hooked woocommerce_get_sidebar - 10
                             */
                            dynamic_sidebar( 'shop-page-sidebar' );
    					    ?>
    					</div>
    				</div>
                <?php } ?>

				<div class="<?php echo esc_attr($layout); ?>">
                    <div class="catalog-listing row">
                        <?php
						woocommerce_product_loop_start();
                        if ( woocommerce_product_loop() ) {

                        	if ( wc_get_loop_prop( 'total' ) ) {
                        		while ( have_posts() ) {
                        			the_post();

                        			do_action( 'woocommerce_shop_loop' );

                        			wc_get_template_part( 'content', 'product' );

                        		}
                        	}
							woocommerce_product_loop_end();
                            echo '<div class="col-sm-12 col-item d-flex-justify-content-center align-items-center"><div class="shop-page-nav">';
                                quadron_index_loop_pagination();
    						 echo '</div></div>';

                        } else {
                        	/**
                        	 * Hook: woocommerce_no_products_found.
                        	 *
                        	 * @hooked wc_no_products_found - 10
                        	 */
                        	do_action( 'woocommerce_no_products_found' );
                        }
					?>
                    </div>
				</div>

                <!-- left sidebar -->
                <?php if( 'right-sidebar' == quadron_settings( 'shop_layout', 'full-width' ) ) { ?>
                    <div id="nt-sidebar" class="nt-sidebarx col-md-5 col-lg-4 col-aside-right">
                		<div class="nt-sidebar-inner">
    						<?php
                            /**
                             * Hook: woocommerce_sidebar.
                             *
                             * @hooked woocommerce_get_sidebar - 10
                             */
                            dynamic_sidebar( 'shop-page-sidebar' );
    					    ?>
    					</div>
    				</div>
                <?php } ?>

			</div>
		</div>
	</div>
	<!-- end section -->
</div>
<?php get_footer(); ?>
