<?php

    /*
    ** WooCommerce product page
    */

	get_header();

	do_action("quadron_before_woo_single");

?>

<!-- WooCommerce product page container -->
<div id="nt-woo-single" class="nt-woo-single">

	<div class="section__indent-16 section--bg-wrapper-03">
		<!-- start section -->
		<div class="section section__indent-03">
			<div class="container">
				<div class="row">
                    <div class="col-md-12">
                        <?php
                            if ( woocommerce_product_loop() ) {
                                woocommerce_output_all_notices();
                            }
                        ?>
                    </div>
					<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-md-6">
					    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'nt-single-thumbs', $product ); ?>>
                        	<?php
                        	/**
                        	 * Hook: woocommerce_before_single_product_summary.
                        	 *
                        	 * @hooked woocommerce_show_product_sale_flash - 10
                        	 * @hooked woocommerce_show_product_images - 20
                        	 */
                        	do_action( 'woocommerce_before_single_product_summary' );
                        	?>
                    	</div>
					</div>
					<div class="divider divider__lg d-block d-md-none d-lg-none d-xl-none"></div>
					<div class="col-md-6">
						<div class="product-single">
							<h1 class="product-single__title"><?php the_title(); ?></h1>

							<div class="product-single__price">

                                <?php if ( ! empty( $product->get_sale_price() ) ) { ?>

								<span class="old-price"><?php echo esc_html(get_woocommerce_currency_symbol()); ?> <?php echo esc_html($product->get_regular_price()); ?></span>
                                <?php if ( ! empty( $product->get_sale_price() ) ) { ?>
								<span class="new-price"><?php echo esc_html(get_woocommerce_currency_symbol()); ?> <?php echo esc_html($product->get_sale_price()); ?></span>
                                <?php } ?>

                                <?php } else { ?>

                                <?php if ( ! empty( $product->get_regular_price() ) ) { ?>
								<span class="new-price"><?php echo esc_html(get_woocommerce_currency_symbol()); ?> <?php echo esc_html($product->get_regular_price()); ?></span>
                                <?php } ?>

                                <?php } ?>

							</div>

                            <?php if ( ! empty( wc_get_stock_html($product) ) ) { ?>
							<div class="product-single__info">
								<?php echo esc_html_e( 'Availability', 'quadron' ); ?>: <span class="stock"><?php echo wc_get_stock_html( $product ); ?></span>
							</div>
                            <?php } ?>

							<hr>
							<p><?php woocommerce_template_single_excerpt(); ?></p>

						    <?php if ( wc_get_product_category_list(get_the_id()) ) { ?>
							<div class="product-single__section">
								<div class="box-info">
									<div class="box-info__title"><?php echo esc_html_e( 'Category', 'quadron' ); ?></div>
									<div class="box-info__description">
										<ul class="category-list">
										    <?php echo wc_get_product_category_list( get_the_id(), '</li><li>', '<li>',  '</li>' ); ?>
										</ul>
									</div>
								</div>
							</div>
							<?php } ?>
						    <?php
                                $terms = get_terms( 'product_tag' );
                                $term_array = array();
                                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                            ?>
							<div class="product-single__section">
								<div class="box-info">
									<div class="box-info__title title-tags"><?php echo esc_html_e( 'Tags', 'quadron' ); ?></div>
									<div class="box-info__description">
										<div class="tags-list">
										    <?php
                                                foreach ( $terms as $term ) {
                                                    $term_array[] = '<span class="list-icon__title">'.$term->name.'</span>';
                                                }
										        echo implode( ', ',  $term_array );
										    ?>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>

							<div class="product-single__section">
								<div class="box-info">
									<div class="box-info__title"><?php echo esc_html_e( 'Ratings', 'quadron' ); ?></div>
									<div class="box-info__description">
										<div class="rating">
										    <?php if(($product->get_rating_count()) > 0 ) : ?>
											    <?php wc_get_template( 'single-product/rating.php' ); ?>
											<?php else : ?>
                                                <div class="woocommerce-product-rating">
                                                    <div class="star-rating" role="img" aria-label="Rated 4.33 out of 5">
                                                        <span style="width:0%">Rated <strong class="rating">4.33</strong></span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="product-single__section">
								<div class="box-info">
									<div class="box-info__title"><?php echo esc_html_e( 'Quantity', 'quadron' ); ?></div>
									<div class="extra-wrapper">
										<?php wc_get_template( 'single-product/add-to-cart/simple.php' ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; // end of the loop. ?>

			</div>
		</div>

		<div class="section section-default-inner section--bg-00">
			<div class="container">
				<div class="nav-tabs-dafault">
					<?php while ( have_posts() ) : the_post(); ?>
					<?php wc_get_template( 'single-product/tabs/tabs.php' ); ?>
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>
		</div>

		<div class="section section__indent-03 pb-0">
			<div class="container">
				<div class="section-heading section-heading_indentg04">
					<h4 class="title"><?php echo quadron_settings( 'single_shop_related_title', 'Similar products' ); ?></h4>
				</div>
				<div class="js-carousel-products carousel-products slick-arrow-center">
					<?php
						$quadron_related_taxonomy_terms = wp_get_object_terms( $post->ID, 'product_cat', array('fields' => 'ids') );
						$quadron_related_args = array(
							'post_type' => 'product',
							'post_status' => 'publish',
							'posts_per_page' => quadron_settings( 'single_shop_related_count', '5' ),
							'orderby' => 'rand',
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'id',
									'terms' => $quadron_related_taxonomy_terms
								)
							),
							'post__not_in' => array ($post->ID),
						);
						$quadron_related_posts = new WP_Query( $quadron_related_args );
						if($quadron_related_posts->have_posts()){

							while($quadron_related_posts->have_posts()){
								$quadron_related_posts->the_post();
								//global $product;
								$image_large = wp_get_attachment_url( get_post_thumbnail_id(), 'full' );
								?>
								<div class="item">
									<div class="product nomove-hover">
										<div class="product__img"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_large); ?>" ></a></div>
										<div class="product__description">
                                             <?php if( $product->get_regular_price() ) : ?>
											<div class="product__price">
												<?php echo quadron_settings( 'single_shop_related_before_price_text', 'From' ); ?> <span><?php echo esc_html(get_woocommerce_currency_symbol()); ?><?php echo esc_html($product->get_regular_price()); ?></span>
											</div>
                                            <?php endif; ?>
											<h3 class="product__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										</div>
										<div class="product__btn">
											<?php woocommerce_template_loop_add_to_cart();?>
										</div>
									</div>
								</div>
								<?php
							}
						}
						wp_reset_postdata();
						?>
				</div>
			</div>
		</div>
	</div>

</div>

<?php
	do_action("quadron_after_woo_single");
	get_footer();
?>
