<?php


/**
 * Custom template parts for this theme.
 *
 * preloader, backtotop, conten-none
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package quadron
*/



/*************************************************
## START PRELOADER
*************************************************/

if ( ! function_exists( 'quadron_preloader' ) ) {
	function quadron_preloader() {
		if ( '0' != quadron_settings('preloader_visibility', '1') ) {
			if ( 'custom' == quadron_settings('pre_type', '1') ) {
				echo'<div id="nt-preloader" class="preloader justify-content-center align-items-center d-flex"><img src="'.esc_url(quadron_settings('pre_custom_img')['url']).'" class="nt-custom-preloader"></div>';
			} else {
				echo'<div id="nt-preloader" class="preloader">
					<div class="loader'.quadron_settings('pre_type').'"></div>
				</div>';
			}
		}
	}
}

/*************************************************
##  BACKTOP
*************************************************/

if ( ! function_exists( 'quadron_backtop' ) ) {
	function quadron_backtop() {

		if ( '1' == quadron_settings('backtotop_visibility') ) {

			echo'<a href="#" id="js-back-to-top" class="btn-scroll-top"><svg><use xlink:href="#arrow_left"></use></svg></a>';

		}

	}
}


/*************************************************
##  CONTENT NONE
*************************************************/


if ( ! function_exists( 'quadron_content_none' ) ) {
function quadron_content_none() {
	$quadron_centered = is_search() && 'full-width' == quadron_settings( 'search_layout') ? ' text-center' : '';
?>

	<div class="content-none-container section-heading">


		<h2 class="__title<?php echo esc_attr($quadron_centered); ?>"><?php esc_html_e( 'Nothing', 'quadron' ); ?> <span><?php esc_html_e( 'Found', 'quadron' ); ?></span></h2>

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'quadron' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p class="__nothing<?php echo esc_attr($quadron_centered); ?>"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'quadron' ); ?></p>
				<div class="spacer py-4"></div>
				<?php echo quadron_content_custom_search_form(); ?>

			<?php else : ?>
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'quadron' ); ?></p>
				<div class="spacer py-4"></div>
			<?php quadron_content_custom_search_form(); ?>

		<?php endif; ?>

	</div> <!-- End article -->

<?php
}
}
