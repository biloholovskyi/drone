<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( class_exists( 'WooCommerce' ) ) {


    function quadron_product_title(){
        echo '<h3 class="product__title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
    }
    function quadron_product_thumb(){
        echo '<div class="product__img"><a href="' . get_the_permalink() . '">' . woocommerce_get_product_thumbnail('full') . '</a></div>';
    }
    function quadron_product_btn(){
        ob_start();
        woocommerce_template_loop_add_to_cart();
        echo '<div class="product__btn">' . ob_get_clean() . '</div>';
    }
    function quadron_product_price_rating(){
        ob_start();
        woocommerce_template_loop_price();
        woocommerce_template_loop_rating();
        echo '<div class="product__price">' . ob_get_clean() . '</div>';
    }

    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open',10);
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close',5);
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart',10);
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10);
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open',10);
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating',5);
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price',10);
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail',10);
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash',10);
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper',10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end',10);
    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display',10);

    add_action( 'woocommerce_before_shop_loop_item_title', 'quadron_product_thumb',10);
    add_action( 'woocommerce_shop_loop_item_title', 'quadron_product_title',10);
    add_action( 'woocommerce_after_shop_loop_item', 'quadron_product_btn',10);
    add_action( 'woocommerce_after_shop_loop_item_title', 'quadron_product_price_rating',10);

if ( class_exists('Redux')) {
	if ( ! function_exists( 'quadron_dynamic_section' ) ) {
		function quadron_dynamic_section($sections)
		{

			global $quadron_pre;

			/*************************************************
			## SINGLE PAGE SECTION
			*************************************************/
			// create sections in the theme options
		   $sections[] = array(
			   'title' => esc_html__('Shop Page', 'quadron'),
			   'id' => 'shopsection',
			   'icon' => 'el el-shopping-cart-sign',
		   );
			// SHOP PAGE SECTION
			$sections[] = array(
				'title' => esc_html__( 'Shop Page Layout', 'quadron' ),
				'id' => 'shoplayoutsection',
				'subsection'=> true,
				'icon' => 'el el-website',
				'fields'	=> array(
					array(
						'title' => esc_html__( 'Shop Page Layout', 'quadron' ),
						'subtitle' => esc_html__( 'Choose the shop page layout.', 'quadron' ),
						'id' => 'shop_layout',
						'type' => 'image_select',
						'options' => array(
							'left-sidebar' => array(
								'alt' => 'Left Sidebar',
								'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
							),
							'full-width' => array(
								'alt' => 'Full Width',
								'img' => ReduxFramework::$_url . 'assets/img/1col.png'
							),
							'right-sidebar' => array(
								'alt' => 'Right Sidebar',
								'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
							),
						),
						'default' => 'full-width'
					),
					array(
						'title' => esc_html__('Shop Page Hero Background', 'quadron'),
						'id' => 'shop_content_bg',
						'type' => 'background',
						'output' => array( '#nt-shop-page.section--bg-wrapper-03' ),
					),
					array(
						'title' => esc_html__('Shop Post Column', 'quadron'),
						'subtitle' => esc_html__('You can control post column with this option.', 'quadron'),
						'id' => 'shop_column',
						'type' => 'slider',
						'default' => 2,
						'min' => 1,
						'step' => 1,
						'max' => 4,
						'display_value' => 'text',
					),
					array(
						'title' => esc_html__('Shop Post Count', 'quadron'),
						'subtitle' => esc_html__('You can control show post count with this option.', 'quadron'),
						'id' => 'shop_perpage',
						'type' => 'slider',
						'default' => 6,
						'min' => 1,
						'step' => 1,
						'max' => 30,
						'display_value' => 'text'
					),
				));

			 /*************************************************
		     ## SINGLE PAGE SECTION
		     *************************************************/
			 // create sections in the theme options
 			$sections[] = array(
				'title' => esc_html__('Shop Single Page', 'quadron'),
				'id' => 'singleshopsection',
				'icon' => 'el el-shopping-cart-sign',
 			);
			// SHOP PAGE SECTION
			$sections[] = array(
				'title' => esc_html__('General', 'quadron'),
				'id' => 'singleshopgeneral',
				'subsection' => true,
				'icon' => 'el el-brush',
				'fields' => array(
					array(
						'title' => esc_html__('Single Background', 'quadron'),
						'id' => 'single_shop_hero_bg',
						'type' => 'background',
						'output' => array( '#nt-woo-single .section--bg-wrapper-03' ),
					),
					array(
						'title' => esc_html__('Single Related Title', 'quadron'),
						'subtitle' => esc_html__('Add your single shop page related section title here.', 'quadron'),
						'id' => 'single_shop_related_title',
						'type' => 'text',
						'default' => 'Similar Products'
					),
					array(
						'title' => esc_html__('Single Related Before Price Text', 'quadron'),
						'subtitle' => esc_html__('Add your single shop page related section title here.', 'quadron'),
						'id' => 'single_shop_related_before_price_text',
						'type' => 'text',
						'default' => 'From'
					),
					array(
						'title' => esc_html__('Related Post Count', 'quadron'),
						'subtitle' => esc_html__('You can control show related post count with this option.', 'quadron'),
						'id' => 'single_shop_related_count',
						'type' => 'slider',
						'default' => 6,
						'min' => 1,
						'step' => 1,
						'max' => 24,
						'display_value' => 'text'
					)
				));

			return $sections;


    	}
        add_filter('redux/options/'.$quadron_pre.'/sections', 'quadron_dynamic_section');
	}
	}
}

/*************************************************
## WOOCOMMERCE HERO FUNCTION
*************************************************/

if(! function_exists('quadron_woo_hero_section')) {
	function quadron_woo_hero_section()
	{

		if (class_exists( 'WooCommerce' )) {

			if (is_shop()) {
				$name = 'shop';
				$h_t  = '' != quadron_settings('shop_title') ? quadron_settings('shop_title') : '';
			} elseif (is_product()) { // blog and cpt archive page
				$name = 'single_shop';
				$h_t  = '' != quadron_settings('single_shop_title') ? quadron_settings('single_shop_title') : '';
			} else {
				$name = 'shop';
				$h_t  = 'Shop';
			}
			$has_bg = $bg_attr = '';
			$def_bg = ' default-bg';
			// page hero options from theme-options panel
			$parallax = quadron_settings($name.'_hero_parallax_visibility', '0');

			if ($parallax == '1') {

				wp_enqueue_script('jarallax');
				$h_bg = quadron_settings($name.'_hero_bg');
				$h_video = quadron_settings($name.'_hero_use_video', '0');
				$h_video_type = quadron_settings($name.'_hero_video_type');
				$h_video_url = quadron_settings($name.'_hero_video_url');
				$def_bg = !empty($h_bg['background-image']) || !empty($h_bg['background-color']) ? '' : ' default-bg';
				$has_bg = !empty($h_bg['background-image']) ? ' jarallax __bgimg' : '';
				$type = $h_bg && quadron_settings($name.'_parallax_type') ? ' data-type="'.quadron_settings($name.'_parallax_type').'"' : ' data-type="scroll"';
				$bg_pos = $h_bg && $h_bg['background-position'] ? ' data-img-position="'.esc_attr($h_bg['background-position']).'"' : ' data-img-position="50% 90%"';
				$bg_size = $h_bg && $h_bg['background-size'] ? ' data-img-size="'.esc_attr($h_bg['background-size']).'"' : ' data-img-size="cover"';
				$bg_repeat = $h_bg && $h_bg['background-repeat'] ? ' data-img-repeat="'.esc_attr($h_bg['background-repeat']).'"' : ' data-img-repeat="no-repeat"';
				$bg_speed = $h_bg && quadron_settings($name.'_hero_parallax_speed') ? ' data-speed="'.esc_attr(quadron_settings($name.'_hero_parallax_speed')).'"' : ' data-speed="0.7"';

				if ($h_video == '1') {
					if ($h_video_type == 'mp4') {
						$has_bg = $h_bg ? ' jarallax __bgvideo __localvideo' : '';
						$attr[] = $h_video_url ? 'data-jarallax-video="mp4:'.esc_url($h_video_url).'"' : '';
					}
					if ($h_video_type == 'webm') {
						$has_bg = $h_bg ? ' jarallax __bgvideo __localvideo' : '';
						$attr[] = $h_video_url ? 'data-jarallax-video="webm:'.esc_url($h_video_url).'"' : '';
					}
					if ($h_video_type == 'ogv') {
						$has_bg = $h_bg ? ' jarallax __bgvideo __localvideo' : '';
						$attr[] = $h_video_url ? 'data-jarallax-video="ogv:'.esc_url($h_video_url).'"' : '';
					}
					if ($h_video_type == 'social') {
						$has_bg = $h_bg ? ' jarallax __bgvideo __socialvideo' : '';
						$attr[] = $h_video_url ? 'data-jarallax-video="'.esc_url($h_video_url).'"' : '';
					}
				}

				$bg_attr = $type.$bg_speed.$bg_pos.$bg_size.$bg_repeat.' data-img-src="'.esc_url($h_bg['background-image']).'"';
			}


			// page breadcrumbs
			$h_b = quadron_settings('breadcrumbs_visibility', '0');
			// page hero text alignment
			$h_a = quadron_settings($name.'_hero_alignment', 'text-center');
			// page hero background image overlay
			$h_o = quadron_settings($name.'_hero_overlay') != '' ? ' hero-overlay': '';

			if ( '0' != quadron_settings('shop_hero', '1')) {
				echo '<div id="nt-hero" class="start-screen page-id-'.get_the_ID().' hero-container bg-white'. esc_attr($h_o) .$has_bg.$def_bg.'"'.$bg_attr.'>
						<div class="start-screen__content__item align-items-center '.esc_attr($h_a).'">
							<div class="container">
								<div class="row">
									<div class="col-12 col-md-12">
										<div class="hero-innner-last-child">';

										// page hero slogan
										if ( '' != quadron_settings($name.'_slogan')) {
											echo '<h6 class="nt-hero-subtitle __subtitle">'.wp_kses(quadron_settings($name.'_slogan'), quadron_allowed_html()).'</h6>';
										}

										// page hero title
										if ( $h_t ) {
											echo '<h1 class="nt-hero-title hero__title"><span>'.wp_kses($h_t, quadron_allowed_html()).'</span></h1>';
										} else {
											echo '<h1 class="nt-hero-title hero__title"><span>';
												woocommerce_page_title();
											echo '</span></h1>';
										}

										// page hero description
										if ( '' != quadron_settings($name.'_desc')) {
											echo '<p class="nt-hero-description">'.wp_kses(quadron_settings($name.'_desc'), quadron_allowed_html()).'</p>';
										}

										// page breadcrumbs
										if ( '1' == quadron_settings('breadcrumbs_visibility', '0')) {
											quadron_breadcrumbs();
										}

								echo '</div><!-- End hero-innner-last-child -->
								</div><!-- End hero-content -->
							</div><!-- End column -->
						</div><!-- End row -->
					</div><!-- End container -->
				</div><!-- End hero-container -->';
			} // hide hero area
		}
	}
}



/*************************************************
## ADD CUSTOM CSS FOR WOOCOMMERCE
*************************************************/


if ( !function_exists( 'quadron_woo_scripts' ) ) {
	function quadron_woo_scripts()
	{
		wp_enqueue_style( 'quadron-woocommerce-custom', get_template_directory_uri() . '/woocommerce/woocommerce-custom.css',false, '1.0');
		wp_enqueue_style( 'quadron-woocommerce-update', get_template_directory_uri() . '/woocommerce/woocommerce-update.css',false, '1.0');
		wp_enqueue_script('quadron-woocommerce-custom', get_template_directory_uri() . '/woocommerce/woocommerce-custom.js', array('jquery'), '1.0', true);
	}
	add_action( 'wp_enqueue_scripts', 'quadron_woo_scripts' );
}


/*************************************************
## REMOVE WOOCOMMERCE DEFAULT PAGINATION
*************************************************/

remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );


/*************************************************
## ADD THEME SUPPORT FOR WOOCOMMERCE
*************************************************/


function quadron_woo_theme_setup() {

	add_theme_support( 'woocommerce'  );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}
add_action( 'after_setup_theme', 'quadron_woo_theme_setup' );


/*************************************************
## CHANGE NUMBER OF PRODUCTS PER ROW
*************************************************/

/**
 * Change number of products that are displayed per page (shop page)
 */

if (!function_exists('quadron_woo_shop_per_page')) {

	add_filter( 'loop_shop_per_page', 'quadron_woo_shop_per_page', 20 );

	function quadron_woo_shop_per_page( $cols ) {

	  // $cols contains the current number of products per page based on the value stored on Options -> Reading
	  // Return the number of products you wanna show per page.
	  $cols = quadron_settings('shop_perpage', '6');

	  return $cols;

	}
}

/*************************************************
## CHANGE NUMBER OF PRODUCTS COLUMN
*************************************************/
/**
 * Change number or products per row to 3
 */

if (!function_exists('quadron_woo_loop_columns')) {

	add_filter('loop_shop_columns', 'quadron_woo_loop_columns', 999);

	function quadron_woo_loop_columns() {

		return quadron_settings('shop_column', '2'); // 2 products per row

	}
}

/**
 * Change number of related products output
 */
if (!function_exists('quadron_woo_related_products_limit')) {

	add_filter( 'woocommerce_output_related_products_args', 'quadron_woo_related_products_limit', 20 );
	function quadron_woo_related_products_limit( $args ) {
		$args['posts_per_page'] = quadron_settings('single_shop_related_count', '4'); // 4 related products
		$args['columns'] = quadron_settings('single_shop_related_column', '3'); // arranged in 2 columns
		return $args;
	}
}

/**
* Change text strings
*
* @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
*/

function quadron_woo_change_related_products_title( $translated_text, $text, $domain ) {
  switch ( $translated_text ) {
    case 'Related products' :
      $translated_text = __( 'Related Products', 'quadron' );
      break;
  }
  return $translated_text;
}
add_filter( 'gettext', 'quadron_woo_change_related_products_title', 20, 3 );

/*************************************************
## WOOCOMMERCE CART BUTTON FOR HEADER
*************************************************/

if(!function_exists('quadron_woo_header_cart_button')) {

	function quadron_woo_header_cart_button() {

		ob_start();
		if ( WC()->cart->cart_contents_count > 0 ) {  ?>

			<a href="<?php echo wc_get_cart_url(); ?>" class="btn-cart">
				<span class="btn-cart__icon">
					<svg width="8.94" height="13.88"><use xlink:href="#shopping-bag01"></use></svg></span>
				<span class="btn-cart__badge"><?php echo WC()->cart->cart_contents_count;?></span>
			</a>

		<?php
		}

	return ob_get_clean();
	}
}


/*************************************************
## RETURN CART FRAGMENT
*************************************************/

if(!function_exists('quadron_woo_header_add_to_cart_custom_fragment')) {

	function quadron_woo_header_add_to_cart_custom_fragment( $fragments ) {

		ob_start();
 	?>

		<span class="btn-cart__badge"><?php echo WC()->cart->cart_contents_count;?></span>

	<?php
		$fragments['a .btn-cart__badge'] = ob_get_clean();

		return $fragments;

	}
	add_filter('woocommerce_add_to_cart_fragments', 'quadron_woo_header_add_to_cart_custom_fragment');
}


/*************************************************
## CUSTOM HOOK
*************************************************/
if(!function_exists('quadron_woo_custom_form_field_args')) {

	function quadron_woo_custom_form_field_args( $fields ) {

		if ( 'optional' === get_option( 'woocommerce_checkout_address_2_field', 'optional' ) ) {
			$address_2_placeholder = esc_html__( 'Apartment, suite, unit etc. (optional)', 'quadron' );
		} else {
			$address_2_placeholder = esc_html__( 'Apartment, suite, unit etc.', 'quadron' );
		}

		$fields = array(
			'first_name' => array(
				'label'        => esc_html__( 'First name', 'quadron' ),
				'required'     => true,
				'class'        => array( 'form-row-first' ),
				'autocomplete' => 'given-name',
				'priority'     => 10,
			),
			'last_name'  => array(
				'label'        => esc_html__( 'Last name', 'quadron' ),
				'required'     => true,
				'class'        => array( 'form-row-last' ),
				'autocomplete' => 'family-name',
				'priority'     => 20,
			),
			'company'    => array(
				'label'        => esc_html__( 'Company name', 'quadron' ),
				'class'        => array( 'form-row-wide' ),
				'autocomplete' => 'organization',
				'priority'     => 30,
				'required'     => 'required' === get_option( 'woocommerce_checkout_company_field', 'optional' ),
			),
			'country'    => array(
				'type'         => 'country',
				'label'        => esc_html__( 'Country', 'quadron' ),
				'required'     => true,
				'class'        => array( 'form-row-wide', 'address-field', 'update_totals_on_change' ),
				'autocomplete' => 'country',
				'priority'     => 40,
			),
			'address_1'  => array(
				'label'        => esc_html__( 'Street address', 'quadron' ),
				/* translators: use local order of street name and house number. */
				'placeholder'  => '',
				'required'     => true,
				'class'        => array( 'form-row-wide', 'address-field' ),
				'autocomplete' => 'address-line1',
				'priority'     => 50,
			),
			'address_2'  => array(
				'label'        => esc_html__( 'Apartment, suite, unit etc.', 'quadron' ),
				'class'        => array( 'form-row-wide', 'address-field' ),
				'autocomplete' => 'address-line2',
				'priority'     => 60,
				'required'     => 'required' === get_option( 'woocommerce_checkout_address_2_field', 'optional' ),
			),
			'city'       => array(
				'label'        => esc_html__( 'Town / City', 'quadron' ),
				'required'     => true,
				'class'        => array( 'form-row-wide', 'address-field' ),
				'autocomplete' => 'address-level2',
				'priority'     => 70,
			),
			'state'      => array(
				'type'         => 'state',
				'label'        => esc_html__( 'State / County', 'quadron' ),
				'required'     => true,
				'class'        => array( 'form-row-wide', 'address-field' ),
				'validate'     => array( 'state' ),
				'autocomplete' => 'address-level1',
				'priority'     => 80,
			),
			'postcode'   => array(
				'label'        => esc_html__( 'Postcode / ZIP', 'quadron' ),
				'required'     => true,
				'class'        => array( 'form-row-wide', 'address-field' ),
				'validate'     => array( 'postcode' ),
				'autocomplete' => 'postal-code',
				'priority'     => 90,
			),
		);
		return $fields;
	}
	add_filter( 'woocommerce_default_address_fields', 'quadron_woo_custom_form_field_args' );
}
// define the woocommerce_form_field_<type> callback
function filter_woocommerce_form_field_type( $field, $key, $args, $value ) {

	if ( $args['required'] ) {
		$args['class'][] = 'validate-required';
		$required        = '*';
	} else {
		$required = '&nbsp;<span class="optional">(' . esc_html__( 'optional', 'quadron' ) . ')</span>';
	}

	if ( is_string( $args['label_class'] ) ) {
		$args['label_class'] = array( $args['label_class'] );
	}

	if ( is_null( $value ) ) {
		$value = $args['default'];
	}

	// Custom attribute handling.
	$custom_attributes         = array();
	$args['custom_attributes'] = array_filter( (array) $args['custom_attributes'], 'strlen' );

	if ( $args['maxlength'] ) {
		$args['custom_attributes']['maxlength'] = absint( $args['maxlength'] );
	}

	if ( ! empty( $args['autocomplete'] ) ) {
		$args['custom_attributes']['autocomplete'] = $args['autocomplete'];
	}

	if ( true === $args['autofocus'] ) {
		$args['custom_attributes']['autofocus'] = 'autofocus';
	}

	if ( $args['description'] ) {
		$args['custom_attributes']['aria-describedby'] = $args['id'] . '-description';
	}

	if ( ! empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) {
		foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) {
			$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
		}
	}

	if ( ! empty( $args['validate'] ) ) {
		foreach ( $args['validate'] as $validate ) {
			$args['class'][] = 'validate-' . $validate;
		}
	}

	$field           = '';
	$label_id        = $args['id'];
	$sort            = $args['priority'] ? $args['priority'] : '';
	//$field_container = '<p class="form-row %1$s" id="%2$s" data-priority="' . esc_attr( $sort ) . '">%3$s</p>';
	$field_container = '<div class="form-group %1$s" id="%2$s" data-priority="' . esc_attr( $sort ) . '"> %3$s</div>';
    // make filter magic happen here...
	switch ( $args['type'] ) {
		case 'country':
			$countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();
			//$field .= '<div class="form-group">';
			if ( 1 === count( $countries ) ) {

				$field .= '<strong>' . current( array_values( $countries ) ) . '</strong>';

				$field .= '<input type="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . current( array_keys( $countries ) ) . '" ' . implode( ' ', $custom_attributes ) . ' class="country_to_state" readonly="readonly" />';

			} else {

				$field = '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="no-nice country_to_state country_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . '><option value="">' . esc_html__( 'Select a country&hellip;', 'quadron' ) . '</option>';

				foreach ( $countries as $ckey => $cvalue ) {
					$field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
				}

				$field .= '</select>';

				$field .= '<noscript><button type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__( 'Update country', 'quadron' ) . '">' . esc_html__( 'Update country', 'quadron' ) . '</button></noscript>';

			}
			//$field .= '</div>';
			break;
		case 'state':
			/* Get country this state field is representing */
			$for_country = isset( $args['country'] ) ? $args['country'] : WC()->checkout->get_value( 'billing_state' === $key ? 'billing_country' : 'shipping_country' );
			$states      = WC()->countries->get_states( $for_country );

			if ( is_array( $states ) && empty( $states ) ) {

				//$field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>';
				$field_container = '<div class="form-group %1$s" id="%2$s" style="display: none"> %3$s</div>';

				$field .= '<input type="hidden" class="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="" ' . implode( ' ', $custom_attributes ) . ' placeholder="' . esc_attr( $args['placeholder'] ) . '" readonly="readonly" data-input-classes="' . esc_attr( implode( ' ', $args['input_class'] ) ) . '"/>';

			} elseif ( ! is_null( $for_country ) && is_array( $states ) ) {

				$field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '"
				class="no-nice state_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ? $args['placeholder'] : esc_html__( 'Select an option&hellip;', 'quadron' ) ) . '"  data-input-classes="' . esc_attr( implode( ' ', $args['input_class'] ) ) . '">
					<option value="">' . esc_html__( 'Select an option&hellip;', 'quadron' ) . '</option>';

				foreach ( $states as $ckey => $cvalue ) {
					$field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
				}

				$field .= '</select>';

			} else {

				$field .= '<input type="text" class="form-control" value="' . esc_attr( $value ) . '"
				placeholder="' . esc_attr( $args['placeholder'] ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" ' . implode( ' ', $custom_attributes ) . ' data-input-classes="' . esc_attr( implode( ' ', $args['input_class'] ) ) . '"/>';

			}

			break;
		case 'textarea':
			$field .= '<textarea name="' . esc_attr( $key ) . '" class="form-control" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . ( empty( $args['custom_attributes']['rows'] ) ? ' rows="2"' : '' ) . ( empty( $args['custom_attributes']['cols'] ) ? ' cols="5"' : '' ) . implode( ' ', $custom_attributes ) . '>' . esc_textarea( $value ) . '</textarea>';

			break;
		case 'checkbox':
			$field = '<label class="checkbox ' . implode( ' ', $args['label_class'] ) . '" ' . implode( ' ', $custom_attributes ) . '>
					<input type="' . esc_attr( $args['type'] ) . '" class="input-checkbox ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '"
					value="1" ' . checked( $value, 1, false ) . ' /> ' . $args['label'] . $required . '</label>';

			break;
		case 'text':
		case 'password':
		case 'datetime':
		case 'datetime-local':
		case 'date':
		case 'month':
		case 'time':
		case 'week':
		case 'number':
		case 'email':
		case 'url':
		case 'tel':
			$field .= '<input type="' . esc_attr( $args['type'] ) . '" class="street form-control" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '"
			value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' />';

			break;
		case 'select':
			$field   = '';
			$options = '';

			if ( ! empty( $args['options'] ) ) {
				foreach ( $args['options'] as $option_key => $option_text ) {
					if ( '' === $option_key ) {
						// If we have a blank option, select2 needs a placeholder.
						if ( empty( $args['placeholder'] ) ) {
							$args['placeholder'] = $option_text ? $option_text : __( 'Choose an option', 'quadron' );
						}
						$custom_attributes[] = 'data-allow_clear="true"';
					}
					$options .= '<option value="' . esc_attr( $option_key ) . '" ' . selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) . '</option>';
				}

				$field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . '
				data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
						' . $options . '
					</select>';
			}

			break;
		case 'radio':
			$label_id .= '_' . current( array_keys( $args['options'] ) );

			if ( ! empty( $args['options'] ) ) {
				foreach ( $args['options'] as $option_key => $option_text ) {
					$field .= '<input type="radio" class="input-radio ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" ' . implode( ' ', $custom_attributes ) . '
					id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '"' . checked( $value, $option_key, false ) . ' />';
					$field .= '<label for="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" class="radio ' . implode( ' ', $args['label_class'] ) . '">' . $option_text . '</label>';
				}
			}

			break;
	}

	if ( ! empty( $field ) ) {
		$field_html = '';

		if ( $args['label'] && 'checkbox' !== $args['type'] ) {
			$field_html .= '<label for="' . esc_attr( $label_id ) . '" class="placeholder-label">' . $args['label'] . $required . '</label>';
		}

		$field_html .= $field;

		if ( $args['description'] ) {
			$field_html .= '<span class="description" id="' . esc_attr( $args['id'] ) . '-description" aria-hidden="true">' . wp_kses_post( $args['description'] ) . '</span>';
		}

		$field_html .= '</span>';

		$container_class = esc_attr( implode( ' ', $args['class'] ) );
		$container_id    = esc_attr( $args['id'] ) . '_field';
		$field           = sprintf( $field_container, $container_class, $container_id, $field_html );
	}

	return $field;

};

// add the filter
add_filter( "woocommerce_form_field", 'filter_woocommerce_form_field_type', 10, 4 );

/*************************************************
## REGISTER SIDEBAR FOR WOOCOMMERCE
*************************************************/


if ( !function_exists( 'quadron_woo_widgets_init' ) ) {
function quadron_woo_widgets_init() {

	//Shop page sidebar
	register_sidebar( array(
		'name' => esc_html__( 'Shop Page Sidebar', 'quadron' ),
		'id' => 'shop-page-sidebar',
		'description' => esc_html__( 'These widgets for the Shop page.','quadron' ),
        'before_widget' => '<div class="nt-sidebar-inner-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="nt-sidebar-inner-widget-title widget-title">',
        'after_title' => '</h4>'
	) );

}
add_action( 'widgets_init', 'quadron_woo_widgets_init' );
}



/************************************************************
## ADD THEME CSS SETTINGS TO WOOCOMMERCE AND WP INLINE STYLE
*************************************************************/


if ( !function_exists( 'quadron_woo_theme_css_options' ) ) {
  function quadron_woo_theme_css_options() {

	/* CSS to output */

	 $theCSS = '';

		$shop_theme_color = quadron_settings('theme_color');

		// css color
		$theCSS .= '';

		/* Add CSS to quadron-custom-style.css */
		wp_register_style( 'quadron-woo-style', false );
		wp_enqueue_style( 'quadron-woo-style' );
		wp_add_inline_style( 'quadron-woo-style', $theCSS );

	}
	add_action( 'wp_enqueue_scripts', 'quadron_woo_theme_css_options' );
}
